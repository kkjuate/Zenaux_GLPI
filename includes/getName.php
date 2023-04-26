<?php

session_start();
include 'dbH.inc.php';
    
$username = 'bogatit005'; //sent from login.php
$password = 'Kazekk21';
    
              $server = $row["domainServer"];
              $domain = $row["domainAddress"];
              $port = $row["port"];


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
                    
                
              header("Location:../login.php?error=wronginfo&username=".$username);
              //BUCARAMANGA  
                
                
            }
            else if ($bind)
            {
                
                
                
                
                
                $filter = "(sAMAccountName=$affectedUser)";
                $attributes = array("mail","ou","memberof");
                $result = ldap_search($connection,$details,$filter,$attributes) or exit ("Unable to search");
                $entries = ldap_get_entries($connection, $result);
                
                $counter = strlen($entries[0]["dn"]);
                
                $splitOU = explode(",",$entries[0]["dn"]);
                $findThisOU = substr($splitOU[1],3,strlen($splitOU[1]));
               
                $splitDN = explode("=",$entries[0]["dn"]);
                
                
                $findThisDN = substr($splitDN[1],0,strlen($splitDN[1])-3);
                
                echo $findThisDN
                die();
                
                
                
               
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
                
            
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
               
            }
















    ?>