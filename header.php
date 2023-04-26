  
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!--<a class="navbar-brand" href="#">Navbar</a>-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0">
    <input id="searchBox" class="form-control mr-sm-2" type="text" placeholder="Search" autofocus>
      <!--      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item dropdown">
       
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php echo $_SESSION['user']['displayName'] . " ( " . $_SESSION['user']['userOU'] . " )";?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="includes/logout.inc.php">Sign out</a>
          
        </div>
      </li>
     
    </ul>
   
  </div>
</nav>