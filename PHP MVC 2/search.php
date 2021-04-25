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
			bottom: 0px;
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

	    .checked{
			color : orange;
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
					<input type="text" placeholder="Search notes here" class="form-control search-box" id="tags">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="selectType" class="form-control select" placeholder="Select your gender">
					<option  value="0" selected>Select type</option>
						<?php
						
							$selectType = mysqli_query($conn,"select * from note_types");
							while($row=mysqli_fetch_array($selectType)){
							echo "<option value=".$row['id']."> ".$row['Name']." </option>";
							}
						?>
						
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="selectCategory" class="form-control select" placeholder="Select your gender">
						<option value="0" selected>Select category</option>
						<?php
						
						$selectCat = mysqli_query($conn,"select * from notecategories");
						while($row=mysqli_fetch_array($selectCat)){
						echo "<option value=".$row['id']."> ".$row['Name']." </option>";
						}
					?>
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="SelectUni" class="form-control select" placeholder="Select your gender">
						<option value="0" selected>Select university</option>
						<?php
						
							$selectUni = mysqli_query($conn,"select distinct * from seller_notes group by University_name");
							while($row=mysqli_fetch_array($selectUni)){
							echo "<option value=".$row['University_name']."> ".$row['University_name']." </option>";
							}
						?>
						
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="selectCourse" class="form-control select" placeholder="Select your gender">
						<option selected value="0">Select course</option>
						<?php
						
							$selectCourse = mysqli_query($conn,"select * from seller_notes group by Course");
							while($row=mysqli_fetch_array($selectCourse)){
							echo "<option value=".$row['Course']."> ".$row['Course']." </option>";
							}
						?>
						
					</select>
				</div>
				<div class="col-md-2 col-sm-2 mb-2">
					<select id="selectCountry" class="form-control select" placeholder="Select your gender">
						<option selected value="0">Select country</option>
						<?php
						
							$selectCountry = mysqli_query($conn,"select * from countries");
							while($row=mysqli_fetch_array($selectCountry)){
							echo "<option value=".$row['id']."> ".$row['Name']." </option>";
							}
						?>
						
					</select>
				</div>
				<div class="col-md-2 col-sm-2">
					<select id="selectRating" class="form-control select" placeholder="Select your gender">
						<option selected value="0">Select rating</option>
						<?php
						
							$selectRate = mysqli_query($conn,"select * from seller_notes_reviews group by Ratings");
							while($row=mysqli_fetch_array($selectRate)){
							echo "<option value=".$row['Ratings']."> ".$row['Ratings']." </option>";
							}
						?>
					</select>
				</div>
			</div>
		</section>
	</div>
	<div class="all-notes">
	
	</div>
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
	<script>

$(document).ready(function(){

load_data(1);

function load_data(page,query ='',query1='',query2='',query3='',query4='',query5='',query6='')
{
  $.ajax({
    url:"search_displayNotes.php",
    method:"POST",
    data:{page:page,query:query,query1:query1,query2:query2,query3:query3,query4:query4,query5:query5,query6:query6},
    success:function(data)
    {
      $('.all-notes').html(data);
    }
  });
}


$(document).on('click', '.link', function(){
      var page = $(this).data('page_number');
      var query = $('#tags').val();
      load_data(page, query);
    });


    $(document).on('keyup', '#tags', function(){
      var query = $('#tags').val();
      console.log(query);
      load_data(1, query);
    });
	
	$(document).on('change', '#selectType', function(){
      var query = $('#selectType').val();
      console.log(query);
      load_data(1,'', query);
    });

	$(document).on('change', '#selectCategory', function(){
      var query = $('#selectCategory').val();
      console.log(query);
      load_data(1,'', '',query);
    });

	$(document).on('change', '#selectUni', function(){
      var query = $('#selectUni').val();
      console.log(query);
      load_data(1,'', '','',query);
    });

	$(document).on('change', '#selectCourse', function(){
      var query = $('#selectCourse').val();
      console.log(query);
      load_data(1,'', '','','',query);
    });

	$(document).on('change', '#selectCountry', function(){
      var query = $('#selectCountry').val();
      console.log(query);
      load_data(1,'', '','','','',query);
    });

	$(document).on('change', '#selectRating', function(){
      var query = $('#selectRating').val();
      console.log(query);
      load_data(1,'', '','','','','',query);
    });


});

     
       
   </script> 
 
</body>

</html>
