<?php
if(!isset($_SESSION['userIdentifier'])){
    session_start();
}
include 'includes/connect.php';
include 'includes/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
$mail = new PHPMailer(true);

$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$seller = $_SESSION['userName'];
$allow = mysqli_query($conn,"update `downloads` set `Allowed_Download` = '1' where `id` = '$id' ");

if($allow){
    
header("location:buyer-requests.php");
$subject = "{$seller} Allows you to download a note";
$body = "Hello {$name},<br><br>
We would like to inform you that, {$seller} Allows you to download a note.<br>
Please login and see My Download tabs to download particular note.<br><br>
Regards,<br>
Notes Marketplace";
sendMail($email,$subject,$body);
}


?>