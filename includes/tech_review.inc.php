<?php
$query = "SELECT * FROM ticket where ticketNumber = $ticketNumber";
$result = sqlsrv_query($conn,$query);
$row = sqlsrv_fetch_array($result);

?>