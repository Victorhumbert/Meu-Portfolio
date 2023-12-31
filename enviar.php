<?php
header("https://victorhumbert.github.io/Meu-Portfolio/");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header('Content-Type: text/html; charset=utf-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require '../config/config.php';

$mail = new PHPMailer(true);

try {
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
  $mail->setFrom(filter_var("$_POST[email]", FILTER_SANITIZE_EMAIL), "$_POST[nome]");
  $mail->addAddress(filter_var($config["email"], FILTER_SANITIZE_EMAIL), "$_POST[nome]");
  $mail->addReplyTo(filter_var("$_POST[email]"), FILTER_SANITIZE_EMAIL);

  //Content
  $mail->isHTML(true);
  $mail->Subject = filter_var("$_POST[nome] via Portfólio", FILTER_SANITIZE_STRING);
  $body = filter_var("$_POST[mensagem]", FILTER_SANITIZE_STRING);

  $mail->Body = $body;
  $mail->AltBody = $body;

  $mail->send();
  header('Location: success.php');
} catch (Exception $e) {
  session_start();
  $_SESSION['msg_erro'] = "A mensagem não pôde ser enviada. Erro: {$mail->ErrorInfo}";
  header('Location: error.php');
  exit();
}
} else {
  $_SESSION['msg_erro'] = "A mensagem não pôde ser enviada. Erro: {$mail->ErrorInfo}";
  header('Location: error.php');
  exit();
}