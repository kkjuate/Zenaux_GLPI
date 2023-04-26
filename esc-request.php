<?php include 'includes/esc_usr.inc.php';?>

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
       
  <?php include 'aside-esc.php'; ?>
    
     <div class="w-100">
   
   <?php include 'header.php'; ?>
   

  
  <div id="content">

      <section class='py-3'>
          
          <div class="container">
             

           
     <form action="includes/user_request.inc.php" method="POST" class="flex-form" enctype="multipart/form-data">
       <div class="form-group">
            <label for="userAffected">Who's having issues? (NT USER)</label>
            <input type="text" name="userAffected" pattern="[A-Za-z0-9]{9,12}" required class="form-control inputbox" placeholder="NT User! (Name doesn't work)" autofocus>
            <input type="checkbox" name="wfm-checker" value="WFH" checked >
            <label for="workFromHome">Is the user working from home? (Check only if the user is WFH)</label>
           
         </div>
         
         <div class="form-group">    
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
   <div class="form-group">     
<label for="description">Description</label>
<textarea name="description" id="" cols="60" required rows="10" class="inputbox form-control"></textarea>
</div>

<div class="form-group">
<label for="affectedUsers" class="form_lbl">Affected users</label>
<input type="number" name="affectedUsers" pattern="[0-9]{1,3}" required class="inputbox form-control" value="1">

</div>
        
        
       
  
                
                
                <input type="submit" value="submit" name="submit" class="btn btn-secondary btn-block">
            </form>
          
          </div>
      <br><br>
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