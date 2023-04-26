  <?php

            require 'PHPMailer/PHPMailerAutoload.php';
       
        
    $mail = new PHPMailer;
    
        
        
        
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->IsSMTP(true);                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'martin.toroc@gmail.com';                 // SMTP username
    $mail->Password = 'Kaze2327.';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; 
        
        
        
        
        
        
        
        
        
   /*     
        
    $mail->SMTPDebug = 2; 
    $mail->SMTPKeepAlive = true;   
    $mail->Mailer = "smtp";
    $mail->isSMTP();
    $mail->Host='smtpout.secureserver.net';
    $mail->Port=465;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Username='martin.toro@accedotech.com';
    $mail->Password='Kaze2327';*/
        
   
        
    
    //$mail->setFrom($_POST['correoUser'],$_POST['userName']);
    $mail->addAddress('martin.toro@accedotech.com');
   // $mail->addReplyTo('martin.toro@accedotech.com');
        
        
    $mail->IsHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    
        
        
        
  if (!$mail->send()){
      echo 'Error message' . $mail->ErrorInfo;
  }
?>