<!DOCTYPE html>  
 <html>  
      <head>  
            <title>IPD</title>  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
         <link rel="stylesheet" href="css/typography.css" />
         <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script> 
            <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
            <!--<link rel="stylesheet" href="css/styles.css" />  -->
	 <meta charset="UTF-8">

<?php  
                   include 'includes/ticket_list.inc.php';

?> 
                 </head>  
      <body> 
          <div class="logo"><a href="admin_dashboard.php">Volver al dashboard</a></div> 
           <br/><br/>  
           <header class="container">  
                <h1>Ticket</h1>  
                <br/>  
            </header>
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
                           include 'includes/ticket_list_rows.inc.php';
                          ?> 
                          
                          </tbody> 
                     </table>  
                </div>  
           
      </body>  
 </html> 
 <script>  

     
     $(document).ready( function () {
    $('#data_table').DataTable();
} );
     
/*     
 $(document).ready(function(){  
    $('#data_table').DataTable();  
     document.getElementsByTagName("input")[0].placeholder = "Find a Ticket";
          document.getElementsByTagName("input")[0].focus();

 });  */
      
</script> 
<!--

<script type="text/javascript" src="js/customjs.js"></script> 
-->
