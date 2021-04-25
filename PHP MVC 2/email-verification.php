<?php
include 'includes/connect.php';
$id = $_REQUEST['email'];
$sql = mysqli_query($conn,"select * from users where Email_id = '$id'");
while($row=mysqli_fetch_array($sql)){
    $name = $row['FirstName'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Email Verification</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--External CSS-->
	<link rel="stylesheet" href="css/style.css">
	<style>
	</style>
</head>
<body class="email-verification">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="card fat mb-5">
						<div class="card-body">
							<img src="images/Login/logo.png" alt="">
							<h3>Email Verification</h3>
							<h5>Dear <?php echo $name; ?>,</h5>
							<p id="one">Thanks For Signning.</p>
							<p id="two">Simply click below for email verification</p>
							<a class="btn btn-primary" style="line-height: 32px;" type="button" href="email-verify.php?email=<?php echo $id; ?>">VERIFY EMAIL ADDRESS</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>
</body></html>
