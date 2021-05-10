<?php
if(!isset($_SESSION)){
	session_start();
}
?>
	<?php 
	include 'header.php'; 
	?>

<body class="contact-us">
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

    <?php include 'footer.php'; ?>
    <script>
function contactSupportMail(){
    var fullname = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var comment = $('#comment').val(); 
    $('#msg').html("");
    $('#msg').html('Please Wait.....');


    $.ajax({
                        type: "POST",
                        url: "contactus_process.php",
                        data: "name=" + fullname+ "&email=" +email + "&subject=" + subject+ "&comment=" + comment,
                        success: function(data) {
							console.log(data);
							$('#msg').html('Your Query has been Sent to Support Person Successfully !!');
							$('#contact-us').trigger("reset");
						         
                        }
						
                    });
					
}

</script>
</body></html>