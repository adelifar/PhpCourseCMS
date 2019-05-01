<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'classes/MailConfig_cls.php';

$mail=new PHPMailer(true);
try{
//    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = MailConfig::Host;  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = MailConfig::Username;                     // SMTP username
    $mail->Password   = MailConfig::Password;                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = MailConfig::Port;
    $mail->isHTML(true);


    $mail->setFrom('mehdi@mehdi.com', 'Mailer');
    $mail->addAddress('mgd0098@ymail.com', 'Mehdi adeli');     // Add a recipient
    $mail->Subject="test email";
    $mail->Body="hello this is an email sent form cms to mailtrap";

    if ($mail->send()){
        echo "email sent";
    }
    else echo "email failed";
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>