<?php
include 'includes/connect.php';
include 'includes/functions.php';
// session_start();
if(!isset($_SESSION['userIdentifier'])){
    header('location:login.php');
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
		$dob = $row1['DOB'];
		$genderID = $row1['Gender'];
		$mob = $row1['Phone_number'];
		$countryCode = $row1['CountryCode'];
		$add1 = $row1['Addressline_1'];
		$add2 = $row1['Addressline_2'];
		$city = $row1['City'];
		$state = $row1['State'];
		$zip = $row1['Zipcode'];
		$uni = $row1['University'];
		$college = $row1['College'];
		$coun =$row1['Country'];
		$profile=$row1['Profile_picture'];
	
	}
	
	$selectGender = mysqli_query($conn,"select * from `referencedata` where `id` = '$genderID' ");
	while($row2 = mysqli_fetch_array($selectGender)){
		$gender = $row2['Value'];
	}
	
	$selectCountry = mysqli_query($conn,"select * from `countries` where `id` = '$coun' ");
	while($row3 = mysqli_fetch_array($selectCountry)){
		$country = $row3['Name'];
	}

	$selectCountryCode = mysqli_query($conn,"select * from `countries` where `id` = '$coun' ");
	while($row4 = mysqli_fetch_array($selectCountryCode)){
		$code = $row4['Country_code'];
	}

	

}
else{
	$dob = "";
	$gender = "";
	$mob = "";
	$code = "+91";
		$add1 = "";
		$add2 = "";
		$city = "";
		$state = "";
		$zip = "";
		$uni="";
		$college="";
		$gender = "Select your Gender";
		$country = "Select your country";
	
}
if(isset($_POST['submit'])){
    userprofileInsertorUpdate();
}
?>

<?php include 'header.php'; ?>
<body class="user-profile">
	<section class="banner">
		<img src="images/User-Profile/banner-with-overlay.jpg" alt="banner" id="bannerImage class=" img-responsive>
		<div class="banner-text-center">User Profile</div>
	</section>
	<div class="container">
		<div class="content-box">
			<h3>Basic Profile Details</h3>
		</div>
		<form id="user-profile" method="POST" action="" enctype="multipart/form-data"> 
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">First Name <sup>*</sup></label>
					<input type="text" class="form-control" id="fname" placeholder="Enter your first name" value="<?php echo $firstName; ?> " readonly>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Last Name <sup>*</sup></label>
					<input type="text" class="form-control" id="lname" placeholder="Enter your last name" value="<?php echo $lastName; ?>" readonly>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Email <sup>*</sup></label>
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter your email address" value="<?php echo $email; ?>" readonly>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Date Of Birth</label>
					
					<input type="date" class="form-control" id="dob" name="dob" placeholder = ""  value= "<?php
					$d = date('Y-m-d', strtotime($dob));
					echo date($d); ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputState">Gender</label>
					<select id="inputState" class="form-control select" name="gender" placeholder="Select your gender" value="<?php echo $gender; ?>" required>
						<option selected value="<?php echo $genderID ?>"><?php echo $gender; ?></option>
						<option value="1">Male</option>
						<option value="2">Female</option>
						<option>Other</option>
					</select>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<div class="row">
						<label for="inputEmail4" class="col-md-12 col-sm-12">Mobile Number</label>
					</div>
					<div class="form-row">
						<div class="col-md-3 col-sm-3">
							<select id="mobcode" class="form-control select" name="mobcode" value="" required>
								<option value="<?php echo $countryCode ?>" selected><?php echo $code; ?></option>
								<?php fetchCountriesCodeToDropdown(); ?>
							</select>
						</div>
						<div class="col-md-9 col-sm-9">
							<input type="text" class="form-control"  value="<?php
							
							echo $mob;
							
							?>
							" name="mob_no" id="mob" placeholder="Enter your phone number" required>
						</div>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label for="inputEmail4">Profile Picture</label>
					<div class="choose_file">
						<span><img src="images/User-Profile/upload.png" alt="">
							<input name="filetoupload" type="file" id="filetoupload">
							<p>Upload a Picture</p>
						</span>
					</div>
				</div>
				<div class="form-group col-md-6">
				<div class="filename" style="margin-top:40px;" id="filename"></div>	
			</div>
			
			</div>
					
			
			
			<div class="content-box">
				<br><br><br><br>
				<h3>Address Details</h3>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Address Line 1 <sup>*</sup></label>
					<input type="text" class="form-control" name="address1" id="inputEmail4" placeholder="Enter your address" value="<?php echo $add1; ?>" required>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Address Line 2</label>
					<input type="text" class="form-control" value="<?php echo $add2; ?>" name="address2" id="inputEmail4" placeholder="Enter your address" required>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">City <sup>*</sup></label>
					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $city; ?>" name="city" placeholder="Enter your city">
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">State <sup>*</sup></label>
					<input type="text" id="state" class="form-control"  value="<?php echo $state; ?>" name="state" placeholder="Enter your state" required>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">ZipCode <sup>*</sup></label>
					<input type="text" class="form-control" id="zip" value="<?php echo $zip; ?>" name="zipcode" placeholder="Enter your zipcode" required>
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputState">Country <sup>*</sup></label>
					<select id="inputState" class="form-control select" placeholder="Select your gender" name="country" required>
						<option selected value="<?php echo $countryCode; ?>"><?php echo $country; ?></option>
						<?php fetchCountriesToDropdown(); ?>
					</select>
				</div>
			</div>
			<div class="content-box">
				<h3>University and College Information</h3>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">University</label>
					<input type="text" value="<?php echo $uni; ?>" class="form-control" id="inputEmail4" placeholder="Enter your university" name="university">
				</div>
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">College</label>
					<input type="text" value="<?php echo $college; ?> " class="form-control" id="inputEmail4" placeholder="Enter your college" name="college">
				</div>
			</div>
			<button type="Submit" class="btn submit-btn" name="submit">SUBMIT</button>
		</form>
		<div id="warning" style="color:red"></div>
	</div>
	<?php include 'footer.php'; ?>
		<script type="text/javascript">
		$(function() {
			$('.ChangeToggle').click(function() {
				if ($('#ChangeToggle').hasClass('ChangeToggle1')) {
					$('i').removeClass('fa fa-times');
					$('i').addClass('fa fa-bars');
					$('#ChangeToggle').removeClass('ChangeToggle1');
				} else {
					$('i').removeClass('fa fa-bars');
					$('i').addClass('fa fa-times');
					$('#ChangeToggle').addClass('ChangeToggle1');
				}
			});
		});
	</script>
	<script>
$('#mob').change(function(e) {
            e.preventDefault();
            if(!$('#mob').val().match('[0-9]{10}'))  {
                alert("Please put 10 digit mobile number");
                return;
            }  
});
$('#state').change(function(e) {

			if(!$('#state').val().match('[a-zA-Z]'))  {
                alert("No numeric allowed in State");
                return;
            }  
});
$('#zip').change(function(e) {

if(!$('#zip').val().match('[0-9]'))  {
	alert("No text allowed in ZipCode");
	return;
}  
});

 		</script>
	<script>

var input = document.getElementById( 'filetoupload' );
var infoArea = document.getElementById( 'filename' );

input.addEventListener( 'change', showFileName );

function showFileName( event ) {
  
  // the change event gives us the input it occurred in 
  var input = event.srcElement;
  
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;
  
  // use fileName however fits your app best, i.e. add it into a div
  infoArea.textContent = 'File Name:' + fileName;
}


	</script>
	
</body>
</html>