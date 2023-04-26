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
   
<?php
      include 'aside-admin.php';
 ?>
      
      
     <!--aside-admin.php-->
     
    <!--header.php-->
    
     <div class="w-100">
     
     
   <?php include 'header.php'; ?>
 
 
 <!--header.php-->
 
 <!--content-->
  
  <div id="content">
    
    
    <?php include 'content-dashboard-admin.php';?>
      
     
      
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




