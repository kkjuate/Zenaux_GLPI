<?php


//$hostname = substr($_SERVER['REMOTE_ADDR'],0,7);


require_once "functions_ldap.php";

if(isset($_POST['username'])){

include 'dbH.inc.php';
    
$username = $_POST['username']; //sent from login.php
$password = $_POST['password']; //sent from login.php





//Hacer el match de la IP con la base de datos
$offset = 0;
$hostname = substr($_SERVER['REMOTE_ADDR'],0,7);
//$hostname = substr("10.72.134.52",0,7);
$find = ".";
$find_length = strlen($find);



while ($string_pos = strpos($hostname,$find,$offset)) {
  //  echo $find . "was found at" . $string_pos;
    $offset = $string_pos + $find_length;
    $value = $string_pos;
    
}



$toMatchDB = substr($hostname,0,$value);
    

//if ($toMatchDB !== '10.32' || $toMatchDB !== '10.42' || $toMatchDB !== '10.52' || $toMatchDB !== '10.62'|| $toMatchDB !== '10.72' || $toMatchDB !== '172.20') {
    
  //  $toMatchDB = '10.72';
    
//}


$siteQuery = "select site, domainServer, domainAddress, port, details, itGroupLocation, helpdeskEmail, helpdeskExt, helpdeskExt247, helpdeskCell, facilitiesDistro, securityDistro, natDistro from siteSettings LEFT JOIN siteSettingsMatch on siteSettings.site = siteSettingsMatch.siteID where siteSettingsMatch.ipRange='$toMatchDB';";
    


$getDomain = sqlsrv_query($conn,$siteQuery);




if( $getDomain ) {
	
			 while($row = sqlsrv_fetch_array($getDomain))
          {
              $server = $row["domainServer"];
              $domain = $row["domainAddress"];
              $port = $row["port"];
              $site = $row["site"];
              $details = $row["details"];
              $itGroupLocation = $row["itGroupLocation"];
              $helpdeskEmail = $row["helpdeskEmail"];
              $helpdeskExt = $row["helpdeskExt"];
              $helpdeskExt247 = $row["helpdeskExt247"];
              $helpdeskExtCell = $row["helpdeskCell"];
			  $facilitiesDistro = $row["facilitiesDistro"];
			  $securityDistro = $row["securityDistro"];
			  $natDistro = $row["natDistro"];
          }
    
    
  
                 } 
else
{

    print_r(sqlsrv_errors());
	die();
 
}

    


/*
  echo $details . $domain . $server . $site . " | " . $helpdeskEmail;
  die();
*/

        
        $connection = ldap_connect($server, $port);


    
    
            if (!$connection) {
            exit('Connection failed');
               } 
                
                
        

           ldap_set_option ($connection, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
            $bind = @ldap_bind($connection, $username.$domain, $password);




            if (!$bind)
            {
            
               /*              print_r($row);
                            print_r($getDomain);
                            echo $server;
                            echo $port;
                            echo $domain;
                echo $username.$domain;
                echo $toMatchDB;
                die();*/
                    
              
              header("Location:../login.env.php?error=wronginfo&username=$username&DB=$toMatchDB");
			  die();
              //BUCARAMANGA  
                
                
            }
            else if ($bind)
            {
                
               require_once 'functions_ldap.php';
                
                $filter = "(sAMAccountName=$username)";
                $attributes = array("mail","ou","memberof");
                $result = ldap_search($connection,$details,$filter,$attributes) or exit ("Unable to search");
                $entries = ldap_get_entries($connection, $result);
                
                     
                
                $counter = strlen($entries[0]["dn"]);
                
                
                
                $splitOU = explode(",",$entries[0]["dn"]);
                $findThisOU = substr($splitOU[1],3,strlen($splitOU[1]));
				$findThisOU2 = substr($splitOU[2],3,strlen($splitOU[1]));
				
               
               
               
                //$queryForUserSettings = "SELECT identifier, minLOB, impact from campaign where identifier = '$findThisOU';";
				
			
				
				
			//	echo $findThisOU;
				//die();
				
				
				$getCampaign = matchUserOU($conn,$findThisOU);
				
				$attempts=0;
				alternative:
				
				//$getCampaign = sqlsrv_query($conn,$queryForUserSettings );
                
                
                
                if( $getCampaign ) {
					
                          do {
							  
							  $row = sqlsrv_fetch_array($getCampaign);
							  
							    if (!isset($row)){
										
										
									
										$attempts++;
										if ($attempts >1){
											header("Location:../login.env.php?error=OUNotFound&username=$username&OU=".$findThisOU);
											die();
											
										}
										else {
										$getCampaign = matchUserOU($conn,$findThisOU2);
										goto alternative;	
										}
										
										//echo "Test:". $queryForUserSettings . "bebe";
										//die();
										
										
										
									}
									
									
							  $userOU = $row["minLOB"];
                             $impact = $row["impact"];
							  
						  }while(!$row);
						  
				
						 
						  
						  /*while($row = sqlsrv_fetch($getCampaign)){
                               				  
							  $userOU = $row["minLOB"];
                              $impact = $row["impact"];
							  }*/
							  
							  
						  
                                 } 
                else
                {

                    echo 'Unable to connect to DB';

                }
			
                
                $splitDN = explode("=",$entries[0]["dn"]);
                
                
                $findThisDN = substr($splitDN[1],0,strlen($splitDN[1])-3);
                
                if (!isset($entries[0]["mail"][0])){
                     header("Location:../login.env.php?error=emailNotFound&username=$username");
                     die();
                }
				
				$mail=$entries[0]["mail"][0];
                 
                session_start();
                
                
               $sessionInfo = array('displayName' => $findThisDN, 'userOU' => $userOU, 'userEmail' => $mail, 'site' => $site, 'username' => $username, 'impact' => $impact, 'helpdeskEmail' => $helpdeskEmail, 'helpdeskExt' => $helpdeskExt, 'helpdeskExt247' => $helpdeskExt247, 'helpdeskExtCell' => $helpdeskExtCell, 'server' => $server, 'domain' => $domain, 'port' => $port, 'facilitiesDistro' => $facilitiesDistro, 'securityDistro' => $securityDistro, 'natDistro' => $natDistro);
               
            
                
                 $_SESSION["user"] = $sessionInfo;
                
               
                
                 if (!in_array($itGroupLocation,$entries[0]["memberof"])) {
                     
                   if ($userOU == 'FAC' || $userOU == 'SEC'){
					header("Location:../esc-dashboard.php?login=success");
                     $_SESSION["user"] = $sessionInfo;
				   } else {
                          $_SESSION["user"] = $sessionInfo;
						header("Location:../user-dashboard.php?login=success");
               
						  } 
				} else {
                     
                     $_SESSION["user"] = $sessionInfo;
                   
                 header("Location:../admin-dashboard.php?login=success");
               }
                
                
                
                
                
                
                
                
                
}
 }
                
                
                
                    
                
                
            

?>