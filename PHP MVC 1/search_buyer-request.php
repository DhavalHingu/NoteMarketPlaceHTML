<?php
include 'includes/connect.php';
$output ='';
$query = '';
if(isset($_POST["query"]))
{
 
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
 select downloads.id,downloads.note_id,downloads.Allowed_Download,downloads.Note_title,downloads.Purchased_price,downloads.Attachment_downloaded_date,notecategories.Name,users.Email_id,users.FirstName,user_profile.Phone_number,referencedata.Value from `downloads`,`users`,`notecategories`,`user_profile`,`referencedata` where `downloads`.`Seller` = '$seller_id' AND `downloads`.`Downloader` = `users`.`id` AND `downloads`.`Note_category` = `notecategories`.`id` AND  `users`.`id` = `user_profile`.`user_id` AND `downloads`.`IsPaid` = `referencedata`.`id` AND `Note_title` LIKE '%".$search."%'
  OR `Name` LIKE '%".$search."%' 
  OR `Email_id` LIKE '%".$search."%' 
  OR `Phone_number` LIKE '%".$search."%' 
  OR `Values` LIKE '%".$search."%'
  OR `Purchased_price`` LIKE '%".$search."%'
  OR `Attachment_downloaded_date` LIKE '%".$search."%'
 ";
}
else
{
   $query = "select downloads.id,downloads.note_id,downloads.Allowed_Download,downloads.Note_title,downloads.Purchased_price,downloads.Attachment_downloaded_date,notecategories.Name,users.Email_id,users.FirstName,user_profile.Phone_number,referencedata.Value from `downloads`,`users`,`notecategories`,`user_profile`,`referencedata` where `downloads`.`Seller` = '$seller_id' AND `downloads`.`Downloader` = `users`.`id` AND `downloads`.`Note_category` = `notecategories`.`id` AND  `users`.`id` = `user_profile`.`user_id` AND `downloads`.`IsPaid` = `referencedata`.`id`";
   mysqli_query($conn,$query);
}
while($row=mysqli_fetch_array($query)){
   $data[] = $row;
}

echo json_encode($data);

?>