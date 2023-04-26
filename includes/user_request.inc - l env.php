<?php
session_start();
include 'dbH.inc.php';
/*
include 'session_validator.inc.php';
*/



if ($_SERVER['REQUEST_METHOD']=='POST'){

//$_POST['user'] = $_SESSION['user'][0];  


$ntUser = strtoupper($_SESSION['user'][0]);
$toValidate = strtoupper($_SESSION['user'][1]);
$affectedUser = $_POST['userAffected'];
$location = 'BOG';

if (!isset($_POST['wfm-checker'])) {
      $wfm = 'WFO';
    } else{
        $wfm = $_POST['wfm-checker'];  
    }


    
    
  if($_SESSION['user'][2] != 'BOGATIT') {
      
       include 'dept_validator.php';
      
  } else {
      $LOB='IT';
      $impact = 2;
  }
    
    
    
/*if ($toValidate = "BOGATIT") {
    $LOB="IT";
}*/
     
    

    

    
$query = "SELECT TOP (1) * FROM ticket order by ticketNumber desc;";
$result = sqlsrv_query($conn,$query);

$row = sqlsrv_fetch_array($result);

$lastTicket = $row['ticketNumber'];
$affectedUsers = $_POST['affectedUsers'];

$lastTicket++;

  
    //newTicket listo para insert

 /// pending to be assigned by session


$caseID = $_POST['caseID'];

$description = $_POST['description'];
date_default_timezone_set('America/bogota');  
$dateInitial = date("Y-m-d H:i:s");  



    
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
    


$params1 = array($location, pg_escape_string(utf8_encode($ntUser)),$caseID,pg_escape_string(utf8_encode($description)),$dateInitial,$dateExpected,$severity,$impact,pg_escape_string(utf8_encode($affectedUsers)),pg_escape_string(utf8_encode($ticketStatus)), $LOB, pg_escape_string(utf8_encode($affectedUser)),pg_escape_string(utf8_encode($wfm)));     
$result = sqlsrv_query($conn,$query,$params1);
if( $result ) {
    
          
    
   //array($username,$location,$profile);
        
if(isset($_SESSION['user'])){
    

    
    if($_SESSION['user'][2] == 'BOGATIT') {
      
    
      
        
        Header("Location:../submitted.php?loc=$location&lt=$lastTicket&de=$dateExpected");
        
    } else if($_SESSION['user'][2] != 'BOGATIT')

                {
    
   
        
                       if (!$mail->send()){
                                              echo 'Error message' . $mail->ErrorInfo; 

                                               Header("Location:../submitted.php?loc=$location&lt=$lastTicket&de=$dateExpected");

                       }

    
    
    
    
        Header("Location:../Thankyou.php?loc=$location&lt=$lastTicket&de=$dateExpected");
        die();
                }
}
    
    
    
 
    
        
        
        
 
    
    
}
else {
    header('location:login.php');
    die();
}

    
   
   
    
   
     
}else{
     echo "Conexión no se pudo establecer.<br />";
    
     die( print_r( sqlsrv_errors(), true));
}

sqlsrv_close($conn);  

/*    echo $ticketNumber . "," . $ntUser. "," .$caseID. "," . $description. "," . $dateInitial. "," . $impact. "," . $LOB. "," . $affectedUsers . "," . $ticketStatus;*/



    
    



?>