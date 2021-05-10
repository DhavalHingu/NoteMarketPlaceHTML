<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userIdentifier'])){
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Change Password</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--Internal Stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	
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
                            <div id="wait"></div>
                            <div id="msg"></div>
							<h4 class="card-title-1 text-center">Change Password </h4>
							<h6 class="card-title-2 text-center">Enter your new passsword to change your password</h6>
							<form id="changePassword"> 
								<div class="form-group">
									<label for="password">Old Password</label>
									<input id="password1" type="password" class="form-control" name="password" value="" required autofocus placeholder="Enter Your Old Password">
									<span toggle="#password1" class="field-icon toggle-password"><img src="images/Login/eye.png" alt=""></span>
								</div>
								
								<div class="form-group">
									<label for="password">New Password</label>
									<input id="password2" type="password" class="form-control" name="password" value="" required autofocus placeholder="Enter Your New Password">
									<span toggle="#password2" class="field-icon toggle-password"><img src="images/Login/eye.png" alt=""></span>
								</div>
								
								<div class="form-group">
									<label for="password">Comfirm Password</label>
									<input id="password3" type="password" class="form-control" name="password" value="" required autofocus placeholder="Enter Your Confirm Password">
									<span toggle="#password3" class="field-icon toggle-password"><img src="images/Login/eye.png" alt=""></span>
								</div>
                                <div id="invalid" style="color:red;"></div>
							<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" id="submit" name="submit">
										SUBMIT
									</button>
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
	$(document).on('submit','#changePassword',function(e){
		$("#wait").html("Please Wait.....");
		e.preventDefault();  //add this line to prevent reload
                    var old = $("#password1").val();
                    var password= $("#password2").val();
					var confirm = $("#password3").val();

        if (password != confirm){
            $("#invalid").html("Passwords does not match!");
			$("#wait").hide();
			
		}
		
        else
		{
			
			$.ajax({
                        type: "POST",
                        url: "changePassword_process.php",
                        data: "old=" + old+ "&password=" + password+ "&confirm=" + confirm,
                        success: function(data) {
							if(data == "2"){
								$('#wait').html('Password must be between 6 to 24 character and must have at least one lowercase,special,digit character and not contain whitespaces');
							}
							else if(data== "0"){
								$('#wait').html('your password is incorrect!!');
								
							}
							else{
								console.log(data);
								$('#msg').html('Your Password has been successfully changed !');
							$('#changePassword').trigger("reset");
							document.documentElement.scrollTop = 0;
							$("#wait").hide();
                            window.setTimeout(function() {
    window.location.href = 'search.php';
}, 3000);
							}

							
                        }
						
                    });
					

		}
                
		});
	});
</script>

</body>
</html>
