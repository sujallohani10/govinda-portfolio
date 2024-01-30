<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'contact@example.com';

$php_mailer_files = [
    'PHPMailer.php',
    'Exception.php',
    'SMTP.php',
];

foreach ($php_mailer_files as $file) {
    if (file_exists($php_mailer_file = '../assets/vendor/phpmailer/src/' . $file)) {
        include($php_mailer_file);
    } else {
        die('Unable to load the "PHP Email Form" Library!');
    }
}

// receiving the post params
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail = new PHPMailer;

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // only enable for debugging
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '6c880d7207c379';
    $mail->Password = '057724e4b3f26b';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 2525;

    //Recipients
    $mail->addAddress('sujal.lohani7@gmail.com', 'Govinda Lohani');

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = 'From: ' . $name . '(' . $email . ')<p>' . $message . ' </p>';

    $mail->send();
} catch (Exception $e) {
    echo "exception";
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
