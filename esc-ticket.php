  <?php   include 'includes/esc_usr.inc.php'; ?>


<?php


        
 if (!$_GET)
     {
           header('location:dash-request.php');
     die();
     }
    else if(isset($_GET))
        
        
     {
        
        
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
  
   
   <!-- D-Flex includes everything inside the Body -->
   <div class="d-flex">
   
<?php include 'aside-esc.php'; ?>
    
    <!-- Open header includes everything inside the Body -->
   <div class="w-100">
       
<?php include 'header.php'; ?>
 
 
<div id="content">

 <section>
         <div class="container py-3">
              
              <div class="card">
                  
                  <div class="card-body">
                      <div class="row d-flex">
                          
                          <div class="col-lg-4 myCard d-flex align-items-center">
                           
                          <button name="changes" id="change" class="btn btn-secondary myBtnDetails">Changes</button>
                                                  
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
     
     <section class="container">
         
         
         <div class="container">
      
     
      <form action="includes/esc_submit.inc.php" method="POST" enctype="multipart/form-data">
      
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
         
                  <div class="form-group" id="queue" style="display:none;">
                  
            <label for="category">Escalate to another dept</label>
            
            <select name="queue" class="form-control">
                <option value="FAC">Facilities - Default option</option>
				<option value="IT">IT</option>
				<option value="SEC">Security</option>
                <option value="LEN">Lenovo</option>
                <option value="NAT">NAT</option>
           </select>
           
             <div class="form-group" style="display:none;" >
          <label for="caseID">Related to</label>
          <select name="caseID" class="inputbox form-control">
            <option value="SUP16">Application issues</option>
            <option value="SER10">Background Images</option>
            <option value="SUP08">Cellphone Hardening</option>
            <option value="NET02">Clear Ports</option>
            <option value="SUP05">Connectivity </option>
            <option value="SER12">Data transfer</option>
            <option value="SUP09">Desktops Hardening</option>
            <option value="SUP10">Device Request</option>
            <option value="SER05">Disable NT users</option>
            <option value="SER16">DUO</option>
            <option value="SUP07">Email creation</option>
            <option value="SUP15">Email Issue</option>
            <option value="SUP06">Email Setup</option>
            <option value="SUP18">Equipment set-up</option>
            <option value="SER13">Files Recovery</option>
            <option value="SUP04">Hardware to Repair</option>
            <option value="SUP13">Headset issues</option>
            <option value="SUP17">Install app</option>
            <option value="SUP11">Maintenance</option>
            <option value="NET05">Network Hardware Configuration</option>
            <option value="NET12">Network Health</option>
            <option value="NET13">Network Monitoring</option>
            <option value="NET09">Network Performance Tuning.</option>
            <option value="NET06">Network Troubleshooting</option>
            <option value="SER04">NT Users Creation</option>
            <option value="SUP02">Peripherals Settings</option>
            <option value="SUP01">Printer / Scanner Configuration</option>
            <option value="SER03">Profiles Changes</option>
            <option value="NET07">Proxy</option>
            <option value="SER11">Proxy</option>
            <option value="SER15">Reset Passwords</option>
            <option value="SER01">Share folders</option>
            <option value="SER09">Software access</option>
            <option value="SUP03">Software to Repair</option>
            <option value="SER08">Sofware Updates</option>
            <option value="SER14">Unlock NT users</option>
            <option value="SER06">Unlog Nt users</option>
            <option value="SER07">Update servers</option>
            <option value="SUP12">Updates</option>
            <option value="SER02">URL Access</option>
            <option value="NET04">VLAN Change</option>
            <option value="NET03">VLAN Creation</option>
            <option value="NET08">VOIP setup</option>
            <option value="NET11">VPN Change</option>
            <option value="NET10">VPN Creation</option>
            <option value="NET14">VPN Issue</option>
            <option value="NET01">Wireless Access</option>
            <option value="SUP14">WFH Equipment set-up</option>
          </select>
         </div>
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
                <input type="submit" value="submit" name="submit" class="btn btn-secondary btn-block">
               </div>
<!--           
                 <fieldset class="form-group" style="display:none;" id="timber-frame-fieldset">
    <label for="PartyWalls">Which walls are party walls?</label>
     <br><input type="checkbox"> W1
     <br><input type="checkbox"> W2
     <br><input type="checkbox"> W3
     <br><input type="checkbox"> W4
          </fieldset>-->
      
      
          
         </form>
         <br><br>

  </div>
         
     </section>




</div>
  
 
   </div>
    
    
    
 
 
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    
    <!--Tracker de attainment mensual-->
    
    

<!--Metrics de casos pendientes-->
     <script>
    
$(document).ready(function(){
  $("#change").on("click", function(e){
      
      var x = document.getElementById('queue');
      
   if (x.style.display=='block') {
      x.style.display='none';
   } else if (x.style.display=='none')  {
      x.style.display='block';
      
 }
    
  });
});

        
     </script>
      </div>
 
  </body>
</html>

<!--Footer-->




