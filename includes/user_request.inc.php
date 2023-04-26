<?php
session_start();
include 'dbH.inc.php';
$sessionInfo = $_SESSION["user"];
$email = $sessionInfo["userEmail"];
$ticketOwner = $sessionInfo["username"];
$emailSite = $sessionInfo["site"];
$HDTeamEmail = $sessionInfo["helpdeskEmail"];
$HDTeamExt1 = $sessionInfo["helpdeskExt"];
$HDTeamExt2 = $sessionInfo["helpdeskExt247"];
$HDTeamCell = $sessionInfo["helpdeskExtCell"];
$siteLoc = $sessionInfo["site"];
        



if ($_SERVER['REQUEST_METHOD']=='POST'){

//$_POST['user'] = $_SESSION['user'][0];  



$affectedUser = $_POST['userAffected'];


if (!isset($_POST['wfm-checker'])) {
      $wfm = 'WFO';
    } else{
        $wfm = $_POST['wfm-checker'];  
    }


    
    
/*if ($toValidate = "BOGATIT") {
    $LOB="IT";
}*/
     
    


$affectedUsers = $_POST['affectedUsers'];


    
$caseID = $_POST['caseID'];

$description = $_POST['description'];
date_default_timezone_set('America/bogota');  
$dateInitial = date("Y-m-d H:i:s");  
    
    

$query = "SELECT TOP (1) ticketNumber FROM ticket order by ticketNumber desc;";
$query2 = "SELECT issueDescryption from caseIds where idCase = '$caseID';";
$query3 = "SELECT userFName from userInfo where userNt = '$affectedUser';";
//$query4 = "UPDATE userInfo SET userEmail = '$email' WHERE userNt = '$ticketOwner';";

$result = sqlsrv_query($conn,$query);
$result2 = sqlsrv_query($conn,$query2);
$result3 = sqlsrv_query($conn,$query3);
//$result4 = sqlsrv_query($conn,$query4);
    
$row = sqlsrv_fetch_array($result);
$row2 = sqlsrv_fetch_array($result2);
$row3 = sqlsrv_fetch_array($result3);
//$row4 = sqlsrv_fetch_array($result4);
   
$lastTicket = $row['ticketNumber'];
$issueDescription = $row2['issueDescryption'];
    
    if (!isset($row3['userFName'])){
		include_once 'functions_ldap.php';
		$userFName = matchUserNotFound($affectedUser,$siteLoc);
		
    } else {
        $userFName = $row3['userFName'];
    }

$lastTicket++;
  
    //newTicket listo para insert

 /// pending to be assigned by session






    
if ($affectedUsers == 1) {
    $severity = 1;
    $dateExpected = date("Y-m-d H:i:s",strtotime($dateInitial."+ 10 minutes")); 
} else if ($affectedUsers < 4) {
    $severity = 2;
    $dateExpected = date("Y-m-d H:i:s",strtotime($dateInitial."+ 120 minutes")); 
} else if ($affectedUsers < 9) {
    $severity = 3;
    $dateExpected = date("Y-m-d H:i:s",strtotime($dateInitial."+ 180 minutes")); 
} else {
    $severity = 4;
    $dateExpected = date("Y-m-d H:i:s",strtotime($dateInitial."+ 360 minutes")); 
}


    

    

    
$ticketStatus = "open";
    
$query = "INSERT INTO ticket(location, ntUser,caseID,description,dateInitial,dateExpected,severity,impact,affectedUsers,ticketStatus,LOB, affectedUserNT, loc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    


$params1 = array($sessionInfo["site"], pg_escape_string(utf8_encode($sessionInfo["username"])),$caseID,pg_escape_string(utf8_encode($description)),$dateInitial,$dateExpected,$severity,$sessionInfo["impact"],pg_escape_string(utf8_encode($affectedUsers)),pg_escape_string(utf8_encode($ticketStatus)), $sessionInfo["userOU"], pg_escape_string(utf8_encode($affectedUser)),pg_escape_string(utf8_encode($wfm)));   
$result = sqlsrv_query($conn,$query,$params1);
    
    
if( $result ) {
    
   
                   
    require 'email_request.php';
        
        
        

    if($_SESSION['user']["userOU"] == 'IT') {
    
        
   
        
        
        Header("Location:../submitted.php?loc=$siteLoc&lt=$lastTicket&de=$dateExpected");
        
    } else {
        
        Header("Location:../Thankyou.php?loc=$siteLoc&lt=$lastTicket&de=$dateExpected");
        die();
                }

    
    
}else{
     echo "Conexión no se pudo establecer.<br />";
    
     die( print_r( sqlsrv_errors(), true));
}
}

sqlsrv_close($conn);  

/*    echo $ticketNumber . "," . $ntUser. "," .$caseID. "," . $description. "," . $dateInitial. "," . $impact. "," . $LOB. "," . $affectedUsers . "," . $ticketStatus;*/



    
    



?>