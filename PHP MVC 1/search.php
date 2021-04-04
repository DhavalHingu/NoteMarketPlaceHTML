<?php
session_start();
include 'includes/connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Search Notes</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--Custom CSS -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<style>
		.first-section img {
			height: 300px;
			width: 100%;
		}

		.first-section {
			position: relative;
		}

		.text-overlay h3 {
			font-family: "Open Sans", sans-serif;
			font-size: 40px;
			font-weight: 600;
			line-height: 28px;
			color: white;
		}

		.text-overlay {
			position: absolute;
			top: 25%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.heading h3 {
			font-family: "Open Sans", sans-serif;
			font-size: 24px;
			font-weight: 600;
			line-height: 28px;
			color: #6255a5;
			padding-top: 60px;
		}

		.search {
			background-color: whitesmoke;
			padding: 30px;
			margin-top: 20px;
		}

		.search-note-input {
			padding-bottom: 20px;
		}

		.notes {
			padding-top: 30px;
		}

		.card {
			border: 1px solid #d1d1d1;
			padding: 0;
			margin-bottom: 20px;
		}

		.card-body {
			padding: 0;
		}

		.note-heading {
			padding-top: 20px;
			padding-bottom: 20px;
			height: 120px;
		}

		.note-heading h4 {
			padding-left: 20px;
			font-family: "Open Sans", sans-serif;
			font-size: 20px;
			font-weight: 600;
			line-height: 26px;
			color: #6255a5;
		}

		.notes ul {
			list-style: none;
			padding-left: 20px;
		}

		.notes ul li {
			padding-bottom: 20px;
			font-family: "Open Sans", sans-serif;
			font-size: 15px;
			font-weight: 400;
			line-height: 20px;
			color: #333333;
		}

		.notes ul li img {
			position: relative;
			left: -12px;
		}

		.search-box {
			background-image: url(images/images/search-icon.png);
			text-indent: 30px;
			background-position: 20px;
			background-repeat: no-repeat;
		}

		.search-box:focus {
			background: none;
			text-indent: 0;
		}

		.rating {
			border: none;
			float: left;
			position: relative;
			bottom: 20px;
			padding-left: 12px;
		}

		span {
			position: relative;
			padding-left: 15px;
		}

		.rating>input {
			display: none;
		}

		.rating>label:before {
			margin: 5px;
			font-size: 1.25em;
			font-family: FontAwesome;
			display: inline-block;
			content: "\f005";
			position: relative;
			bottom: 4px;
		}

		.rating>label {
			color: #ddd;
			float: right;
		}

		/***** CSS Magic to Highlight Stars on Hover *****/
		.rating>input:checked~label,
		/* show gold star when clicked */
		.rating:not(:checked)>label:hover,
		/* hover current star */
		.rating:not(:checked)>label:hover~label {
			color: #FFD700;
		}

		/*        hover previous stars in list */
		.rating>input:checked+label:hover,
		.rating>input:checked~label:hover,
		.rating>label:hover~input:checked~label,
		.rating>input:checked~label:hover~label {
			color: #FFED85;
		}

		.pagination {
			margin: 0 39%;
		}

	</style>
</head>

<body class="search-page">
	
<?php include 'header.php' ?>




	<section class="first-section">
		<img src="images/home/banner-with-overlay.jpg" alt="">
	</section>
	<div class="text-overlay">
		<h3>Search Notes</h3>
	</div>
	<div class="heading">
		<div class="container">
			<h3>Search and Filter notes</h3>
		</div>
	</div>
	<div class="container">
		<section class="search">
			<div class="row">
				<div class="col-md-12 col-sm-12  search-note-input">
					<input type="text" placeholder="Search notes here" class="form-control search-box">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="inputState" class="form-control select" placeholder="Select your gender">
						<option selected>Select type</option>
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="inputState" class="form-control select" placeholder="Select your gender">
						<option selected>Select category</option>
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="inputState" class="form-control select" placeholder="Select your gender">
						<option selected>Select university</option>
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="inputState" class="form-control select" placeholder="Select your gender">
						<option selected>Select course</option>
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="inputState" class="form-control select" placeholder="Select your gender">
						<option selected>Select country</option>
					</select>
				</div>
				<div class="col-md-2 col-sm-2">
					<select id="inputState" class="form-control select" placeholder="Select your gender">
						<option selected>Select rating</option>
					</select>
				</div>
			</div>
		</section>
	</div>
	<div class="heading">
		<div class="container">
			<?php
			$sql = mysqli_query($conn,"Select `id` from `seller_notes`");
			$cnt = mysqli_num_rows($sql);
			echo "<h3>Total $cnt notes</h3>";
			  
			?>
		</div>
	</div>
	<div class="notes">
		<div class="container">
			<div class="row">
			
			<?php
              $sql = mysqli_query($conn,"select * from `seller_notes`");
			  while($row = mysqli_fetch_array($sql)){
				  $title = $row['Title'];
			  $image = $row['Display_picture'];
			  $university = $row['University_name'];
			  $pages = $row['Number_of_pages'];
			  $date = $row['Published_date'];
			  $id = $row['id'];
				  
				  echo "<div class='col-lg-4 col-md-6 col-12'>
					  <div class='card' style='width: 22rem;'>
						  <img class='card-img-top' src='$image' alt='Card image cap' style='height:250px;'>
						  <div class='card-body'>
							  <div class='note-heading'>
								  <a href='note-details.php?id=$id'>
									  <h4>$title</h4>
								  </a>
							  </div>
							  <ul>
								  <li><img src='images/search/university.png' alt=''>$university, </li>
								  <li class='pages'><img src='images/search/pages.png' alt=''>&nbsp;$pages Pages</li>
								  <li class='date'><img src='images/search/date.png' alt=''>$date</li>
								  <li style='color: red' class='flag'><img src='images/search/flag.png' alt=''>&nbsp; &nbsp; 5 Users marked this note as inappropriate</li>
							  </ul>
							  <div class='rating'>
								  <input type='radio' id='star5' name='rating' value='5' /><label class='full' for='star5' title='Awesome - 5 stars'></label>
								  <input type='radio' id='star4' name='rating' value='4' /><label class='full' for='star4' title='Pretty good - 4 stars'></label>
								  <input type='radio' id='star3' name='rating' value='3' /><label class='full' for='star3' title='Meh - 3 stars'></label>
								  <input type='radio' id='star2' name='rating' value='2' /><label class='full' for='star2' title='Kinda bad - 2 stars'></label>
								  <input type='radio' id='star1' name='rating' value='1' /><label class='full' for='star1' title='Sucks big time - 1 star'></label>
							  </div>
							  <span>100 Reviews</span>
						  </div>
					  </div>
				  </div>" ;
				   
				
				}

			?>
			
						</div>
		</div>
	</div>
	<ul class="pagination text-center pull-right">
		<li class="page-item active" aria-current="page"><a href="#" class="left"><img src="images/search/left-arrow.png" alt=""></a></li>
		<li class="active"><a href="#" class="link">1</a></li>
		<li><a href="#" class="link">2</a></li>
		<li><a href="#" class="link">3</a></li>
		<li><a href="#" class="link">4</a></li>
		<li><a href="#" class="link">5</a></li>
		<li><a href="#" class="right"><img src="images/search/right-arrow.png" alt=""></a></li>
	</ul><br><br>
	<hr>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<p>Copyright &copy; Tatvasoft All rights reserved.</p>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="social-list text-right">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-linkedin"></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>
</body>

</html>
