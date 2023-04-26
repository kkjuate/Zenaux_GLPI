<?php 
include 'dbH.inc.php';


if ($_SERVER['REQUEST_METHOD']=='POST'){

//$_POST['user'] = $_SESSION['user'][0];  



$month1 = $_POST['initialMonth'] . " 00:00:00";
$month2 = $_POST['endMonth'] . " 23:59:59";
    



    
   
$statement = "SELECT location, ticketnumber, ntUser, caseIds.issueDescryption, caseIds.issueType, caseIds.issueCategory, ticket.impact, campaign.clientSupport, campaign.LOB, campaign.cOwnership, dateInitial, ISNULL(dateClosed, '1999-01-01 00:00:00') as dateClosed, affectedUsers, affectedUserNT, downtime, severity, dateExpected, description, ownership, history, attainment, loc, ticket.ticketStatus from ticket LEFT JOIN userInfo ON ticket.affectedUserNT = userInfo.userNt LEFT JOIN caseIds on ticket.caseID = caseIds.idCase LEFT JOIN campaign on UPPER(LEFT(ticket.affectedUserNT, 8)) = campaign.identifier OR UPPER(LEFT(ticket.affectedUserNT, 7)) = campaign.identifier OR UPPER(LEFT(ticket.affectedUserNT, 6)) = campaign.identifier OR UPPER(LEFT(ticket.affectedUserNT, 4)) = campaign.identifier WHERE dateInitial BETWEEN '$month1' AND '$month2';";

/*echo $statement;
    die();*/
$export = sqlsrv_query($conn, $statement);
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=export.xls');
?>

 <html>
 <body>
  <table id="data_table" class="table">  
                          <thead>  
                               <tr>  
                                   <td>location</td>
                                   <td>ticketnumber</td>
                                   <td>ticketPlacedBy</td>
                                   <td>caseIds.issueDescryption</td>
                                   <td>caseIds.issueType</td>
                                   <td>caseIds.issueCategory</td>
                                   <td>ticket.impact</td>
                                   <td>campaign.clientSupport</td>
                                   <td>campaign.LOB</td>
                                   <td>campaign.cOwnership</td>
                                   <td>dateInitial</td>
                                   <td>dateClosed</td>
                                   <td>affectedUsers</td>
                                   <td>affectedUserNT</td>
                                   <td>downtime</td>
                                   <td>severity</td>
                                   <td>dateExpected</td>
                                   <td>description</td>
                                   <td>ownership</td>
                                   <td>history</td>
                                   <td>attainment</td>
                                   <td>loc</td> 
                               </tr>  
                          </thead> 
                          <tbody>
                          
                          <?php
                           while($row = sqlsrv_fetch_array($export)) {
                               
                          
                           $dateInitial = date_format($row["dateInitial"],'Y-m-d H:i:s');
                           $dateClosed = date_format($row["dateClosed"],'Y-m-d H:i:s');
                           $dateExpected = date_format($row["dateExpected"],'Y-m-d H:i:s');                         
                            ?>
                           
                           
                          
                               
                           
                          <tr>
                            <td><?php echo $row["location"]; ?></td>
                            <td><?php echo $row["ticketnumber"]; ?></td>
                            <td><?php echo $row["ntUser"]; ?></td>
                            <td><?php echo $row["issueDescryption"]; ?></td>
                            <td><?php echo $row["issueType"]; ?></td>
                            <td><?php echo $row["issueCategory"]; ?></td>
                            <td><?php echo $row["impact"]; ?></td>
                            <td><?php echo $row["clientSupport"]; ?></td>
                            <td><?php echo $row["LOB"]; ?></td>
                            <td><?php echo $row["cOwnership"]; ?></td>
                            <td><?php echo $dateInitial; ?></td>
                            <td><?php echo $dateClosed; ?></td>
                            <td><?php echo $row["affectedUsers"]; ?></td>
                            <td><?php echo $row["affectedUserNT"]; ?></td>
                            <td><?php echo $row["downtime"]; ?></td>
                            <td><?php echo $row["severity"]; ?></td>
                            <td><?php echo $dateExpected; ?></td>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $row["ownership"]; ?></td>
                            <td><?php echo $row["history"]; ?></td>
                            <td><?php echo $row["attainment"]; ?></td>
                            <td><?php echo $row["loc"]; ?></td>

                            <?php 
                              
                           }
    
    

                           ?>
                           </tr>
                          </tbody> 
                     </table>
                     </body>
</html>



  <?php 
                              
}
    
?>




<!--<table><tr>
    
<td>$row["location"]</td>
<td>$row["ticketnumber"]</td>
<td>$row["ntUser"]</td>
<td>$row["caseIds.issueDescryption"]</td>
<td>$row["caseIds.issueType"]</td>
<td>$row["caseIds.issueCategory"]</td>
<td>$row["ticket.impact"]</td>
<td>$row["campaign.clientSupport"]</td>
<td>$row["campaign.LOB"]</td>
<td>$row["campaign.cOwnership"]</td>
<td>$row["dateInitial"]</td>
<td>$row["dateClosed"]</td>
<td>$row["affectedUsers"]</td>
<td>$row["affectedUserNT"]</td>
<td>$row["downtime"]</td>
<td>$row["severity"]</td>
<td>$row["dateExpected"]</td>
<td>$row["description"]</td>
<td>$row["ownership"]</td>
<td>$row["history"]</td>
<td>$row["attainment"]</td>
<td>$row["loc"]</td>
    
    
</tr>



</table>-->