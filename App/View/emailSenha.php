<?php
SESSION_START();
require_once '../../src/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer();


$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = 'smtp-mail.outlook.com';
$mail->Port = 587; //587
$mail->SMTPSecure = 'STARTTLS'; //tls
$mail->SMTPAuth = true;
$mail->Username = 'senisotnas@outlook.com';
$mail->Password = 'Mircia123';
$mail->setFrom('senisotnas@outlook.com','Pancada Tecnologia');
$mail->addAddress('pancadatec2019@gmail.com', 'Recuperação de Senha');
$mail->Subject = 'Pancada!';
$mail->msgHTML(file_get_contents('contents.php'), __DIR__);
$mail->AltBody = 'Testando o meu email';

if(!$mail->send())
{
    echo 'Erro '.$mail->ErrorInfo;
}
else
{
   echo 'Email enviado';
   header('Location: dashboard.php');
}