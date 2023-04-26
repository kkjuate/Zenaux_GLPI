<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zenaux</title>
  <!--  <link rel="stylesheet" href="css/styles-ticket.css">-->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/all.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/formStyles.css">
</head>
<body>

<?php
 //include 'includes/session_validator.inc.php';
 include 'includes/dBH.inc.php';
    
?>
   
   <div>
       
       
   </div>
    <div class="main form-group">
       <div class="subheader">
        <h1>Review a ticket</h1>
            </div>   
            <div class="submain"> 
    <form action="includes/tech_submit.inc.php" method="POST" enctype="multipart/form-data">
    
       <button name="changes" class=" btn btn-secondary">Changes</button>
        <label for="status" hidden>Issue: (Only if necessary to change the type of issue) </label>
         <select name="Issue" hidden>
          <option value="SER01">SER01</option>
          <option value="NET01">NET01</option>
          <option value="SUP01">SUP01</option> 
        </select>
        
      <?php 
        
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
        
     
      echo "<div class='ticketHeader'>";
        echo "<p class=''>" . $affectedUsers . " Affected users with : " . $caseID . " (" . $LOB . ")" . "</p>";
        echo "<a href='#' class='attachment'>Attatchment for: ". $location . $ticketNumber ."</a></br>";
        echo "<i class='fa fa-clock'></i> <p class='sDateExpected'> " . $dateExpected .  "</p>";
     echo "</div>";
        echo "<label for='description'>User's description</label> <br>";
        echo "<textarea class='sDescription form-control' cols='60' rows='4' name='description' readonly>" . $description . "</textarea> <br>";
        
        ?>
        <input type="text" class="form-control" name="ticketNumber" value="<?php echo $ticketNumber ?>" hidden>
        <label for='history'>History / solution </label> <br>
        <textarea class='history form-control' name='historyread' class="form-control" cols="60" rows="4" readonly><?php echo $row[14]?></textarea>
          
        <textarea class='history form-control' name='history' class="form-control" cols="60" rows="4"></textarea><br>
       
        <label for="escalation">Escalation Number <span>(if applicable)</span></label><br>
         <input type="text" name="escalation" class="form-control"><br>
         
          <label for="ticketStatus">Ticket Status</label>
          <select name="ticketStatus" class="form-control">
          <option value="In progress">In progress</option>
          <option value="Hold">Hold</option>
          <option value="Closed">Closed</option>
             </select> <br>
                <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block">
         </form>
                
                 
               
            </div>
    
    </div>
</body>
</html>