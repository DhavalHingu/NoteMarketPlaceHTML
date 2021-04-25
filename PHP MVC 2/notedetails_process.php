<?php 
if(!isset($_SESSION['userIdentifier'])){
session_start();
}
include 'includes/connect.php';
include 'includes/functions.php';
$data = 0;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
$mail = new PHPMailer(true);

paidNoteDownloadRequest();

?>