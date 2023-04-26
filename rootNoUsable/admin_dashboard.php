<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">
</head>
<body>
   
   <?php 
    
    include 'includes/session_validator.inc.php';
    include 'includes/admin_dashboard.inc.php';
    ?>
    <div class="section-1">
    <header>
        <link rel="stylesheet" href="css/style-dashboard.css">
        <p class="sessionInfo"><?php echo $ntUser . " ";?><span class="lobStyle">(<?php echo $LOB ?>)</span> <span class="notificationArea"><i class="fas fa-user"></i></span> </p>
    </header>
    
    </div>
      
           <div class="section-2">
       <aside class="navBar">
        <ul class="navBarUL">
            <li class="navBarLi"><a href="user_request.php" class="navBara"><i class="fas fa-plus"></i></a></li>
            <li class="navBarLi"><a href="ticket_list.php" class="navBara"><i class="fas fa-list"></i></a></li>
            <li class="navBarLi"><a href="ticket_history.php" class="navBara"><i class="fas fa-archive"></i></a></li>
        </ul>
        </aside>
        
        
   
       <main>
        
                
        <div class="container-1">
           
            <div class="subcontainer trackerAttainment">
                <h2 class="sub-container-text">Graphic of attainment percentage</h2>
            </div>
            
            <div class="subcontainer trackerOpenClosed">
               <h2 class="sub-container-text">Monthly Metric: Open / Closed</h2>
                <?php echo "<p class='counter'> $rowsClosed[0] from $rowsTotal[0] </p>"?>
            </div>
            
             <div class="subcontainer attainmentPercentage">
                 <h2 class="sub-container-text">Tickets closed on time</h2>
                 <?php echo "<p class='counter'> $rowsY[0] from $totalAttainment </p>"?>
            </div>
            
                    </div>
                    
                    <div class="container-2">
        
        <div class="trackerTop">
           <p>akiTops</p>
        </div>
           </div>
    </main>
    
    </div>
    
        
</body>
</html>