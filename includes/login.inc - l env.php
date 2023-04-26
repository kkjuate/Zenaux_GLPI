<?php



//Query a la base de datos para informacion de los usuarios



// $getDomain = "select domainServer, domainAddress, port from siteSettings where site = '$domain';";

// result ($getdomain, conn)







if(isset($_POST['username']))
{
$username = $_POST['username']; //sent from login.php
$password = $_POST['password']; //sent from login.php





// $getDomain = "select domainServer, domainAddress, port from siteSettings where site = '$domain';";
    

    
     if (empty($username) || empty ($password))
    {
        header("Location:../login.php?error=emptyfields&username=".$username);
        exit();
    }
    
    
    else
    {
            
        $connection = ldap_connect($resultGetDomain[0], $resultGetDomain[2]);
        
            if (!$connection) {
            exit('Connection failed');
            }
        
            $bind = @ldap_bind($connection, $username.$domain, $password);
            if (!$bind)
            {           
                header("Location:../login.php?error=wronginfo&username=".$username);
            
            }
            else if ($bind)
            {
                
                
                //LDAP-SEARCH GET group, email
                
               session_start();
                 $sessionInfo = array($username,$location,$profile);
                 $_SESSION["user"] = $sessionInfo;
                
                    if($group !== 'tech'){
                        
                                       
               /*     $_SESSION["user"] = $sessionInfo;*/
                    header("Location:../dash-user.php?login=success");
                        
                      } 
                    else if ($group === 'tech')
                    {
                    /*$sessionInfo = array($username,$location);*/
                   /* $_SESSION["user"] = $sessionInfo*/
                    header("Location:../dash.php?login=success");
                         
                    }
            }
            
        ldap_close($connection);
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
?>