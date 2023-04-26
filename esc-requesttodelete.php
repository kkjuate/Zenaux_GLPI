<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/formStyles.css">
</head>
<body>

<?php
 include 'includes/dBH.inc.php';
?>
   <div class="main">
    <div class="subheader">
        <h1>Submit a ticket</h1>
        </div>   
		    <div class="submain form-group"> 
                <form action="includes/user_request.inc.php" method="POST" class="flex-form" enctype="multipart/form-data">
       
            <label for="userAffected">Who's having issues? (NT USER)</label>
            <input type="text" name="userAffected" class="form-control inputbox" placeholder="NT User! (Name doesn't work)">
            
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
          

        
<label for="description">Description</label>
<textarea name="description" id="" cols="60" rows="10" class="inputbox form-control"></textarea>

<label for="affectedUsers" class="form_lbl">Affected users</label>
<input type="number" name="affectedUsers" class="inputbox form-control" value="1">

        
        
       
  
                
                
                <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
            </form>
           </div>
    
    </div>
   
</body>
</html>