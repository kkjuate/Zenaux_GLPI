<?php include 'includes/session_usr.inc.php';?>
   
   <?php

    
   //array($username,$location,$profile);
        
 if (!$_GET)
     {
            header('location:user-dashboard.php');
     die();
     }
    else if(isset($_GET))
     {
        
         $location = $_GET['loc'];
          $lastTicket = $_GET['lt']; 
        $dateExpected = $_GET['de']; 
    }


            
        
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/globalStyle.css">

    <title>ZenAux</title>
  </head>
  <body>
    
 
   
   
   <div class="d-flex">
       
  
     <div class="d-flex">
       
  <?php include 'aside-user.php'; ?>
    
     <div class="w-100">
   
   <?php include 'header.php'; ?>
   
  
  <div id="content">

      <section>
          
          <div class="container">
             
<div class="row">
    <h2>Great, you got the ticket # <?php echo $location.$lastTicket; ?> and this will be solved by </h2>
     <h2> <?php echo $dateExpected;?> </h2>
</div>
       
           
    
          </div>
      
      </section>
      
 
  
  
   </div>
    
    
    
 </div>
 </div>
      </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>