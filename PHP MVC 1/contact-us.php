
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Contact Us</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--External CSS-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
</head>
<body class="contact-us">
	<header>
		<nav class="navbar navbar-expand-lg">
			<a class="navbar-brand" href="#"><img src="images/Login/logo.png" alt=""></a>
			<button class="navbar-toggler ChangeToggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="ChangeToggle">
				<span class="navbar-toggler-icon">
					<i class="fa fa-bars" style="color:#6255a5; font-size:28px;"></i>
				</span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="search.html">Search Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="login.html">Sell Your Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="faq.html">FAQ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact-us.html">Contact Us</a>
					</li>
					<li class="nav-item">
						<a class="btn nav-btn" href="login.html" role="button">
							<p>Login</p>
						</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<section class="banner">
		<img src="images/User-Profile/banner-with-overlay.jpg" alt="banner" id="bannerImage class=" img-responsive>
		<div class="banner-text-center">Contact Us</div>
	</section>
	<div class="container">
		<div class="content-box">
			<h3>Get in Touch</h3>
			<p>Let us know how to get back to you</p>
		</div>
	</div>
    <form action="" method="POST" id="contact-us">
	<div class="container">
		<div class="row">
            
			<div class="col-md-6">
				<div class="form-row">
					<div class="form-group col-md-12 col-sm-12">
						<label for="inputEmail4">Full Name <sup>*</sup></label>
						<input type="text" class="form-control" name="fullName" id="name" placeholder="Enter your full name">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 col-sm-12">
						<label for="inputEmail4">Email Address <sup>*</sup></label>
						<input type="text" class="form-control" name="EmailId" id="email" placeholder="Enter your email address">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12 col-sm-12">
						<label for="inputEmail4">Subject <sup>*</sup></label>
						<input type="text" class="form-control" name="subject" id="subject" placeholder="Enter your subject">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-12">
				<div class="form-group col-md-6 col-sm-6 col-12">
					<div class="textarea">
						<label for="inputEmail4" class="commentbox-label">Comments / Questions <sup>*</sup></label>
						<textarea name="comments" id="comment" cols="30" rows="8.9" class="form-control comment-box"></textarea>
					</div>
				</div>
			</div>
		</div>
		<button class="btn submit-btn" type="button" name="submit" onclick="contactSupportMail();">Submit</button>
       
       <div id="msg" style="color:green"></div>
    </div>
</form>

    <hr>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p>Copyright &copy; Tatvasoft All rights reserved.</p>
				</div>
				<div class="col-md-6">
					<div class="social-list text-right">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--Jquery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>

    <script>
function contactSupportMail(){
    var fullname = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var comment = $("#comment"); 
    $('#msg').html("");
    $('#msg').html('Please Wait.....');


    $.ajax({
                        type: "POST",
                        url: "contactus_process.php",
                        data: "name=" + fullname+ "&email=" +email + "&subject=" + subject+ "&comment=" + comment,
                        success: function(data) {
							$('#msg').html('Your Query has been Sent to Support Person Successfully !!');
							$('#contact-us').trigger("reset");
						         
                        }
						
                    });
					
}

</script>
</body></html>