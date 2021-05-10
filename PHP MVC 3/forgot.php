


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Forgot Password</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--External Stylesheet-->
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
                    <div id="msg" style="color:green"></div>
						<div class="card-body">
							<h4 class="card-title-1 text-center">Forgot Password ? </h4>
							<h6 class="card-title-2 text-center">Enter your email to reset password</h6>
							<form method="POST" action="#" id="forgot-form">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" id="email" class="form-control" name="email" value="" required autofocus placeholder="Enter your email">
								</div>

							<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block" name="submit" id="submit">
										SUBMIT
									</button>
								</div>
                                <br>
                                <div id="wait" class="text-center"></div>
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
	$(document).on('submit','#forgot-form',function(e){
        $("#wait").html("Please Wait.....");
		e.preventDefault();  //add this line to prevent reload
    				var email= $("#email").val();
                    console.log(email);	
			$.ajax({
                        type: "POST",
                        data: "email=" + email,
						url: "forgot_process.php",
                        success: function(data) {
                         
                            if(data==1){
                                $('#msg').html('');
							$('#msg').html('Your password has been changed successfully and newly generated password is sent on your registered email address.');
							$('#forgot-form').trigger("reset");
							$("#wait").html("");
                            console.log(data);
                            }
                            
                            else{
                                $('#msg').html('');
                             $('#msg').html('Your email is not registred with us.');
							$('#sign-up').trigger("reset");
							document.documentElement.scrollTop = 0;
							$("#wait").html(""); 
                            console.log(data);
                            }
                           
                        }
						
                    });
					

		
                
		});
        return false;
	});
</script>
</body>
</html>
