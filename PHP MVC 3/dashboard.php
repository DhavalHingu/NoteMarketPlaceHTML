<?php
include 'includes/connect.php';
include 'includes/functions.php';
if(!$_SESSION){
session_start();
}
if(!isset($_SESSION['userIdentifier'])){
   header('location:login.php');
}


?>
<?php include 'header.php'; ?>

<body class="dashboard ds">
	<?php include 'header.php'; ?>
	<div class="container">
		<div class="heading-first">
			<div class="row">
				<div class="col-md-10 col-sm-10 col-6">
					<h3>Dashboard</h3>
				</div>
				<div class="col-md-2 col-sm-2 col-6">
					<a class="add-note btn" href="add-notes.php" style="line-height: 36px">Add Note</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-12 col-sm-12 col-12 top-earning">
				<div class="row earning-div">
					<div class="col-lg-4 col-md-4 col-sm-4 col-4 earning-label ">
						<img src="images/images/earning-icon.svg" alt="">
						<h3 class="text-center">My Earning</h3>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-8 earning-details">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<h3 class="text-center">
								<?php
								$sellerId = $_SESSION['userIdentifier'];
									$sql = mysqli_query($conn,"select COUNT(*) as total_sold from `downloads` where `Seller` = '$sellerId'");
								
									while($row = mysqli_fetch_array($sql)){
										$totalSoldNotes = $row['total_sold'];
									}
									echo"<a style='text-decoration:none; color:#6255a5' href='sold-notes.php'> $totalSoldNotes </a>";
								?>
								
								</h3>
								<p class="text-center">Number of Notes Sold</p>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<h3 class="text-center">
								<?php
								$totalEarned="";
								$sql = mysqli_query($conn,"select SUM(`Purchased_price`) as total_amount from `downloads` where `Seller` = '$sellerId' group by id ");
								while($row=mysqli_fetch_array($sql)){
									$totalEarned = $row['total_amount'];
								}
								if($totalEarned == 0 || $totalEarned == ""){
									$totalEarned = 0;
								}
								echo"<a style='text-decoration:none; color:#6255a5' href='sold-notes.php'> ".'$'." $totalEarned </a>";

								?>
								
								
								</h3>
								<p class="text-center">Money Earned</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-12 col-12 other-details">
				<div class="row second-box">
					<div class="col-lg col-12 mb-3">
						<div class="downloads three-div">
							<h3 class="text-center">
							<?php
								
								$sql = mysqli_query($conn,"select COUNT(*) as total_download from `downloads` where `Downloader` = '$sellerId' AND `Allowed_Download` = '1' ");
								while($row=mysqli_fetch_array($sql)){
									$totalDownloaded = $row['total_download'];
								}
								echo"<a style='text-decoration:none; color:#6255a5' href='downloads.php'> $totalDownloaded </a>";

								?>
							
							
							</h3>
							<p class="text-center">My Downloads</p>
						</div>
					</div>
					<div class="col-lg col-12 mb-3">
						<div class="rejected three-div">
							<h3 class="text-center">
							<?php
								
								$sql = mysqli_query($conn,"select COUNT(*) as total_reject from `seller_notes` where `seller_id` = '$sellerId' AND `status` = '10' ");
								while($row=mysqli_fetch_array($sql)){
									$totalRejected = $row['total_reject'];
								}
								echo"<a style='text-decoration:none; color:#6255a5' href='rejected-notes.php'> $totalRejected </a>";

								?>
							
							
							
							</h3>
							<p class="text-center">My Rejected Notes</p>
						</div>
					</div>
					<div class="col-lg col-12">
						<div class="buyer-req three-div">
							<h3 class="text-center"><?php
								
								$sql = mysqli_query($conn,"select COUNT(*) as total_requests from `downloads` where `Seller` = '$sellerId'");
								while($row=mysqli_fetch_array($sql)){
									$totalBuyer = $row['total_requests'];
								}
										echo"<a style='text-decoration:none; color:#6255a5' href='buyer-requests.php'> $totalBuyer </a>";

								?></h3>
							<p class="text-center">Buyer Requests</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="heading">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-12 mb-2">
					<h3>In Progress Notes</h3>
				</div>
				<div class="col-md-6 col-12 pull-right searching-div">
					<input type="text" class="search-box" placeholder="Search Notes" id="tags">
					<button class="btn search-btn" id="search">Search</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive table-responsive-first">
			
		</div>
	</div>







	<div class="container">
		<div class="heading">
			<div class="row">
				<div class="col-md-6 col-12">
					<h3>Published Notes</h3>
				</div>
				<div class="col-md-6 pull-right searching-div col-12">
					<input type="text" class="search-box" placeholder="Search Notes" id="tags1">
					<button class="btn search-btn" id="search1">Search</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive table-responsive-2">
			
		</div>
	</div>
	<?php include 'footer.php'; ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure you wants to delete this Note ?</h5>
        <br>
        <div id="waitfor" style="color:green"></div>
      </div>
      
      <div class="modal-footer">
<form action="delete_notes.php">
	<input type="hidden" name="id" value="">
      <button type="submit" class="btn btn-primary" style="background-color:#6255a5;" onclick="publishNote();">Yes</button>  
</form> 
	  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      
      </div>
    </div>
  </div>
</div>




	<script>

$(document).ready(function(){

load_data(1);

function load_data(page,query ='')
{
  $.ajax({
    url:"dashboard_inProgressNotes.php",
    method:"POST",
    data:{page:page,query:query},
    success:function(data)
    {
      $('.table-responsive-first').html(data);
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


<script>

$(document).ready(function(){

load_data_2(1);

function load_data_2(page,query ='')
{
  $.ajax({
    url:"dashboard_publishedNotes.php",
    method:"POST",
    data:{page:page,query:query},
    success:function(data)
    {
      $('.table-responsive-2').html(data);
    }
  });
}

$(document).on('click', '.link', function(){
      var page = $(this).data('page_number');
      var query = $('#tags1').val();
      load_data_2(page, query);
    });


    $(document).on('click', '#search1', function(){
      var query = $('#tags1').val();
      console.log(query);
      load_data_2(1, query);
    });

  });   
  
 

       
   </script>
<!-- From a CDN -->

<script src="https://unpkg.com/jquery-tablesortable"></script>


</body>
</html>