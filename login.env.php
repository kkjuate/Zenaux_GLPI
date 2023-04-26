<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylesx.css" /> 
        <script src="https://kit.fontawesome.com/7201f5c75a.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <title>Zenaux Ticketing System</title>
</head>
<body>

<header class="header container">  
   
</header>
           
<main class="loginschema">
   
                 
        
  
    
    <br>
    <form class="frm-signIn" action="includes/session.env.php" method="POST">
     <h1 class="frm-title">Zenaux</h1>  
     <?php
    
     if (!$_GET)
     {
            $username = '';
     }
    else if(isset($_GET['error']))
     {
        
        if($_GET['error'] == "emptyfields")
        {
            echo '<p class="errorMessage">Empty fields!</p>';
              if(isset($_GET['username']))
                {
                $username = $_GET['username'];
                }
        }
            else if ($_GET['error'] == "wronginfo")
        {		$DB = $_GET['DB'];
                echo '<p class="errorMessage">Wrong Info! and the info for the match is $DB</p>';
                 if(isset($_GET['username']))
                {
                $username = $_GET['username'];
                }
        } 

			else if ($_GET['error'] == "emailNotFound")
        {
                echo '<p class="errorMessage">Your account does not have an e-mail associated. Contact your local helpdesk for help. Apologies for the inconvenience.</p>';
                 if(isset($_GET['username']))
                {
                $username = $_GET['username'];
                }
        } 	
		else if ($_GET['error'] == "OUNotFound")
        {
				$OUNotFound = $_GET['OU'];
				
								
                echo "<p class='errorMessage'>We are having a hard time to validate your department. Contact helpdesk and share this info: <strong>$OUNotFound </strong></p>";
                if(isset($_GET['username']))
                {
                $username = $_GET['username'];
                }
        }else if ($_GET['error'] == "DB"){
		     $DB = $_GET['DB'];
			echo "<p class='errorMessage'>The problem is we're finding this: <strong>$DB </strong></p>";
			
		} 
         else if ($_GET['logout'] == "success"){
                $username='';
            } 
    }
        
    
                 
        
  
    ?>

    <!--  <span> <i class="fas fa-user iconx"></i></span>-->
        <input type="text" placeholder="Enter your NT User" pattern="[A-Za-z0-9]{9,12}" required name="username" class="inputs form-control" pattern="[A-Za-z0-9*$.!]"autofocus value="<?=$username?>">
 <!--  <span><i class="fas fa-key iconx"></i></span>-->
        <input type="password" placeholder="Enter your password" required name="password" class="inputs form-control">
        <input type="submit" value="SIGN IN" class="btn btn-primary btn-block" name="submit">
		<div class="form-group d-flex justify-content-center">
<!--  		<a href="includes/session.env.php" class="text-muted py-3">Can't get in</a>-->
		</div>
    </form>

</main>


<footer class="foot">Accedo Technologies</footer>
</body>
</html>
    