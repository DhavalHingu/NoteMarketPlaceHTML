<?php
if(!isset($_SESSION)){
	session_start();
}

include 'includes/connect.php';

?>

<?php include 'header.php' ?>


<body class="search-page sp">
	




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
	<?php include 'footer.php'; ?>
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
