  <?php
    
session_start();
    
   //array($username,$location,$profile);
        


if(!isset($_SESSION['user'])){
  
  header('location:login.php');
    die();
}
else {
    $sessionInfo = $_SESSION['user'];
   include 'includes/esc_list.inc.php';
}
      
        
?>