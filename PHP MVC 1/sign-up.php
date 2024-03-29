<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Sign Up</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--Internal Stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	<style>
      
    </style>
</head>
<body class="my-login-page">

<section class="h-100">
		<div class="container">
			<div class="row justify-content-md-center">
				<div class="card-wrapper">
					<div class="brand text-center">
						<img src="images/Login/top-logo.png" alt="logo" class="img-responsive">
					</div>
				<div class="card fat">
						<div class="card-body">
							<h4 class="card-title-1 text-center">Create an Account</h4>
							<h6 class="card-title-2 text-center">Enter your details to sign up</h6>
							<p class="success text-center" id="msg" style="color: green; "></p>
							<form method="POST" action="#" id="sign-up">
								
								<div class="form-group">
									<label for="email">First Name <sup>*</sup></label>
									<input type="text" class="form-control" id="fname" name="fname" value="" required autofocus placeholder="Enter your First Name" style="height: 50px;">
								</div>
								
								<div class="form-group">
									<label for="email">Last Name <sup>*</sup></label>
									<input type="text" class="form-control" id="lname" name="lname" value="" required autofocus placeholder="Enter your Last Name" style="height: 50px;">
								</div>

								
								
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" id="email" name="email" value="" required autofocus placeholder="Enter your email address">
								</div>

									<div class="form-group class">
									<label for="password">Password									</label>
									<input id="password1" type="password" class="form-control" name="password" placeholder="Enter Your Password" required data-eye>
							    <span toggle="#password-1" class="field-icon toggle-password"><img src="images/Login/eye.png" alt=""></span>
								    <p id="invalid1"></p>
								</div>
								
								<div class="form-group class">
									<label for="password">Confirm Password									</label>
									<input id="password2" type="password" class="form-control" name="password" placeholder="Re-Enter Your Password" required data-eye>
							    <span toggle="#password2" class="field-icon toggle-password"><img src="images/Login/eye.png" alt=""></span>
								    <p id="invalid"></p>
								    
								</div>


								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block submit" name="submit">
										SIGN UP
									</button>
								</div>
								<br>
								<p id="wait"class="text-center"></p>
								<div class="mt-4 text-center sign-up-label">
									Already have an account? <a href="login.php" class="sign-up-link">Login</a>
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
	
	<script>
	
	$(document).ready(function(){
	$(document).on('submit','#sign-up',function(e){
		$("#wait").html("Please Wait.....");
		e.preventDefault();  //add this line to prevent reload
                    var fname= $("#fname").val();
					var lname= $("#lname").val();
					var email= $("#email").val();
                    var password= $("#password1").val();
					var confirm = $("#password2").val();

        if (password != confirm){
            $("#invalid").html("Passwords does not match!");
			$("#wait").hide();
			
		}
		
        else
		{
			
			$.ajax({
                        type: "POST",
                        url: "signup_process.php",
                        data: "fname=" + fname+ "&lname=" + lname+ "&email=" + email+ "&password=" + password,
                        success: function(data) {
							if(data == "2"){
								$('#wait').html('Password must be between 6 to 24 character and must have at least one lowercase,special,digit character and not contain whitespaces');
							}
							else if(data== "0"){
								$('#wait').html('Email Id Already Exists!');
								
							}
							else{
								
								$('#msg').html('Your Account has been successfully created !');
							$('#sign-up').trigger("reset");
							document.documentElement.scrollTop = 0;
							$("#wait").hide();
							}

							
                        }
						
                    });
					

		}
                
		});
	});
</script>


</body>
</html>
