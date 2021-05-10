<?php
include '../includes/functions.php';

if(isset($_REQUEST['id'])){
    $uid = $_REQUEST['id'];
        $sql = mysqli_query($conn,"update users u inner join user_profile up on u.id = up.user_id set FirstName = '$firstname' , LastName = '$lastname' , Email_id = '$email' , u.ModifiedDate = '$current_date' ,u.ModifiedBy = '$user',CountryCode = '$code' , Phone_number = '$phone_no' where u.id = '$uid' ");
if($sql){
    header('location:add-administrative.php?');
}
else{
    header('location:add-administrative.php?"'.mysqli_error($conn).'"');
}
    }

?>