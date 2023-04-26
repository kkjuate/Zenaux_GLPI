<?php
  include 'includes/session_usr.inc.php';
    
   //array($username,$location,$profile);
        
 if (!$_GET)
     {
            header('location:dash-request.php');
     die();
     }
    else if(isset($_GET))
     {
        $ticketNumber = $_GET['ticketN'];
        
    }



                  

        if (isset($_GET['ticketN'])){
            
            $query = "SELECT * FROM ticket where ticketNumber = $ticketNumber";
            $result = sqlsrv_query($conn,$query);
            $row = sqlsrv_fetch_array($result);
            
            if ($row[15]!= $_SESSION['user'][1]) {
                header('location:user-dashboard.php');
                die();
            }
            
        $ticketNumber = $_GET['ticketN'];
       
            $affectedUsers = $row[12];
            $caseID = $row[3];
            $LOB = $row[15];
            $location = $row[1];
            $dateExpected = date_format($row[6], 'm-d-Y H:i:s');
            $records = $row[14];
            $description = $row[4];
            $ticketStatus = $row[13];
            }else {
            $ticketNumber = '';
            $query = '';
           $affectedUsers = '';
            $caseID = '';
            $LOB = '';
            $location = '';
            $dateExpected = '';
            $description = '';
            $row[14]='';
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
    <link rel="stylesheet" href="css/globalStyle.css">

    <title>ZenAux</title>
  </head>
  <body>

   <div class="d-flex">
       
  
     <?php include 'aside-user.php'; ?>
    
     <div class="w-100">
   
   <?php include 'header.php'; ?>
   
  
  <div id="content">
      
          
      
         
         <section>
         <div class="container py-3">
              
              <div class="card">
                  
                  <div class="card-body">
                      <div class="row d-flex">
                          
                          <div class="col-lg-4 myCard d-flex align-items-center">
                           
                        
                                                  
                            <span class="dash-ticket-details"><?php echo $affectedUsers; ?> affected users with: <?php echo $caseID; ?></span>

                            
                          </div>
                          
                          <div class="col-lg-4 myCard d-flex justify-content-center align-items-center">
                                 <a href='#' class='attachment'>Attatchments</a>
                                   
                          </div>
                             
                              <div class="col-lg-4 myCard d-flex justify-content-center align-items-center">
                              <span class="px-3"><i class="icon ion-md-time"></i></span>
                             <i class='fa fa-clock'></i> <a href="#" class='sDateExpected'>  <?php echo $dateExpected; ?>  </a>
                          
                              </div>
                          
                  </div>
                  
              </div>
              
                  </div>
             </div>
             
     </section>
     
     <section>
         
         
         <div class="container">
      
      <form action="#" method="POST" enctype="multipart/form-data">
     
          <div class="form-group">
            <label for="description">User's description</label>
            <textarea class="form-control" name="description" cols="60" rows="6" readonly><?php echo $description; ?></textarea>
          </div>
          <div class="form-group">
            <label for="history">History / Solution</label>
            <textarea class='history form-control' name='historyread' class="form-control" cols="60" rows="6" readonly><?php echo $row[14]?></textarea>
            
             
          </div>
         
             
          
      
      
       
         </form>
 
  </div>
         
     </section>
      
 
  
  
         
    
    
    
         </div>
         </div></div>
 
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>