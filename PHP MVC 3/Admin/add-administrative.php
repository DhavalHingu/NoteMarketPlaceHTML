<?php
include '../includes/connect.php';
if(!isset($_SESSION)){
	session_start();
}
if(!isset($_SESSION['userIdentifier'])){
	header('location:../login.php');
}
if(isset($_REQUEST['id'])){
	$userid = $_REQUEST['id'];
	$firstname ="";
	$lastname = "";
	$email = "";
	$phone = "";
	$code = "";	
$sql = mysqli_query($conn,"SELECT u.id,u.FirstName,u.LastName,u.Email_id,up.Phone_number,u.IsActive from users u LEFT JOIN user_profile up on u.id = up.user_id WHERE u.id = '$userid'");
if(mysqli_num_rows($sql) > 0){
while($row=mysqli_fetch_array($sql)){
$firstname =$row['FirstName'];
$lastname = $row['LastName'];
$email = $row['Email_id'];
$phone =$row['Phone_number'];
$code = $row['CountryCode'];

}
}
else{
	$firstname ="";
	$lastname = "";
	$email = "";
	$phone = "";
	$code = "";	
}


}

if(isset($_POST['update'])){
	$uid = $_REQUEST['id'];
	$user = $_SESSION['userIdentifier'];
    $current_date = Date('Y-m-d H:i:s');
	$phone_no = $_POST['phone_no'];
	$code = $_POST['code'];
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$email = $_POST['email'];
	$sql = mysqli_query($conn,"update users set `FirstName` = '$fname' , `LastName` = '$lname' , Email_id = '$email' , ModifiedDate = '$current_date' ,ModifiedBy = '$user' where id = '$uid' ");

    $checkinUserProfile = mysqli_query($conn,"select * from user_profile where user_id = '$uid'");
	$count = mysqli_num_rows($checkinUserProfile);
	if($count > 0){
		$update = mysqli_query($conn,"update user_profile set CountryCode = '$code' , Phone_number = '$phone_no' , ModifiedDate = '$current_date' ,ModifiedBy = '$user' where user_id = '$uid'");
		header('location:add-administrative.php?id='.$uid.'');
	}
	else{
		$insert = mysqli_query($conn,"insert into user_profile(`user_id`,`CountryCode`,`Phone_number`,`CreatedDate`,`CreatedBy`) values('$uid','$code','$phone_no','$current_date','$user')");
		header('location:add-administrative.phpid='.$uid.'');
	}
}



?>




<body class="add-notes">
<?php include 'header.php'; ?>
<div class="container">
		<div class="heading-first">
			<h3>Add Administrator</h3>
		</div>
		<form id="addAdmin" method="post">
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">First Name <sup>*</sup></label>
					<input type="text" value="<?php echo $firstname; ?>" class="form-control" name="firstname" id="inputEmail4" placeholder="Enter your first name">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Last Name <sup>*</sup></label>
					<input type="text" value="<?php echo $lastname; ?>" class="form-control" name="lastname" id="inputEmail4" placeholder="Enter your last name">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Email <sup>*</sup></label>
					<input type="email" class="form-control" value="<?php echo $email; ?>" id="inputEmail4" name="email" placeholder="Enter your email address">
				</div>
			</div>
			
			<div class="form-row">
				
				<div class="form-group col-md-6 col-sm-6">
					<div class="row">
					<label for="inputEmail4" class="col-md-12 col-sm-12 ">Mobile Number</label>
						</div>
						<div class="form-row">
						<div class="col-md-3 col-sm-3">
							
							<select id="inputState" name="code" class="form-control select">
								<?php

$selectcodevalue = mysqli_query($conn,"select * from countries where id = '$code'");
while($row1 = mysqli_fetch_array($selectcodevalue)){


?>
							<option value="<?php echo $code; ?>" selected><?php echo $row1['Country_code']; ?></option>
								<?php }include '../includes/functions.php'; 
								
								 fetchCountriesCodeToDropdown();
								?>
								
							</select>
						</div>
						<div class="col-md-9 col-sm-9 admin-mob-custom-space">
							<input type="text" value="<?php echo $phone; ?>" name="phone_no" class="form-control" placeholder="Enter your phone number">
						</div>
					</div>
				</div>
			</div>
<br><br>			
 

<?php
if(isset($_REQUEST['id'])){
	?>
<button type = "submit" class="btn submit-btn" name="update" id="submit">UPDATE</button>

<?php	
}
else{
	?>
<button type = "button" class="btn submit-btn" name="submit" id="submit">SUBMIT</button>
<?php	
}
?>
<p id="comment"></p>
	</form>
	
	</div>
	

<?php include 'footer.php'; ?>





	
<script>
$(document).ready(function(){
$(document).on('click','#submit',function(e){


    $.ajax({
                        type: "POST",
                        url: "addadmin_process.php",
                       
                       data: $('#addAdmin').serialize(),
                        success: function(data) {
                            console.log(data);
                            if(data=="done"){
                                $('#addAdmin').trigger("reset");
                                   $("#comment").html("Data Added Successfully!!")
                               }             
                        }
						
                    });



});


});

</script>


</body>
</html>