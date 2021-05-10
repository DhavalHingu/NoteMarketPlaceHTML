<?php
if(!isset($_SESSION)){
    session_start();
}
include 'includes/connect.php';
include 'includes/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
$mail = new PHPMailer(true);
publishNote();



?>