<?php


//$hostname = substr($_SERVER['REMOTE_ADDR'],0,7);






include 'includes\dbH.inc.php';
    
$username = 'bogatit005'; //sent from login.php
$password = 'Kazekk21'; //sent from login.php





//Hacer el match de la IP con la base de datos
$offset = 0;
//$hostname = substr($_SERVER['REMOTE_ADDR'],0,7);
$hostname = substr("10.72.134.52",0,7);
$find = ".";
$find_length = strlen($find);



while ($string_pos = strpos($hostname,$find,$offset)) {
  //  echo $find . "was found at" . $string_pos;
    $offset = $string_pos + $find_length;
    $value = $string_pos;
    
}



$toMatchDB = substr($hostname,0,$value);




$siteQuery = "select site, domainServer, domainAddress, port, helpdeskEmail, helpdeskExt, helpdeskExt247, helpdeskCell from siteSettings
LEFT JOIN siteSettingMatch on siteSettings.site = siteSettingMatch.siteID where siteSettingMatch.ipRange='$toMatchDB';";
    




$getDomain = sqlsrv_query($conn,$siteQuery);



if( $getDomain ) {
          while($row = sqlsrv_fetch_array($getDomain))
          {
              $server = $row["domainServer"];
              $domain = $row["domainAddress"];
              $port = $row["port"];
              $site = $row["site"];
              $helpdeskEmail = $row["helpdeskEmail"];
              $helpdeskExt = $row["helpdeskExt"];
              $helpdeskExt247 = $row["helpdeskExt247"];
              $helpdeskExtCell = $row["helpdeskCell"];
          }
    
  
                 } 
else
{

    echo 'Unable to connect to DB';
 
}





        
        $connection = ldap_connect($server, $port);


    
    
            if (!$connection) {
            exit('Connection failed');
               } 
                
                
        

           ldap_set_option ($connection, LDAP_OPT_REFERRALS, 0);
            ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
            $bind = @ldap_bind($connection, $username.$domain, $password);




            if (!$bind)
            {
              
                             
              header("Location:../login.php?error=wronginfo&username=".$username);
              //BUCARAMANGA  
                
                
            }
            else if ($bind)
            {
                
               
                  
                $filter = "(sAMAccountName=*)";
                $attributes = array("mail","ou","memberof");
                $result = ldap_search($connection,"DC=bogota,DC=accedocolombia,DC=net",$filter,$attributes) or exit ("Unable to search");
                $entries = ldap_get_entries($connection, $result);
                
                print_r($entries);
                die();
                     
                
                $counter = strlen($entries[0]["dn"]);
                
                
                
                $splitOU = explode(",",$entries[0]["dn"]);
                $findThisOU = substr($splitOU[1],3,strlen($splitOU[1]));
                
               
                $queryForUserSettings = "SELECT identifier, minLOB, impact from campaign where identifier='$findThisOU';";
                $getCampaign = sqlsrv_query($conn,$queryForUserSettings );
                
                
                
                if( $getCampaign ) {
                          while($row = sqlsrv_fetch_array($getCampaign)){
                                                    
                              
                              $userOU = $row["minLOB"];
                              $impact = $row["impact"];
                            
                          }
                                 } 
                else
                {

                    echo 'Unable to connect to DB';

                }
                
                
                $splitDN = explode("=",$entries[0]["dn"]);
                
                
                $findThisDN = substr($splitDN[1],0,strlen($splitDN[1])-3);
                
                 $mail=$entries[0]["mail"][0];
                 
                session_start();
                
                
               $sessionInfo = array('displayName' => $findThisDN, 'userOU' => $userOU, 'userEmail' => $mail, 'site' => $site, 'username' => $username, 'impact' => $impact, 'helpdeskEmail' => $helpdeskEmail, 'helpdeskExt' => $helpdeskExt, 'helpdeskExt247' => $helpdeskExt247, 'helpdeskExtCell' => $helpdeskExtCell, 'server' => $server, 'domain' => $domain, 'port' => $port);
                
            
                
                 $_SESSION["user"] = $sessionInfo;
                
                
                 if (!in_array("CN=Helpdesk,OU=Grp_Priv,OU=Prof_ADMIN,OU=AccedoPriv,DC=bogota,DC=accedocolombia,DC=net",$entries[0]["memberof"])) {
                     echo 'no es de helpdesk'; 
                    
                     $_SESSION["user"] = $sessionInfo;
               header("Location:../user-dashboard.php?login=success");
                } else {
                     
                     echo 'es de helpdesk';
                     $_SESSION["user"] = $sessionInfo;
                   //  print_r ($sessionInfo);
                 header("Location:../admin-dashboard.php?login=success");
               }
                
                
                
                
                
                
                
                
                
}
 
                
                
                
                    
                
                
            

?>