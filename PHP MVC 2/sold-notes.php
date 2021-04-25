<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Sold Notes</title>
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
<body class="dashboard downloads">
<?php	
if(!isset($_SESSION)){
  session_start();
}
include 'header.php';
		?>
	<div class="container">
		<div class="heading-first">
	<div class="row">
	<div class="col-md-6 col-12">
		<h3>My Sold Notes</h3>
		</div>
		
			<div class="col-md-6 col-12 pull-right searching-div">
			
		<input type="text" class="search-box" placeholder="Search Notes" id="tags">
		<button class="btn search-btn" id="search">Search</button>
		</div>
		</div>
			</div>
	</div>
	<div class="container">
	<div class="table-responsive">
	
		</div>
	</div>
	
	<br><br><br><br><br><br><br>
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

$(document).ready(function(){

load_data(1);

function load_data(page,query ='')
{
  $.ajax({
    url:"soldNotes_display.php",
    method:"POST",
    data:{page:page,query:query},
    success:function(data)
    {
      $('.table-responsive').html(data);
    }
  });
}

$(document).on('click', '.link', function(){
      var page = $(this).data('page_number');
      var query = $('#tags').val();
      load_data(page, query);
    });


    $(document).on('click', '#search', function(){
      var query = $('#tags').val();
      console.log(query);
      load_data(1, query);
    });

  });     
       
   </script> 

<script src="https://unpkg.com/jquery-tablesortable"></script>


	</body>
</html>