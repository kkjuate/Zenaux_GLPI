<?php

session_start();
include 'dbH.inc.php';


$sessionInfo = $_SESSION['user'];


$email = $sessionInfo["userEmail"];
$ticketOwner = $sessionInfo["username"];
$emailSite = $sessionInfo["site"];
$HDTeamEmail = $sessionInfo["helpdeskEmail"];
$HDTeamExt1 = $sessionInfo["helpdeskExt"];
$HDTeamExt2 = $sessionInfo["helpdeskExt247"];
$HDTeamCell = $sessionInfo["helpdeskExtCell"];
$facilitiesDistro = $sessionInfo["facilitiesDistro"];
$securityDistro = $sessionInfo["securityDistro"];
$natDistro = $sessionInfo["natDistro"];
$siteLoc = $sessionInfo["site"];
$userOU = $sessionInfo["userOU"];



if ($_SERVER['REQUEST_METHOD']=='POST'){


$ticketNumber = $_POST['ticketNumber'];
$queue =  $_POST['queue'];
    
$query = "SELECT dateInitial, dateExpected, ntUser, history, description,  A.userFName, B.userEmail, issueDescryption FROM ticket LEFT JOIN userInfo as A on ticket.affectedUserNT = A.userNt LEFT JOIN userInfo as B on ticket.ntUser = B.userNt LEFT JOIN caseIds on caseIds.idCase = ticket.caseID where ticket.ticketNumber ='$ticketNumber';";

$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);   
date_default_timezone_set('America/bogota'); 
$dateClosed = date("Y-m-d H:i:s"); 
$dateInitial = date_format($row["dateInitial"],"Y-m-d H:i:s");
$dateExpected = date_format($row["dateExpected"],"Y-m-d H:i:s");
$dateDifference = abs(strtotime($dateClosed) - strtotime($dateInitial));
$downtime = $dateDifference / 60;
$ticketBy = $row["ntUser"]; 
$userEmail = $row["userEmail"];
    if (!isset($row["userFName"])) {
        $userFName = 'Undefined name';
    } else {
        $userFName = $row["userFName"];
    }

$ticketStatus =  $_POST['ticketStatus'];
$issueDescription = $row["issueDescryption"];
$ticketDescription = $row["description"];

    
    
  
    

  

   

//ldap_set_option ($sessionInfo[13], LDAP_OPT_REFERRALS, 0);
//ldap_set_option($sessionInfo[13], LDAP_OPT_PROTOCOL_VERSION, 3);
//$bind = @ldap_bind($connection, $username.$domain, $password);    
    
   /*  $sessionInfo = array($findThisDN0,$userOU1,$mail2,$site3,$username4,$impact5,$helpdeskEmail6,$helpdeskExt7,$helpdeskExt2478,$helpdeskExtCell9,$server10,$domain11,$port12,$connection13);*/
    
    

    
    

    
if ($ticketStatus == "Closed") {
    if ($dateClosed < $dateExpected) {
        $attainment = "Y";
    } else {
        $attainment = "N";
    }
    
    } else {
    $attainment = "H";
}
    
$history = pg_escape_string($_POST['history']);


    


$record = $sessionInfo["username"] . " on " . $dateClosed . " said: " . $history . " &#13;&#10; | " . $row["history"];

    
  
if ($userOU != "IT") {
	$query = "UPDATE ticket SET escalationClosed=?, downtime=?, ownership=?, history=?, ticketStatus=?, attainment=?, queue=? WHERE ticketNumber = ?";
	$params1 = array($dateClosed,$downtime,$sessionInfo["username"],pg_escape_string($record),$ticketStatus,$attainment,$queue, $ticketNumber);
} else {
	$query = "UPDATE ticket SET dateClosed=?, downtime=?, ownership=?, history=?, ticketStatus=?, attainment=?, queue=? WHERE ticketNumber = ?";
	$params1 = array($dateClosed,$downtime,$sessionInfo["username"],pg_escape_string($record),$ticketStatus,$attainment,$queue, $ticketNumber);
}
    



    
//$query = "UPDATE ticket SET dateClosed='$dateClosed', downtime='$downtime', ownership='$sessionInfo[4]', history='$record', ticketStatus='$ticketStatus', attainment='$attainment' WHERE ticketNumber = '$ticketNumber'";
/*$params1 = array($dateClosed, $downtime, $ownership, $record, $ticketNumber);*/
$result = sqlsrv_query($conn,$query,$params1);
    
  if( $result ) {
      
      
     include 'email_tsubmit.php';
      
         header('location:../admin-list.php');
}else{
     echo "Conexión no se pudo establecer.<br />";
//      echo $dateClosed . " " .$downtime . " " .$ownership . " " .$record . " " .$ticketStatus . " " .$attainment. " " .	$ticketNumber;
//      echo "<br>";
     die( print_r( sqlsrv_errors(), true));
}


}

    
    



?>