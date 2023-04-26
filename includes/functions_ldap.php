<?php 
function matchUserOU($conn,$OU){
				
					$queryForUserSettings = "SELECT identifier, minLOB, impact from campaign where identifier = '$OU';";				
					$getCampaign = sqlsrv_query($conn,$queryForUserSettings );
					
					return $getCampaign;
}




				
function matchUserNotFound ($userToGet,$site)  {
	
    $username = 'bogatit005'; // dedicated -- Needs a service user
     $password = 'Kazekk21'; //dedicated
	 
include 'dbH.inc.php';
$siteQuery = "select domainServer, domainAddress, port, details from siteSettings where site = '$site';";
  
$getDomain = sqlsrv_query($conn,$siteQuery);

if( $getDomain ) {
          while($row = sqlsrv_fetch_array($getDomain))
          { 
			  $server = $row["domainServer"];
              $domain = $row["domainAddress"];
			  $details = $row["details"];
              $port = $row["port"];
		  }
		  
}else {
	echo 'unable to connect to DB';
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
				echo 'error';
			}   else if ($bind){ 
				
			
			


			  
                $filter = "(sAMAccountName=$userToGet)";
                $attributes = array("mail","ou","memberof");
                $result = ldap_search($connection,$details,$filter,$attributes) or exit ("Unable to search");
                $entries = ldap_get_entries($connection, $result);
                
                     
               $splitDN = explode("=",$entries[0]["dn"]);
                
                
			$findThisDN = substr($splitDN[1],0,strlen($splitDN[1])-3);
			$params = array($userToGet,$findThisDN);
			$insertQuery = "INSERT INTO userInfo (userNt, userFName) VALUES (?,?);";
			$insertUser = sqlsrv_query($conn,$insertQuery,$params);
			return $findThisDN;
			
			}
			
			
	
} 

//function debugLoginError ($toMatchDB) 
	
	
				
				?>