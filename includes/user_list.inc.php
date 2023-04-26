    <?php

include 'dbH.inc.php';


$userOU = $sessionInfo['userOU'];
$site = $sessionInfo['site'];


$query ="select t.location, t.ticketNumber, t.description, c.issueDescryption, A.userFName as agentName, t.dateInitial, t.ticketStatus,  B.userFName as ticketOwner, t.LOB from ticket as t left join caseIds as C on t.caseID = c.idCase left join userInfo as A on t.affectedUserNT = A.userNt left join userInfo as B on t.ntUser = B.userNt where t.location = '$site' AND t.LOB = '$userOU';"; 
$result = sqlsrv_query($conn,$query);


        ?>