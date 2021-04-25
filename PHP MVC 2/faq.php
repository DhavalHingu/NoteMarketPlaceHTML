<?php
if(!isset($_SESSION)){
    session_start();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>FAQ</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--External CSS-->
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="faq">
<?php include 'header.php'; ?>
	<section class="banner">
		<img src="images/User-Profile/banner-with-overlay.jpg" alt="banner" id="bannerImage class=" img-responsive>
		<div class="banner-text-center">Frequently Asked Questions</div>
	</section>
	<div class="container">
		<div class="content-box">
			<h3>General Questions</h3>
		</div>
	</div>
	<section class="accordition">
		<div class="container">
			<details>
				<summary>What is Marketplace-Notes?</summary>
				<div class="faq__content">
					<div class="container">
						<p>Notes Marketplace is an online marketplace for university students to buy and sell their course notes. </p>
					</div>
				</div>
			</details>
			<details>
				<summary>Where did Notes Marketplace start?</summary>
				<div class="faq__content">
					<div class="container">
						<p>What started out as four friends chucking around an idea in Ahmedabad ended up turning into an
							earliest version of Notes Marketplace. So, with 2021 batch of tatvasoft – we has developed this product. </p>
					</div>
				</div>
			</details>
			<details>
				<summary>Is this legel?</summary>
				<div class="faq__content">
					<div class="container">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus adipisci nesciunt enim quos cum, cupiditate architecto dignissimos. </p>
					</div>
				</div>
			</details>
		</div>
	</section>
	<div class="container">
		<div class="content-box">
			<h3>Uploaders</h3>
		</div>
	</div>
	<div class="container">
		<details>
			<summary>Why should I upload now?</summary>
			<div class="faq__content">
				<div class="container">
					<p>To maximize sales. We can't sell your notes if they are rotting on your hard drive. Your notes are
						available for purchase the instant they are approved, which means that you could be missing potential
						sales as we speak. Despite exam and holiday breaks, our users purchase notes all year round, so the best
						time to upload notes is always today. </p>
				</div>
			</div>
		</details>
		<details>
			<summary>What can't I sell?</summary>
			<div class="faq__content">
				<div class="container">
					<p>We won't approve materials that have been created by your university or another third party. We also
						do not accept assignments, essays, practical’s or take-home exams. We love notes though. </p>
				</div>
			</div>
		</details>
	</div>
	<div class="container">
		<div class="content-box">
			<h3>Downloaders</h3>
		</div>
	</div>
	<div class="container">
		<details>
			<summary>How do i buy notes?</summary>
			<div class="faq__content">
				<div class="container">
					<p>Search for the notes you are after using the 'SEARCH NOTES' tab at the at the top right of every page.
						You can then filter results by university, category, course information etc. To purchase, go to detail page
						of note and click on download button. If notes are free to download – it will download over the browser
						and if notes are paid, Once Seller will allow download you can have notes at my downloads grid for
						actual download. </p>
				</div>
			</div>
		</details>
		<details>
			<summary>Why should I buy notes?</summary>
			<div class="faq__content">
				<div class="container">
					<p>The notes on our site are incredibly useful as an educational tool when used correctly. They effectively
					demonstrate the techniques that top students employ in order to receive top marks. They also
					summaries the course in a concise format and show what that student believed were the most
					important elements of the course. Learn from the best. </p>
				</div>
			</div>
		</details>
	</div>
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
	<script>
		details[open] summary~ * {
			animation: sweep .5 s ease - in -out;
		}
		@keyframes sweep {
			0 % {
				opacity: 0;margin - top: -10 px
			}
			100 % {
				opacity: 1;margin - top: 0 px
			}
		}
	</script>
	<!--Jquery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>
</body></html>