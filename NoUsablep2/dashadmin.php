<?php 


session_start();
    
   //array($username,$location,$profile);
        
if(isset($_SESSION['user'])){
    
    if($_SESSION['user'][2] == 'BOGATIT') {
        
        $LOB = "IT";
        
    } else if($_SESSION['user'][2] != 'BOGATIT'){
        header('Location:dash-user.php');
        die();
    }
    
}
else {
    header('location:login.php');
    die();
}


include 'head.php';

include 'aside-admin.php';


include 'header.php';


include 'content.php';

include 'footer.php';


?>