<?php

include 'dbH.inc.php';

$statement = "select attainment, count(attainment) as count from ticket WHERE dateInitial BETWEEN '2020-08-01 00:00:00' AND '2020-08-31 23:59:59' group By attainment;";


/*$result1 = sqlsrv_query($conn, $query1);
$result2 = sqlsrv_query($conn, $query2);

$rowsY = sqlsrv_fetch_array($result1);
$rowsN = sqlsrv_fetch_array($result2);

$totalAttainment = $rowsY[0] + $rowsN[0];*/

$export = sqlsrv_query($conn, $statement);

while($data = sqlsrv_fetch_array($export, SQLSRV_FETCH_ASSOC)){
                  $array['data'][] = $data;
     }


//echo $totalH;




$totalA = $array["data"][0]["count"] + $array["data"][1]["count"] + $array["data"][2]["count"];
//$totalH = $array["data"][1]["count"];
$totalN = $array["data"][1]["count"];
$totalY = $array["data"][2]["count"];

//$toEncode = array( 'totalA' => $totalA, 'totalH' => $totalH, 'totalN' => $totalN, 'totalY' => $totalY);
$toEncode = array($array["data"][0]["attainment"],$totalA,$array["data"][1]["attainment"],$totalN,$array["data"][2]["attainment"],$totalY);

echo json_encode($toEncode);    

/*echo json_encode($array);*/

?>