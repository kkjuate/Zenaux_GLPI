<?php

$attempts=0;
if(isset($_POST['username']))
{
$username = $_POST['username']; //sent from login.php
$password = $_POST['password']; //sent from login.php






$un_validator = strtoupper($username); //user name to uppercase - for validators of location & profile.


$port = 389; // LDAP port


/*ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);*/





if ($attempts >= 3) 
{
    
    echo "Looks like you're blocked";
    
} 
else
{
    

    $location = substr($un_validator,0,3);
    $profile = substr($un_validator,0,7);
    
    if (empty($username) || empty ($password))
    {
        header("Location:../login.php?error=emptyfields&username=".$username);
        exit();
    }
    
    
    else if ($location == 'BOG' || $location == 'BP9' || $location == 'CCH') //Incluir todos los comunes de los NT users con OR
    {
        $server = '10.72.4.10';
        $domain = '@bogota.accedocolombia.net';
        
        $connection = ldap_connect($server, $port);
            if (!$connection) {
            exit('Connection failed');
            }
        
        $bind = @ldap_bind($connection, $username.$domain, $password);
            if (!$bind)
            {
              
                $attempts++;
              
                header("Location:../login.php?error=wronginfo&username=".$username);
              //BUCARAMANGA  
                
                
            }
            else if ($bind)
            {
                
               session_start();
                 $sessionInfo = array($username,$location,$profile);
                 $_SESSION["user"] = $sessionInfo;
                
                    if($profile !== 'BOGATIT'){
                        
                                       
               /*     $_SESSION["user"] = $sessionInfo;*/
                    header("Location:../dash-user.php?login=success");
                        
                      } 
                    else if ($profile == 'BOGATIT')
                    {
                    /*$sessionInfo = array($username,$location);*/
                   /* $_SESSION["user"] = $sessionInfo*/
                    header("Location:../dash.php?login=success");
                         
                    }
            }
            
        ldap_close($connection);
        
        
    }
    else if ($location == 'CAC') //Incluir todos los comunes de los NT users con OR
    {
        $server = '10.62.4.10'; //Datos del servidor - - pendiente por corregir
        $domain = '@cacique.accedocolombia.net';//Datos del servidor - - pendiente por corregir
            $connection = ldap_connect($server, $port);
            if (!$connection) {
            exit('Connection failed');
            }
        
            $bind = @ldap_bind($connection, $username.$domain, $password);
            if (!$bind)
            {
              
               $attempts++;
                header("location:../login.php?error=wronginfo&username=".$username);
                exit();
            }
            else
            {
                session_start();
                $_SESSION["user"] = $_POST["username"];
                    if($profile == 'BUCATIT') //Incluir todos los comunes de IT NT Users
                    {
                        header("Location:../index_admin.php?login=success");
                    }
                    else
                    {
                                       header("Location:../index.php?login=success");
                    }
            }
    }

    else if ($location == 'NIC') //Incluir todos los comunes de los NT users con OR
    {
        $server = '10.52.4.10'; //Datos del servidor - - pendiente por corregir
        $domain = '@nica.accedocolombia.net'; //Datos del servidor - - pendiente por corregir
            $connection = ldap_connect($server, $port);
            if (!$connection) {
            exit('Connection failed');
            }
        
        $bind = @ldap_bind($connection, $username.$domain, $password);
            if (!$bind)
            {
              
                $attempts++;
                header("location:../login.php?error=wronginfo&username=".$username);
                exit();
            }
            else
            {
                session_start();
                $_SESSION["user"] = $_POST["username"];
                    if($profile == 'NICATIT') //Incluir todos los comunes de IT NT Users
                    {
                       header("Location:../index_admin.php?login=success");
                    }
                    else
                    {
                                       header("Location:../index.php?login=success");
                    }
            }
    }
        
    else if ($location == 'PEI') //Incluir todos los comunes de los NT users con OR
    {
        $server = '10.42.4.10'; //Datos del servidor - - pendiente por corregir
        $domain = '@pei.accedocolombia.net'; //Datos del servidor - - pendiente por corregir
            $connection = ldap_connect($server, $port);
            if (!$connection) {
            exit('Connection failed');
            }
        
            $bind = @ldap_bind($connection, $username.$domain, $password);
            if (!$bind)
            {
              
                $attempts++;
                header("location:../login.php?error=wronginfo&username=".$username);
                exit();
            }
            else
            {
                
                    if($profile == 'PEIIT') //Incluir todos los comunes de IT NT Users
                    {
                    session_start();
                    $_SESSION["user"] = $_POST["username". "IT"];
                     header("Location:../index_admin.php?login=success");
                    }
                    else
                    {
                    $_SESSION["user"] = $_POST["username"];
                    header("Location:../index.php?login=success");
                    }
            }



    }
    else {
       header("location:../login.php?error=wronginfo&username=".$username);
                exit();  
    }
    
    
}

    

    }










?>