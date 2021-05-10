<?php
include '../includes/connect.php';
include '../includes/functions.php';
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userIdentifier'])){
    header('location:../login.php');
}
$userId = $_SESSION['userIdentifier'];
$sql = mysqli_query($conn,"select * from `users` where `id` = '$userId'");
if(mysqli_num_rows($sql)>0){
	while($row=mysqli_fetch_array($sql)){
     $firstName = $row['FirstName'];
	 $lastName = $row['LastName'];
	 $email = $row['Email_id'];	 
	}
}

$sql1 = mysqli_query($conn,"select * from `user_profile` where `user_id` = '$userId'");
if(mysqli_num_rows($sql1)>0){
	while($row1=mysqli_fetch_array($sql1)){
		$secondaryEmail = $row1['SecondaryEmailAddress'];
		$mob = $row1['Phone_number'];
		$countryCode = $row1['CountryCode'];
		$profile=$row1['Profile_picture'];
        $coun =$row1['CountryCode'];
	
	}
	
	$selectGender = mysqli_query($conn,"select * from `referencedata` where `id` = '$genderID' ");
	while($row2 = mysqli_fetch_array($selectGender)){
		$gender = $row2['Value'];
	}
	
    $selectCountryCode = mysqli_query($conn,"select * from `countries` where `id` = '$coun' ");
	while($row4 = mysqli_fetch_array($selectCountryCode)){
		$code = $row4['Country_code'];
	}

	

}
else{
    $secondaryEmail="";
	
	$mob = "";
	$code = "+91";
		
	
}
if(isset($_POST['submit'])){
    adminprofileInsertorUpdate();
}
?>









<?php include 'header.php'; ?>
<body class="add-notes">



	
<div class="container">
		<div class="heading-first">
			<h3>Basic Profile Details</h3>
		</div>
	</div>
	<div class="container">
		<form method="POST" action="" enctype="multipart/form-data"> 
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">First Name <sup>*</sup></label>
					<input type="text" class="form-control" id="inputEmail4" placeholder="Enter your first name" value="<?php echo $firstName; ?>">
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Last Name <sup>*</sup></label>
					<input type="text" class="form-control" id="inputEmail4" placeholder="Enter your last name" value="<?php echo $lastName; ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Email <sup>*</sup></label>
					<input type="email" class="form-control" id="inputEmail4" placeholder="Enter your email address" value="<?php echo $email; ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Secondary Email</label>
					<input type="email" class="form-control" name="secondaryemail" id="inputEmail4" placeholder="Enter your email address" value="<?php echo $secondaryEmail; ?>">
				</div>
			</div>
			<div class="form-row">
				
				<div class="form-group col-md-6 col-sm-6">
					<div class="row">
					<label for="inputEmail4" class="col-md-12 col-sm-12 mb-4">Mobile Number</label>
						</div>
						<div class="form-row">
						<div class="col-md-3 col-sm-3">
							
							<select id="inputState" class="form-control select" name="mobcode">
                            <option value="<?php echo $countryCode ?>" selected><?php echo $code; ?></option>
                            <?php fetchCountriesCodeToDropdown(); ?>
							</select>
						</div>
						<div class="col-md-9 col-sm-9">
							<input type="text" class="form-control" name="mob_no" placeholder="Enter your phone number" value="<?php echo $mob; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Profile Picture</label>
					<div class="choose_file">
						<span><img src="images/User-Profile/upload.png" alt="">
							<input type="file" name="filetoupload" id="filetoupload"> 
							<p>Upload a Picture</p>
						</span>
					</div>
				</div>
			</div>
<br><br>
<button type="submit" class="btn submit-btn" name="submit">SUBMIT</button>
	</form>
	</div>
	
	<?php include 'footer.php'; ?>
	</body>
</html>