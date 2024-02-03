<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require './vendor/autoload.php';
require '../vendor/autoload.php';

if(isset($_POST['aaaaadasd'])) {
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'somosazello@gmail.com';                     //SMTP username
        $mail->Password = 'sbzmhxzephkntrit';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setLanguage('pt_br');
        $mail->setFrom('somosazello@gmail.com', 'Zello Newsletter');
        $mail->addAddress('kawabazante@gmail.com', 'Kawa');     //Add a recipient
        $mail->addReplyTo('contato@somosazello.com.br', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
//        $mail->Subject = urldecode('Versão beta Disponível!');
        $mail->Subject = 'Versão beta Disponível!';
        $mail->Body = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}