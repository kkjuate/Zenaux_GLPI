<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
 include 'includes/dBH.inc.php';
?>
    <div>
        <h1>Submit a ticket</h1>
            
    <form action="includes/user_nrequest.inc.php" method="POST" enctype="multipart/form-data">
 <label for="ticketTile">Subject</label>       
<input type="text" name="ticketDueBy"> <br>
<label for="ticketDescription">Description</label>
<input type="text" name="ticketTitle"><br>

<textarea name="ticketDescription" id="" cols="60" rows="10"></textarea><br>
       
<label for="ticketCategory">Related to</label>
          <select name="ticketCategory">
          <option value="category1">Unlock NT User</option>
          <option value="category2">Create NT User</option>
          <option value="category3">Hardware repair</option>
          <option value="category4">Software repair</option>
          </select>
          
<br>
       
<label for="ticketApprover">Approval required</label>
        <select name="ticketApprover">
          <option value="super1">J Escobar</option>
          <option value="super2">Wufthang</option>
          <option value="super3">C Mayrena</option>
        </select> 
        
        <br>
  
                 Select image to upload:
                <label for="fileToUpload">Evidences</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
    
    </div>
</body>
</html>