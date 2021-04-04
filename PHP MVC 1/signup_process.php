<?php
include 'includes/connect.php';
include 'includes/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";
$mail = new PHPMailer(true);
signUp();

// $first_name = $_POST['fname'];
// $last_name = $_POST['lname'];
// $email = $_POST['email'];
// $password=$_POST['password'];



// $mail = new PHPMailer(true);

// //Enable SMTP debugging.
// $mail->SMTPDebug = 3;                               
// //Set PHPMailer to use SMTP.
// $mail->isSMTP();            
// //Set SMTP host name                          
// $mail->Host = "smtp.gmail.com";
// //Set this to true if SMTP host requires authentication to send email
// $mail->SMTPAuth = true;                          
// //Provide username and password     
// $mail->Username = "dhaval7030@gmail.com";                 
// $mail->Password = "9054085445";                           
// //If SMTP requires TLS encryption then set it
// $mail->SMTPSecure = "tls";                           
// //Set TCP port to connect to
// $mail->Port = 587;                                   

// $mail->From = "dhaval7030@gmail.com";
// $mail->FromName = "Dhaval";

// $mail->addAddress($email, $first_name);

// $mail->isHTML(true);

// $mail->Subject = "Note Marketplace - Email Verification";
// $mail->Body = "Hello {$first_name}.<br><br>Thank you for signing up with us. please click on below link to verify your email address and to do login.<br><br> <a href='localhost/notesmarketplace/email-verification.php?email={$email}'>Click Here..</a>   <br><br><br> Regards,<br>Notes Marketplace
// ";
// $mail->AltBody = "This is the plain text version of the email content";

// try {
//     $mail->send();
//     echo "Message has been sent successfully";
// } catch (Exception $e) {
//     echo "Mailer Error: " . $mail->ErrorInfo;
// }
?>