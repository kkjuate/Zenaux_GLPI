  
     <?php   include 'includes/session_adm.inc.php'; ?>
   
   


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
 
 
  <body>
  
   
   <!-- D-Flex includes everything inside the Body -->
   <div class="d-flex">
   
<?php include 'aside-admin.php'; ?>
    
    <!-- Open header includes everything inside the Body -->
   <div class="w-100">
       
<?php include 'header.php'; ?>
 
 
<div id="content">

 <section>
          
          <div class="container">
             

           
     <form action="includes/user_request.inc.php" method="POST" class="flex-form" enctype="multipart/form-data">
       <div class="form-group">
            <label for="userAffected">Who's having issues? (NT USER)</label>
            <input type="text" pattern="[A-Za-z0-9]{7,20}" name="userAffected" class="form-control inputbox" placeholder="NT User! (Name doesn't work)" autofocus>
            
            
             <input type="checkbox" id="wfm-checker" name="wfm-checker" value="WFH" checked >
            <label for="workFromHome" id="checker-label">Is the user working from home? (Check only if the user is WFH)</label>
           
         </div>
           
           
            <div class="form-group">
          <label for="caseID">Related to</label>
          <select name="caseID" id="caseIDSelector" class="inputbox form-control">
             <?php
		 
		 include 'includes/dbH.inc.php';
		 
		 $queryItems = "SELECT idCase, issueDescryption AS iDescription FROM caseIds ORDER BY iDescription ASC;";
		 $getItems = sqlsrv_query($conn, $queryItems);
		 
		 if ($getItems) {
				
				while($row = sqlsrv_fetch_array($getItems)){
					$idCase = $row['idCase'];
					$iDescription = $row['iDescription'];
					echo "<option value='$idCase'>$iDescription</option>";
				}
			 
			 
		 }else {
			 echo 'Unable to load the items';
		 }
		 ?>
          </select>
         </div>

         <div class="form-group">
            <label for="caseID">Common issues</label>
            <a href="#" class="badge badge-pill badge-info" id="commonIssues2" onclick="commonIssue1()">Audio issues</a> 
            <a href="#" class="badge badge-pill badge-info" id="commonIssues1" onclick="commonIssue2()">Unlock NT Users</a>
            <a href="#" class="badge badge-pill badge-info" id="commonIssues1" onclick="commonIssue3()">Applications Issues</a>
         </div>


        
<label for="description">Description</label>
<textarea name="description" id="" cols="60" rows="10" class="inputbox form-control"></textarea>
<div class="form-group">
<label for="affectedUsers" class="form_lbl">Affected users</label>
<input type="number" name="affectedUsers" class="inputbox form-control" value="1">
</div>
        
        
       
  
                
                
                <input type="submit" value="submit" name="submit" class="btn btn-secondary btn-block">
                
               
            </form>
          
          </div>
      
      </section>
      


</div>
  
 
   </div>
    
    
    
 
 
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    <script>
    
      function commonIssue1() {
        x = document.getElementById("caseIDSelector");
        x.options[x.selectedIndex].text = "Audio issues";
      }
      function commonIssue2() {
        x = document.getElementById("caseIDSelector");
        x.options[x.selectedIndex].text = "Unlock NT Users";
      }
      function commonIssue3() {
        x = document.getElementById("caseIDSelector");
        x.options[x.selectedIndex].text = "Applications Issues";
      }

 


    </script>
    
    
    
     <!-- End D-Flex -->
      </div>
 
  </body>
</html>

<!--Footer-->




