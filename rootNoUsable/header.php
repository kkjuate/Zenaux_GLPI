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