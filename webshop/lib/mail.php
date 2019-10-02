<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

function mail($receiveStreet, $receiveName, $subject, $msg) {
  $mail = new PHPMailer();

  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";
  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;

  $mail->Username = "xxxxxxxxxx@gmail.com";
  $mail->Password = "xxxxxxxxxx";

  $mail->isHTML(true);
  $mail->SetFrom("xxxxxxxxxx@gmail.com", "Name");
  $mail->Subject = $subject;
  $mail->Charset = "UTF-8";
  $msg = "<body font-family: Arial; font-size: 14px; color: #000;>" . $msg . "</body></html>"
  $mail->AddAddress($receiveStreet, $receiveName);
  $mail->Body = $msg;

  if($mail->Send()) {
    echo "<script>alert('Mail has been sent!')</script>";
  } else {
    echo "<script>alert('Cannot send mail')";
  }
}
?>
