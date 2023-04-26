  <?php
    
session_start();
    
   //array($username,$location,$profile);
        
if(isset($_SESSION['user'])){
    
    if($_SESSION['user']["userOU"] !== 'IT') {
      
        header('Location:user-dashboard.php');
        die();
        
    } else {
     include 'includes/dBH.inc.php'; 
    }
    
}
else {
    header('location:login.php');
    die();
}

                
        
?>
            

