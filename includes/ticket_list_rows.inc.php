
<?php


while($row = sqlsrv_fetch_array($result))  
                          {  
                              
                           
                            $date = date_format($row["dateInitial"],'m-d H:i');
							
                            $minDesc = substr($row["description"],0,100) . "...";
                              
                             
                             
                              
                              if ($row["ticketStatus"] == "open"){
                                  $style = 'ticket-open';
                                  $tooltip = 'Status: Open';
                              } else if ($row["ticketStatus"] == "Closed"){
                                  $style = 'ticket-closed';
                                  $tooltip = 'Status: Closed';
                              }
                              else if ($row["ticketStatus"] == "In progress"){
                                  $style = 'ticket-inProgress';
                                  $tooltip = 'Status: In progress';
                              }
                            else {
                               $style = 'ticket-other';
                                $tooltip = 'Status: Hold';
                                       }
                              
                              $site = $row["location"];
                             $ticketNumber = $row["ticketNumber"];
                            $affectedUser = $row["agentName"];
                              $ticketStatus = $row["ticketStatus"];
                              $ticketOwner = substr($row["ticketOwner"],0,12);
                              $LOB = $row["LOB"];
							  $issueDescription = $row["issueDescryption"];
                             
							  
                             
                              
     ?>  
                             <tr>
                          <td><a href='admin-ticket.php?ticketN=<?php echo $ticketNumber; ?>'class='ticketNumber py-1 px-2 <?php echo $style; ?>'  data-toggle="tooltip" data-placement="right" title="<?php echo $tooltip; ?>"><?php echo $site.$ticketNumber; ?></a></td>
                            <td data-toggle="tooltip" data-placement="right" title="<?php echo $minDesc;?>"> <?php echo $issueDescription;  ?></td>  
                                    <td><?php echo $affectedUser; ?></td>  
                                    <td><?php echo $date;?></td>  
                                    <td><a href='admin-ticket.php?ticketN=<?php echo $ticketNumber; ?>' class='<?php echo $style; ?>' hidden><?php echo $ticketStatus; ?></a><a href='#'></a><?php echo $ticketOwner; ?></td>    
                                    <td><?php echo $LOB;?></td> 
				               </tr> 
                         
    <?php 
                          }  
?>



 <!-- echo '<tr>';
                          
                               echo "<td><a href='user-ticket.php?ticketN=$row[0]' class='$style px-2'>●</a> <a href='user-ticket.php?ticketN=$row[0]' class='ticketNumber'>$row[1]$row[0]</a></td>";
                                echo "<td>$minDesc</td>  
                                    <td>$row[20]</td>  
                                    <td>$date</td>  
                                    <td><a href='user-ticket.php?ticketN=$row[0]' class='$style'>$row[13]</a></td>    
                                    <td>$row[15]</td> 
				               </tr>";  -->