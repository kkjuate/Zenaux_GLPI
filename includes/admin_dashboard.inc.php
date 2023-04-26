<?php 
include 'dbH.inc.php';


$_POST['sessionInfo'] = $_SESSION['admin'];
$ntUser = strtoupper($_POST['sessionInfo'][0]);
$toValidate = strtoupper($_POST['sessionInfo'][1]);


if ($toValidate = "BOGATIT") {
    $LOB="IT";
} else if ($toValidate = "BP9ATBB"){
    $LOB="BBY";
}




//Attainment
$query1 = "SELECT COUNT(attainment) FROM ticket WHERE attainment = 'Y' AND dateInitial BETWEEN '2020-07-01 00:00:00' AND '2020-07-31 23:59:59';";
$query2 = "SELECT COUNT(attainment) FROM ticket WHERE attainment = 'N' AND dateInitial BETWEEN '2020-07-01 00:00:00' AND '2020-07-31 23:59:59';";

$result1 = sqlsrv_query($conn, $query1);
$result2 = sqlsrv_query($conn, $query2);

$rowsY = sqlsrv_fetch_array($result1);
$rowsN = sqlsrv_fetch_array($result2);

$totalAttainment = $rowsY[0] + $rowsN[0];


//Open closed

$query3 = "SELECT COUNT(ticketStatus) FROM ticket
 WHERE dateInitial BETWEEN '2020-07-01 00:00:00' AND '2020-07-31 23:59:59';";

$query4 = "SELECT COUNT(ticketStatus) FROM ticket
 WHERE dateInitial BETWEEN '2020-07-01 00:00:00' AND '2020-07-31 23:59:59' AND ticketStatus='Closed';";


$result3 = sqlsrv_query($conn, $query3);
$result4 = sqlsrv_query($conn, $query4);

$rowsTotal = sqlsrv_fetch_array($result3);
$rowsClosed = sqlsrv_fetch_array($result4);




 
 
           
             
          
/*

while ($rowx == "Y") {
    $attainmentY++;
}
while ($rowx == "N") {
    $attainmentN++;
}
*/




?>