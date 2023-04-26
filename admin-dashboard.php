<?php include 'includes/session_adm.inc.php'?>


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

   
   <link rel="stylesheet" href="css/jquery.datetimepicker.css" type="text/css">
   
    <title>ZenAux</title>
  </head>
 
 
  <body>
  
   
   <!-- D-Flex includes everything inside the Body -->
   <div class="d-flex">
   
<?php include 'aside-admin.php'; ?>
    
    <!-- Open header includes everything inside the Body -->
   <div class="w-100">
       
<?php include 'header.php'; ?>
 
 
<div id="content">


  <section>
          
          <div class="container py-3">
              <div class="row">
                  <div class="col-lg-4">
                     <h2>Check metrics out</h2>
                    
                  </div>
                  <div class="col-lg-8 d-flex justify-content-end">
                     <form method="POST" class="form-inline" action="includes/excel.php">
                     
                     <label for="initialMonth" style="display:inline;">From:</label>
                     <input type="picker" id="initialMonth" name="initialMonth" class="form-control">
                     
                 <!--    <div>
                     <label for="initialMonth" style="display:inline;">From:</label>
                     <select name="initialMonth" class="form-control" id="">
                         <option value="06">Junio</option>
                         <option value="07">Julio</option>
                         <option value="08">Agosto</option>
                     </select>
                     </div>-->
                     
                     <div class="px-3">
                      <label for="initialMonth" style="display:inline;">To</label>
                        <input type="picker" id="endMonth" name="endMonth" class="form-control">
                     </div>
                      <button class="btn btn-secondary">Download MyReport</button>
                      </form>
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
                             <!--   <button class="btn btn-primary" onclick="refreshChart()" >Click this button pls</button>-->
                                 <h2 class="font-weight-bold">% of Attainment</h2>
                                 <h6 class="text-muted">Per month tracker, along the year</h6>
                               <canvas id="myChart" width="200" height="200">
                             </canvas>
                             
                            
                          </div>
                          
                          <div class="col-lg-4 myCard">
                            <h2 class="font-weight-bold">This month</h2>
                            <h6 class="text-muted">123 cases submitted and 111 are closed</h6>
                            
                            
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
             <!--Here we'll have the latest tickets-->
          </div>
      </section>





</div>
  
 
   </div>
    
    
    
 
 
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="  crossorigin="anonymous"></script>
   <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    
    <!--Tracker de attainment mensual-->
    
    <script>
       
       
        function refreshChart(){
            
            
            
             $.ajax({
                 url:'includes/graficos.php',
                 type: 'POST'
             }).done(function(e){
                 
                 var percentage = [];
                 var data =  JSON.parse(e);
                  // console.log(data['totalH']);
               var monthMonth = data[3];
               console.log(data);
               var porcentaje = data[5];
                 
                 var no = data[2];
                 var yes = data[4];
                 var labels = [yes, no];
                 
                 var sumas = [monthMonth, porcentaje];
                 
             console.log (labels);
                 
                   var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: '% of attainment',
                    data: sumas,
                    backgroundColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'

                    ],
                    borderColor: [
                        /*'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'*/

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
                    
                    })
             
           


             
             
         };
		 
		 
		 
		 var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['June', 'July', 'Aug'],
        datasets: [{
            label: '% of attainment',
            data: [55, 88, 60],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
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
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		  $(document).ready( function () {
			refreshChart();
			
		});
        
        

</script>

<!--Metrics de casos pendientes-->
     <script>
         
 
                     
                     
                     
                     
   

</script>
    <script src="js/jquery.datetimepicker.js"></script>
     <!-- End D-Flex -->
     
     <script>
       
         
        $('#initialMonth').datetimepicker({
            timepicker: false,
            datepicker:true,
            format: 'Y-m-d',
            value: '2020-8-15',
            weeks: true
            
        })
         
         
         
          $('#endMonth').datetimepicker({
            timepicker: false,
            datepicker:true,
            format: 'Y-m-d',
            value: '2020-8-15',
            weeks: true
            
        })
       </script>
       
       
      </div>
 
  </body>
</html>

<!--Footer-->




