<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;      
    //Enable verbose debug output

    $server_email = 'mazwanjilani@gmail.com';
    $server_email_pwd = 'wifrmolspljcfqdu';
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    // $mail->Host       ='smtp.mail.yahoo.com';
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $server_email;                     //SMTP username
    $mail->Password   = $server_email_pwd;                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->SMTPSecure =  'ssl';//'tls'; //'ssl';           //Enable implicit TLS encryption
    $mail->Port       = 465; //465; //587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($server_email, 'Zairul');
    $mail->addAddress('mazwanjilani@gmail.com', 'Mazwan Jilani');     //Add a recipient //Name is optional
    // $mail->addAddress('ellen@example.com');               
    $mail->addReplyTo($server_email, 'Zairul');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mzm Bank TAC';
    $mail->Body    = 'This is your TAC number from MZMBank <b>Software Projects Jan 2024</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



// Reference: https://github.com/PHPMailer/PHPMailer
// If you use gmail for the server email, ensure app. password has been set. SMTPGMAIL, get the 16 code for the password for this app.

// mazwanjilani@gmail.com
// wifrmolspljcfqdu


// for yahoo: https://mailmeteor.com/smtp/yahoo-smtp-settings 