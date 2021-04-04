<?php
include 'includes/connect.php';
include 'includes/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];

require_once "vendor/autoload.php";
$mail = new PHPMailer(true);
   $query = "{$name} - Query {$subject}";
   $body = "Hello, <br><br> {$comment} <br><br> Regards,<br>{$name}";
    sendMail($email,$query,$body);



?>