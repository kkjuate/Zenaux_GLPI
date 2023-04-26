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
  
    
    
    $mail->addAddress($sessionInfo["userEmail"]);

 /*   if ($queue !== "IT") {
        
        if ($queue === "ITFAC") {
            
        } else if ($queue === "ITNAT"){
            
        } else if ($queue === "Lenovo"){
            
        }
        
        
    } else {*/
    $mail->addAddress($sessionInfo["helpdeskEmail"]);
    $mail->addReplyTo($sessionInfo["helpdeskEmail"]);    
    /*}*/
	
        
    
    $mail->IsHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Helpdesk Ticket: " . $siteLoc. $lastTicket . " | " . $userFName . " | " . $issueDescription;
    $mail->Body = "<div style='margin: 10% auto;width: 60%;border-top: 3px solid green;border-bottom: 3px solid green;padding: 10px; font-family: calibri;'><p>Your ticket has been submitted successfully. We will be working with <strong>$userFName.</strong></p> <div style='width: 100%; height: 30px; background-color: #d9d9d9; margin: 20px 0 0; '><h4 style='color:darkslategrey;padding: 5px;'>Here are a few details about your ticket</h4></div><div style='display: block; margin: auto;'><h4 style='display: inline-block; width: 31%; padding-right: 10px; text-align: center; border-right: 1px solid gray; font-weight: normal;'>Your ticket number: <a href='http://b9atwsit04:82/admin-ticket.php?ticketN=$lastTicket'>$emailSite$lastTicket</a></h4><h4 style='display: inline-block; width: 40%;  padding-right: 5px; text-align: center; border-right: 1px solid gray; font-weight: normal;'>Ticket date: $dateInitial</h4><h4 style='display: inline-block; width: 20%; padding-left: 10px; text-align: center;font-weight: normal; right: 0;'>Affected user(s): $affectedUsers</h4></div><div style='width: 100%; height: 1px; background-color: darkgray; margin: 0px 0; '></div><div><h4 style='font-weight: normal'>We're expecting to solve the ticket that you described as:</h4><p style='font-style: italic;text-align: center;'>'$description'</p><h4 style='font-weight: normal'>by: $dateExpected</h4></div><div style='width: 100%; height: 1px; background-color: darkgray; margin: 0px 0; '></div><div><div style='display: block; margin: auto;'><h4 style='display: inline-block; width: 35%; padding-right: 10px; text-align: center; border-right: 1px solid gray;'>$HDTeamEmail</h4><h4 style='display: inline-block; width: 30%;  padding-right: 5px; text-align: center; border-right: 1px solid gray;'>Cell: $HDTeamCell</h4><h4 style='display: inline-block; width: 25%; padding-left: 10px; text-align: center;'> Ext: $HDTeamExt1 & $HDTeamExt2 </h4></div></div>";
        
         if (!$mail->send()){
      echo 'Error message' . $mail->ErrorInfo; }
        ?>