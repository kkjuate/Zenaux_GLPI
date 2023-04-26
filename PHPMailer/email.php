  <?php

            require 'PHPMailerAutoload.php';
       
        
    $mail = new PHPMailer;
    
        
     
        
    $mail->SMTPDebug = 3;                                 // Enable verbose debug output
    $mail->IsSMTP(true);                                      // Set mailer to use SMTP
    $mail->Host = "smtpout.secureserver.net";
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = "martin.toro@accedotech.com";                 // SMTP username
    $mail->Password = "Kaze2327";                           // SMTP password
    $mail->SMTPSecure = "ssl";                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; 
     
        
   /*     
        
    $mail->SMTPDebug = 2; 
    $mail->SMTPKeepAlive = true;   
    $mail->Mailer = "smtp";
    $mail->isSMTP();
    $mail->Host="smtpout.secureserver.net";
    $mail->Port=465;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure="ssl";
    $mail->Username="martin.toro@accedotech.com";
    $mail->Password="Kaze2327";*/
        
   
        
    
    //$mail->setFrom($_POST["correoUser"],$_POST["userName"]);
    $mail->addAddress("martin.toro@accedotech.com");
   // $mail->addReplyTo("martin.toro@accedotech.com");
        
        
    $mail->IsHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Here is the subject";
    $mail->Body    = "<h1 style='<color:dark; text-align: center; font-size: 2em;'>Submitted</h1><br>
    <p style='color: dodgerblue; text-align: center; font-size: 1em;'>Your ticket has been submitted successfully.  </p><br>
    <p style='color: dodgerblue; text-align: center; font-size: 1em;'>Please, wait. This will be solved by: </p>";
    
        
        
        
  if (!$mail->send()){
      echo 'Error message' . $mail->ErrorInfo;
  }
?>