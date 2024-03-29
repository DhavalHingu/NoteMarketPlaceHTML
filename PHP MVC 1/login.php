<?php
include 'includes/connect.php';
include 'includes/functions.php';


if(isset($_POST['submit'])){
  userLoginRedirect();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
		<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--Enternal Stylesheet-->
<link rel="stylesheet" type="text/css" href="css/style.css">

	
</head>

	<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand text-center">
						<img src="images/Login/top-logo.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title-1 text-center">Login</h4>
							<h6 class="card-title-2 text-center">Enter your email address and password to login</h6>
							<form method="POST" class="my-login-validation" action="">
									<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="forgot.html" class="float-right forgot">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" value="" required autofocus>
							    <span toggle="#password" class="field-icon toggle-password"><img src="images/Login/eye.png" alt=""></span>
								    <div class="invalid-feedback" style="display:block">
										<?php
								    	
											if(isset($_GET['msg']) && $_GET['msg']=="error" ){
												echo "username or password invalid";
											}
										
										else{
											// success
											echo "";
										}
										?>
							    	</div>
								</div>

								<div class="form-group">
									
										<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
  <label class="form-check-label" for="flexCheckChecked">
    Remember Me
  </label>
</div>
									
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn" name="submit">
										Login
									</button>
								</div>
								<div class="mt-4 text-center account">
									Don't have an account? <a href="sign-up.php">SignUp</a>
								</div>
							</form>
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
	</body>
</html>