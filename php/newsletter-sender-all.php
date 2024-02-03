<?php

include 'config-short-api.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_STRICT | E_ALL);
date_default_timezone_set( 'America/Recife' );
require '../vendor/autoload.php';

if(isset($_POST['enviarNewsletter'])) {

//Passing `true` enables PHPMailer exceptions
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";
    $mail->Encoding = 'base64';

    // Recebe e sanitiza os inputs do usuário
//    $tituloEmail = filter_input(INPUT_POST, 'tituloEmail', FILTER_SANITIZE_SPECIAL_CHARS);
    $tituloEmail = $_POST['tituloEmail']; // Captura direta, sem substituições aqui
    $corpoEmail = $_POST['corpoEmail']; // Captura direta, sem substituições aqui


    // Inicia o buffer de saída para capturar o conteúdo incluído
    ob_start();
    include('../protected-pages/mailhtml.php');
    // Armazena o conteúdo do buffer em uma variável e limpa o buffer
    $body = ob_get_clean();

//    $body = file_get_contents('../protected-pages/mailhtml.php');

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true; //SMTP connection will not close after each email sent, reduces SMTP overhead
    $mail->Port = 465;
    $mail->Username = 'somosazello@gmail.com';                     //SMTP username
    $mail->Password = 'sbzmhxzephkntrit';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->setFrom('somosazello@gmail.com', 'News da Zello!');
    $mail->addReplyTo('contato@somosazello.com.br', 'Contato Zello');
    $mail->addCustomHeader(
        'List-Unsubscribe',
        '<https://www.somosazello.com.br/unsubscribe.php>'
    );
    $mail->Subject = '🌎 News da Zello: ' . $tituloEmail;

//Same body for all messages, so set this before the sending loop
//If you generate a different body for each recipient (e.g. you're using a templating system),
//set it inside the loop
    $mail->Body    = $body;
//msgHTML also sets AltBody, but if you want a custom one, set it afterwards
    $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';

//Connect to the database and select the recipients from your mailing list that have not yet been sent to
//You'll need to alter this to match your database
//    $mysql = mysqli_connect('localhost', 'username', 'password');
//    mysqli_select_db($mysql, 'mydb');
    $result = mysqli_query($conn, 'SELECT nome, email FROM newsletter WHERE sent = FALSE');

    foreach ($result as $row) {
        try {
            $mail->addAddress($row['email'], $row['nome']);
        } catch (Exception $e) {
            echo 'Invalid address skipped: ' . htmlspecialchars($row['email']) . '<br>';
            continue;
        }
        $mail->replaceCustomHeader(
            'List-Unsubscribe',
            '<mailto:unsubscribes@example.com>, <https://www.example.com/unsubscribe.php?email=' .
            rawurlencode($row['email']) . '>'
        );

        try {
            $mail->send();
            echo 'Message sent to :' . htmlspecialchars($row['nome']) . ' (' .
                htmlspecialchars($row['email']) . ')<br>';
            //Mark it as sent in the DB
            mysqli_query(
                $conn,
                "UPDATE newsletter SET sent = TRUE WHERE email = '" .
                mysqli_real_escape_string($conn, $row['email']) . "'"
            );
        } catch (Exception $e) {
            echo 'Mailer Error (' . htmlspecialchars($row['email']) . ') ' . $mail->ErrorInfo . '<br>';
            //Reset the connection to abort sending this message
            //The loop will continue trying to send to the rest of the list
            $mail->getSMTPInstance()->reset();
        }
        //Clear all addresses and attachments for the next iteration
        $mail->clearAddresses();
        $mail->clearAttachments();
    }
} else{
    header('Location: ../protected-pages/newsletter.php');
    exit();
}