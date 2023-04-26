<?php
    
session_start();
    
   //array($username,$location,$profile);
        
 if (!$_GET)
     {
           header('location:dash-request.php');
     die();
     }
    else if(isset($_GET))
        
        
     {
        
        
    }


if(isset($_SESSION['user'])){
    include 'includes/dBH.inc.php'; 
    if($_SESSION['user'][2] != 'BOGATIT') {
      header('Location:ticket-user.php');
        if($_SESSION['user'][2] == 'BP9ATBB'){
            $LOB='BBY';
        } else if ($_SESSION['user'][2] == 'BP9ATCH'){
            $LOB='CHS';
        }
        
    } else if($_SESSION['user'][2] == 'BOGATIT'){
        $LOB='IT';
    }
    
}
else {
    header('location:login.php');
    die();
}

         
        if (isset($_GET['ticketN'])){
        $ticketNumber = $_GET['ticketN'];
        $query = "SELECT * FROM ticket where ticketNumber = $ticketNumber";
            $result = sqlsrv_query($conn,$query);
            $row = sqlsrv_fetch_array($result);
            $affectedUsers = $row[12];
            $caseID = $row[3];
            $LOB = $row[15];
            $location = $row[1];
            $dateExpected = date_format($row[6], 'm-d-Y H:i:s');
            $records = $row[14];
            $description = $row[4];
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
     <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/globalStyle.css">

    <title>ZenAux</title>
  </head>
  <body>

   <div class="d-flex">
       
  
  <div id="sidebar-container" class="bg-primary">
        <div class="logo d-flex justify-content-center align-items-center py-5">
<img src="img/acce.png" class="imgLogo" alt="">           
        </div>
        
         <div class="menu">
           <div class="menu">
            <a href="dash.php" class="d-block text-light py-3"><i class="icon ion-md-home px-3"></i>Home/Dashboard</a>
            <a href="dash-request.php" class="d-block text-light py-3"><i class="icon ion-md-add py-3 px-3"></i>New ticket</a>
            <a href="dash-list.php" class="d-block text-light py-3"><i class="icon ion-md-apps py-3 px-3"></i>Open Tickets</a>
            <a href="dash-history.php" class="d-block text-light py-3"><i class="icon ion-md-filing py-3 px-3"></i>Ticket History</a>
                        
        </div>
                        
        </div>
        
    </div>
    
     <div class="w-100">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!--<a class="navbar-brand" href="#">Navbar</a>-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
       
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $_SESSION['user'][0] . " ( " . $LOB . " )";?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Sign out</a>
          
        </div>
      </li>
     
    </ul>
   
  </div>
</nav>
  
  <div id="content">

     <section>
         <div class="container py-3">
              
              <div class="card">
                  
                  <div class="card-body">
                      <div class="row d-flex">
                          
                          <div class="col-lg-4 myCard d-flex align-items-center">
                           
                          <button name="changes" class="btn btn-secondary myBtnDetails">Changes</button>
                                                  
                            <span class="dash-ticket-details"><?php echo $affectedUsers; ?> affected users with: <?php echo $caseID; ?></span>

                            
                          </div>
                          
                          <div class="col-lg-4 myCard d-flex justify-content-center align-items-center">
                                 <a href='#' class='attachment'>Attatchments</a>
                                   
                          </div>
                             
                              <div class="col-lg-4 myCard d-flex justify-content-center align-items-center">
                             <i class='fa fa-clock'></i> <a href="#" class='sDateExpected'> <?php echo $dateExpected; ?>  </a>
                          
                              </div>
                          
                  </div>
                  
              </div>
              
                  </div>
             </div>
             
     </section>
     
     <section>
         
         
         <div class="container">
      
      <form action="includes/tech_submit.inc.php" method="POST" enctype="multipart/form-data">
      
      <input type="text" hidden name="ticketNumber" value="<?php echo $ticketNumber; ?>">
     
          <div class="form-group">
            <label for="description">User's description</label>
            <textarea class="form-control" name="description" readonly><?php echo $description; ?></textarea>
          </div>
          <div class="form-group">
            <label for="history">History / Solution</label>
            <textarea class='history form-control' name='historyread' class="form-control" cols="60" rows="4" readonly><?php echo $row[14]?></textarea>
             <textarea class='history form-control' name='history' class="form-control" cols="60" rows="4"></textarea><br>
          </div>
         <div class="form-group">
    <label for="ticketStatus">Ticket Status</label>
          <select name="ticketStatus" class="form-control">
          <option value="In progress">In progress</option>
          <option value="Hold">Hold</option>
          <option value="Closed">Closed</option>
            
             </select>
               </div>
               <div class="form-group">
                <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
               </div>
           
          
      
      
       
         </form>
 
  </div>
         
     </section>
     
      
  
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