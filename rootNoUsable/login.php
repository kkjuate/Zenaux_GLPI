<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylesx.css" /> 
        <script src="https://kit.fontawesome.com/7201f5c75a.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <title>IPD x</title>
</head>
<body>

<header class="header container">  
   
</header>
           
<main class="loginschema">
   
                 
        
  
    
    <br>
    <form class="frm-signIn" action="includes/login.inc.php" method="POST">
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
        {
                echo '<p class="errorMessage">Wrong Info!</p>';
                 if(isset($_GET['username']))
                {
                $username = $_GET['username'];
                }
        }  
          
    }
        else if ($_GET['logout'] == "success"){
                $username='';
            }
    
                 
        
  
    ?>

    <!--  <span> <i class="fas fa-user iconx"></i></span>-->
        <input type="text" placeholder="Enter your NT User" pattern="[A-Za-z0-9]{9,12}" required name="username" class="inputs form-control" pattern="[A-Za-z0-9*$.!]"autofocus value="<?=$username?>">
 <!--  <span><i class="fas fa-key iconx"></i></span>-->
        <input type="password" placeholder="Enter your password" required name="password" class="inputs form-control">
        <input type="submit" value="SIGN IN" class="btn btn-primary btn-block" name="submit">
    </form>

</main>


<footer class="foot">Accedo Technologies</footer>
</body>
</html>
    