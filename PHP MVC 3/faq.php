<?php
if(!isset($_SESSION)){
    session_start();
}


?>


<?php include 'header.php'; ?>
<body class="faq">

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
	<?php include 'footer.php'; ?>
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
	
</body></html>