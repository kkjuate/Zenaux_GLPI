    <?php


$sessionInfo = $_SESSION['user'];
$site = $sessionInfo['site'];

//AND t.ticketStatus != 'Closed';



//$site = $sessionInfo["site"];

include 'dbH.inc.php';
//$serverName="B9ATWSIT04";
//$connectionInfo = array( "Database"=>"zenaux", "UID"=>"sa", "PWD"=>"Kaze2323", "CharacterSet" => "UTF-8");
//$conn = sqlsrv_connect( $serverName, $connectionInfo);
$query ="select t.location, t.ticketNumber, t.description, A.userFName as agentName, t.dateInitial, t.ticketStatus,  B.userFName as ticketOwner, t.LOB, caseIds.issueDescryption from ticket as t LEFT JOIN userInfo as A on t.affectedUserNT = A.userNt LEFT JOIN userInfo as B on t.ntUser = B.userNt LEFT JOIN caseIds on t.caseID = caseIds.idCase where t.location = '$site' AND t.ticketStatus != 'closed';"; 



$result = sqlsrv_query($conn,$query);



/*echo $query . " | "  . $site;
die();*/



       /* require_once 'dbH.inc.php';
        $query ="SELECT * FROM ticket";  // query
        $res = sqlsrv_query($conn,$query);

    $resultado= array();
          
          if (!$res)
          {
            die("Error mf");
          }
          else
          {
              while($data = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)){
                  $array['data'][] = $data;
              }
           
             
          }
        echo json_encode($array);*/
            
    //    sqlsrv_free_result($res);
       //     sqlsrv_close($conn);
        ?>