<?php 
require '../PHPMailer/PHPMailerAutoload.php';
        
    $mail = new PHPMailer;
    
        
   // $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->IsSMTP(true);                                      // Set mailer to use SMTP
    $mail->Host = "smtp.office365.com";
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "martin.toro@accedotech.com";                 // SMTP username
    $mail->Password = "Kaze2327";                           // SMTP password
    $mail->SMTPSecure = "TLS";                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; 
    
  // $sessionInfo = array($findThisDN,$userOU,$mail,$site,$username,$impact,$helpdeskEmail,$helpdeskExt);

    //$mail->setFrom($_SESSION[6]);
  
    
    
    $mail->addAddress($userEmail);
	if ($queue != "IT") {
		
		switch ($queue){
			
			case "NAT":
			$mail->addAddress($natDistro);
			$mail->addReplyTo($natDistro);
			
			break;
			
			case "FAC":
			$mail->addAddress($facilitiesDistro);
			$mail->addReplyTo($facilitiesDistro);
			
			break;
			
			case "SEC":	
		    $mail->addAddress($securityDistro);
			$mail->addReplyTo($securityDistro);
				
			break;
			
			default:
			
			break;
		}
		
		
	} 
	
	
    $mail->addAddress($userEmail);
    $mail->addAddress($HDTeamEmail);
        
        
    $mail->IsHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Helpdesk Ticket: " . $emailSite . $ticketNumber . " | " . $userFName . " | " . $issueDescription;
	
	
		
    if ($ticketStatus == "Closed") {
			
		if ($queue !== "IT") {
            $mail->Body = " <h2>Hello. We got updates about the issue you have reported. </h2><p>This ticket has been assigned to a new department. You'll be getting updates soon.  </p>";
        }else {
			$mail->Body = " <h2>Hello. We got updates about the issue you have reported. </h2><p>The new status of this ticket is: $ticketStatus. It has been done on $dateClosed </p><p>Here you have the info about the last activities performed with your ticket:</p> <p italic>$history</p> <p>Remember, initially you described the issue as: </p> <hp style='color:green'>$ticketDescription</hp><p>You can access your ticket by <a href='http://zenaux.bogota.accedocolombia.net/user-ticket.php?ticketN=$ticketNumber'>clicking here</a></p><p>Helpdesk Email: $HDTeamEmail </p><p>Helpdesk Cell: $HDTeamCell</p><p>Ext: $HDTeamExt1 </p><p>Ext: $HDTeamExt2 </p>";
		}
		
		
	} else {
		
		if ($queue !== "IT") {
            $mail->Body = " <h2>Hello. We got updates about the issue you have reported. </h2><p>This ticket has been assigned to a new department. You'll be getting updates soon.  </p>";
        }else {
			 $mail->Body = " <h2>Hello. We got updates about the issue you have reported. </h2><p>The new status of this ticket is: $ticketStatus. </p><p>Here you have the info about the last activities performed with your ticket: </p> <p italic>$history</p><p>Remember, initially you described the issue as: </p> <hp style='color:green'>$ticketDescription</hp><p>You can access your ticket by <a href='http://zenaux.bogota.accedocolombia.net/user-ticket.php?ticketN=$ticketNumber'>clicking here</a></p><p>Helpdesk Email: $HDTeamEmail </p><p>Helpdesk Cell: $HDTeamCell</p><p>Ext: $HDTeamExt1 </p><p>Ext: $HDTeamExt2 </p>";
		}
		  //$mail->Body = " <h2>Hello. We got updates about the issue you have reported. </h2><p>The new status of this ticket is: $ticketStatus. </p><p>Here you have the info about the last activities performed with your ticket: </p> <p italic>$history</p><p>Remember, initially you described the issue as: </p> <hp style='color:green'>$ticketDescription</hp><p>You can access your ticket by <a href='http://zenaux.bogota.accedocolombia.net/user-ticket.php?ticketN=$ticketNumber'>clicking here</a></p><p>Helpdesk Email: $HDTeamEmail </p><p>Helpdesk Cell: $HDTeamCell</p><p>Ext: $HDTeamExt1 </p><p>Ext: $HDTeamExt2 </p>";
	}

        
         if (!$mail->send()){
      echo 'Error message' . $mail->ErrorInfo; }
        ?>
