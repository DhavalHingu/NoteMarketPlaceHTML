<?php
session_start();
include 'includes/connect.php';
$noteId = $_REQUEST['id'];
$buyer = $_SESSION['userIdenifier'];
$current_date = Date('Y-m-d H:i:s');

$update = mysqli_query($conn,"update downloads set downloads.Attachment_downloaded= 1 , Attachment_downloaded_date = '$current_date' , `ModifiedDate` = '$current_date' , `ModifiedBy` = '$buyer' where downloads.Downloader = '$buyer' AND note_id = '$noteId' ");


$sql = mysqli_query($conn,"select * from seller_notes_attachments where `note_id` = '$noteId' ");
while($row=mysqli_fetch_array($sql)){
    $notePath = $row['File_path'];
}
header("Content-disposition: attachment; filename=$notePath");
header('Content-type: application/pdf');
readfile("$notePath");


?>