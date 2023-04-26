<?php

include 'dbH.inc.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
//$ticketNumber =$_POST['ticketNumber']; -
$ticketTitle =$_POST['ticketTitle'];
$ticketDescription =$_POST['ticketDescription'];
$ticketCategory =$_POST['ticketCategory'];
$ticketApprover =$_POST['ticketApprover'];
//$ticketApprovalStatus =$_POST['ticketApprovalStatus']; -
//$ticketDate =$_POST['ticketDate']; -
//$ticketDueBy =$_POST['ticketDueBy'];
//$ticketAdminNotes =$_POST['ticketAdminNotes']; -
//$ticketStatus =$_POST['ticketStatus']; -
//$ticketEvidence =$_POST['ticketEvidence']; -
}

$getLastID = "SELECT TOP 1 * FROM ticketData ORDER BY ID DESC";
$result = sqlsrv_query($conn,$getLastID);

while ($row = sqlsrv_fetch_array ($result, SQLSRV_FETCH_ASSOC)){
    echo $row['ID'] + 1;
    $ticketNumber = $row['ID'] + 1;
}

$ticketApprovalStatus = 'Pending Approval';

$currentTime = date("Y-m-d H:i:s");


//echo date_timestamp_get($date);
$ticketDate = '';
$site = 'BOG';
$alusuario = $site . strval($ticketNumber);
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo 'Su ticket number:' . $alusuario;
echo '<br>';
echo '<br>';
echo '<br>';


sqlsrv_free_stmt ($result);

$query = "INSERT INTO ticketData
        (ticketDescription,ticketCategory,ticketApprover
)
        VALUES(?, ?, ?)";
//$params1 = array($ticketNumber,$ticketTitle,$ticketDescription,$ticketCategory,$ticketApprover,$ticketApprovalStatus,$ticketDate,$ticketDueBy,$ticketAdminNotes,$ticketStatus,$ticketEvidence);            
$params1 = array($ticketTitle, $ticketDescription,$ticketCategory,$ticketApprover);     
$result = sqlsrv_query($conn,$query,$params1);



sqlsrv_close($conn);

//echo 'Datos insertados' + $ticketNumber,$ticketTitle,$ticketDescription,$ticketCategory,$ticketApprover,$ticketApprovalStatus,$ticketDate,$ticketDueBy,$ticketAdminNotes,$ticketStatus,$ticketEvidence;

echo $ticketApprover, $ticketDescription;
echo '<br><br><br>';
//$date = strtotime(date_timestamp_get($date));
//$date = date('d-m-Y', $date);

echo $currentTime;
//echo $date; 
//echo date_timestamp_get($date);
echo '<br>';
echo '<br>';
echo '<br>';
//var_dump($time);


?>