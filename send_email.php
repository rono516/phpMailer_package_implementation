<?php

$name = $_POST['contactName'];
$email = $_POST['contactEmail'];
$message = $_POST['contactMessage'];

// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
// }

require "./vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
$mail->isSMTP();

$mail->SMTPAuth = true;
$mail->Host = "mail.roysville.group";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "contact@roysville.group";
$mail->Password = "8!vQ_7xV56KnqH";
$mail->setFrom($email, $name);
$mail->addAddress("contact@roysville.group", "Contact RoysVille Group");

$mail->Subject = "Message from Contact Form African Cultural Festival Website";
$mail->Body = $message;

try {
    $mail->send();
    header("Location: ./contact.html");
} catch (Exception $e) {
    exit;
    header("Location: ./contact.html");

} finally {
    header("Location: ./contact.html");
}
