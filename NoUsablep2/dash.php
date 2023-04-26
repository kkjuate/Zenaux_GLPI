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


     
            
        
?>
<!--head.php-->

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
        
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/globalStyle.css">

    <title>ZenAux</title>
  </head>
  <!--head.php-->
  
  <!--aside-admin.php-->
 
  <body>
   
   <div class="d-flex">
       
  <?php include 'aside-admin.php'; ?>
    <!--<div id="sidebar-container" class="bg-primary">
        <div class="logo d-flex justify-content-center align-items-center py-5">
    
       <img src="img/acce.png" height="50" class="imgLogo" alt="">
        </div>
        
         <div class="menu">
           <div class="menu">
            <a href="dash.php" class="d-block text-light py-3"><i class="icon ion-md-home px-3"></i>Home/Dashboard</a>
            <a href="dash-request.php" class="d-block text-light py-3"><i class="icon ion-md-add py-3 px-3"></i>New ticket</a>
            <a href="dash-list.php" class="d-block text-light py-3"><i class="icon ion-md-apps py-3 px-3"></i>Open Tickets</a>
            <a href="dash-history.php" class="d-block text-light py-3"><i class="icon ion-md-filing py-3 px-3"></i>Ticket History</a>
                        
        </div>
                        
        </div>
        
    </div>-->
    
     <!--aside-admin.php-->
     
    <!--header.php-->
    
     <div class="w-100">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!--<a class="navbar-brand" href="#">Navbar</a>-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
       
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $_SESSION['user'][0] . " ( " . $LOB . " )";?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="INCLUDES/logout.inc.php">Sign out</a>
          
        </div>
      </li>
     
    </ul>
   
  </div>
</nav>
 
 
 <!--header.php-->
 
 <!--content-->
  
  <div id="content">
      <section>
          
          <div class="container py-3">
              <div class="row">
                  <div class="col-lg-9">
                     <h2>Check metrics out</h2>
                    
                  </div>
                  <div class="col-lg-3">
                     <button class="btn btn-secondary">Download MyReport</button>
                  </div>
                  
              </div>
              
                    
              
          </div>
          
      </section>
      
      <section>
          
          <div class="container">
              
              <div class="card">
                  
                  <div class="card-body">
                      <div class="row">
                          <div class="col-lg-4 myCard">
                           
                            <!--Grafica-->
                                 <h2 class="font-weight-bold">% of Attainment</h2>
                                 <h6 class="text-muted">Per month tracker, along the year</h6>
                               <canvas id="myChart" width="200" height="200">
                             </canvas>
                             
                            
                          </div>
                          
                          <div class="col-lg-4 myCard">
                            <h2 class="font-weight-bold">Closed of open</h2>
                            <h6 class="text-muted">Monthly metric</h6>
                            
                            <h2 class="font-weight-bold">122 cases closed of</h2>
                            <h5 class="font-weight-bold">123 total cases</h5>
                          </div>
                          
                          <div class="col-lg-4 myCard">
                                 <h2 class="font-weight-bold">% of Attainment</h2>
                                 <h6 class="text-muted">of current month</h6>
                              <canvas id="myChart2" width="180" height="180">
                                 
                             </canvas>
                          </div>
                          
                          
                      </div>
                  </div>
                  
              </div>
              
          </div>
          
      </section>
      
      <section>
          
          <div class="container">
             
             
                              
              
             <!-- <div class="row">
                  
                  <div class="col-lg-12">
                      
                      
                      <h2>Aquilatest of latest</h2>
                      
                      
                  </div>
                  
              </div>-->
              
          </div>
      </section>
      
     
      
  </div>
  
   <!--content-->
   
   <!--Footer-->
   </div>
    
    
    
 
 
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    
    <!--Tracker de attainment mensual-->
    
    <script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['July', 'Aug'],
        datasets: [{
            label: '% of attainment',
            data: [78,70],
            backgroundColor: [
              //  'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 0.1)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
               
            ],
            borderWidth: 1,
            maxBarThickness: 30
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>

<!--Metrics de casos pendientes-->
     <script>
         
var ctx = document.getElementById('myChart2').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['July', 'Aug'],
        datasets: [{
            label: '% of attainment',
            data: [78, 93],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
               
            ],
            borderWidth: 1,
            maxBarThickness: 30
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
      </div>
 
  </body>
</html>

<!--Footer-->




