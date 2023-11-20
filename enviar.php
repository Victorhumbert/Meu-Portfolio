<?php
header('Content-Type: text/html; charset=utf-8');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';
require 'config.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = $config["email"];
  $mail->Password = $config["senha"];
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
  $mail->Port = 465;
  $mail->CharSet = "UTF-8";

  //Recipients
  $mail->setFrom("$_POST[email]", "$_POST[nome]");
  $mail->addAddress("tormentavictor@gmail.com", "Victor H. Pagliuso");
  $mail->addReplyTo("$_POST[email]");

  //Content
  $mail->isHTML(true);
  $mail->Subject = "$_POST[nome] via Portfólio";

  $body = filter_var("$_POST[mensagem]", FILTER_SANITIZE_STRING);

  $mail->Body = $body;

  $mail->AltBody = $body;

  $mail->send();
  header('Location: success.html');
} catch (Exception $e) {
  header('Location: error.html');
  echo "A mensagem não pode ser enviada. Erro: {$mail->ErrorInfo}";
}