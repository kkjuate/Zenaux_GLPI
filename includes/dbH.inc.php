<?php

$serverName ="BOG9SRPCR20.bogota.accedocolombia.net";
$dBUsername="zenaux_user";
$dBPassword="Kaze2327";
$dBName="zenaux";




$connectionInfo = array( "Database"=>$dBName, "UID"=>$dBUsername, "PWD"=>$dBPassword, "CharacterSet" => "UTF-8");

$conn = sqlsrv_connect($serverName, $connectionInfo);


if( $conn ) {
    // echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>