<?php
if(!isset($_SESSION)){
    session_start();
}
include 'includes/connect.php';

$old = $_POST['old'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$seller_id = $_SESSION['userIdentifier'];
$current_date = Date('Y-m-d H:i:s');
$confirm = md5($confirm);
$select_old_password = mysqli_query($conn,"select * from `users` where `id` = '$seller_id'");
while($row=mysqli_fetch_array($select_old_password)){
    $oldPassword = $row['Password'];
}
if(md5($old) != $oldPassword){
   echo "0";
}
else if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
    echo "2";
}
else{
    $sql = mysqli_query($conn,"update `users` set `Password` = '$confirm' , `ModifiedDate` = '$current_date',`ModifiedBy` = '$seller_id' where `id` = '$seller_id' ");
    if($sql){
        $a = mysqli_error($conn);
        echo $a;
       
    }
}

?>