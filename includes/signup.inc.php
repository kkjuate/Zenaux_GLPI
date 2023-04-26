<?php


if(isset($_POST['signup-submit'])){

    require 'dbH.inc.php';
    
    
    $username = $_POST['fusername'];
    $password = $_POST['fpassword'];

    if (empty($username)|| empty($password)){
        echo 'fuckempty';
    }else{
        $sql = "INSERT INTO zenaux_db (_ntUser, _ntPass) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo 'efefefefefe';
        }
        else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt,"ss", $username, $hashedPwd);
            mysqli_stmt_store_result($stmt);
            echo 'fuckempty';
    }}}
    
