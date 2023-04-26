
  <?php
    
session_start();
    
   //array($username,$location,$profile);
        
if(isset($_SESSION['user'])){
    
    if($_SESSION['user'][2] == 'BOGATIT') {
         include 'includes/ticket_list.inc.php';
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


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
   
<script type="text/javascript" charset="utf8" src=" https://cdn.datatables.net/1.10.21/js/jquery.js"></script>    
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>


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
    <form class="form-inline my-2 my-lg-0">
      <input id="searchBox" class="form-control mr-sm-2" type="text" placeholder="Search" autofocus>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
   <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
       
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $_SESSION['user'][0] . " ( " . $LOB . " )";?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="includes/logout.inc.php">Sign out</a>
          
        </div>
      </li>
     
    </ul>
   
  </div>
</nav>
  
  <div id="content">
    
      
      <section>
          
          <div class="container">
              
              <div class="card myCard2">
                  
                  <div class="card-body">
                      <div class="row moreInfo w-100">
                          
                           
                           <div class="col-lg-4 be">
                              <a href="#" class="ticket-open px-2">●</a>
                             <h6 class="text-muted">Open</h6>
                             </div>
                           <div class="col-lg-4 be">
                             <a href="#" class="ticket-other px-2">●</a><h6 class="text-muted">In progress</h6>
                             </div>
                            <div class="col-lg-4 be">
                             <a href="#" class="ticket-closed px-2">●</a><h6 class="text-muted">Closed</h6>
                          </div>
                          
                          
                      
                  </div>
                  
              </div>    </div>    </div>
              
          
          
      </section>
      
      
      <section>
          
          <div class="container">
              
              <div class="row">
                  
                  <div class="col-lg-12">
                      
                      
                     <div class="table-responsive">  
                     <table id="data_table" class="table">  
                          <thead>  
                               <tr>  
                                    <td>Ticket ID</td>  
                                    <td>Brief Description</td>
				                    <td>User affected</td>   
                                    <td>Ticket Date</td> 
                                    <td>Status</td>  
                                    <td>LOB</td>  
                               </tr>  
                          </thead> 
                          <tbody>
                          
                          <?php  
                           include 'includes/ticket_list_rows_adm.inc.php';
                          ?> 
                          
                          </tbody> 
                     </table> 
                      
                      
                  </div>
                  
              </div>
              
          </div>
     
      
 </div> 
     
      </section>
      </div> 
       </div>
      </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
    <script>  

    $(document).ready( function () {
   
        var table = $('#data_table').DataTable({
        
        "dom": 'tpr',
        "order": [[ 3, "asc" ]],
        "columnDefs": [
            { width: 150, targets: 0 }    ],
            fixedColumns: true
        }
        );
      $('#searchBox').on( 'keyup', function () {
       table.search( this.value ).draw();
} );
} );
    


        
      
</script> 
    
  </body>
</html>