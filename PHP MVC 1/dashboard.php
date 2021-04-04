<?php
include 'includes/connect.php';
include 'includes/functions.php';
if(!session_start()){
session_start();
}
if(!isset($_SESSION['userIdentifier'])){
   header('location:login.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>DashBoard</title>
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
	<style>
		.searching-div .search-box,
		.searching-div .search-btn{
			position: relative;
			bottom: 35px;
			left: -24px;
		}
		.searching-div .search-btn{
			position: relative;
			bottom: 38px
		}
		@media(max-width:768px){
			.dashboard .searching-div .search-box,
			.dashboard .searching-div .search-btn{
				position: relative;
				left: 248px;
				bottom: 50px;
			}
			.dashboard .searching-div .search-btn{
				position: relative;
				bottom: 53px;
			}
		}
		@media(max-width:425px){
			.dashboard .searching-div .search-box,
			.dashboard .searching-div .search-btn{
				position: relative;
				left: -100px;
				
				
			}
			.dashboard .searching-div{
				max-width: 90%;
			}
		}
		@media(max-width:320px){
			.dashboard .searching-div .search-btn{
				max-width: 100%;
			}
			.dashboard .searching-div{
				max-width: 100%;
			}
		}
	</style>
</head>
<body class="dashboard">
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
								
								$sql = mysqli_query($conn,"select SUM(`Purchased_price`) as total_amount from `downloads` where `Seller` = '$sellerId' ");
								while($row=mysqli_fetch_array($sql)){
									$totalEarned = $row['total_amount'];
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
								
								$sql = mysqli_query($conn,"select COUNT(*) as total_download from `downloads` where `Downloader` = '$sellerId' AND `Attachment_downloaded` = '1' ");
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
								echo"<a style='text-decoration:none; color:#6255a5' href='buyer-request.php'> $totalRejected </a>";

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
										echo"<a style='text-decoration:none; color:#6255a5' href='buyer-request.php'> $totalBuyer </a>";

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
					<input type="text" class="search-box" placeholder="Search Notes">
					<button class="btn search-btn">Search</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive">
			<table class="table table-sm table-xs" id="mytable" >


				<thead>
					<tr>
						<th scope="col" class="table-column-header">Added Date</th>
						<th scope="col" class="table-column-header">Title</th>
						<th scope="col" class="table-column-header">Category</th>
						<th scope="col" class="table-column-header">Status</th>
						<th scope="col" class="table-column-header">Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes` , `notecategories` , `referencedata` where `seller_notes`.`seller_id` = '$sellerId' AND `seller_notes`.`Category` = `notecategories`.`id` AND `seller_notes`.`status` = `referencedata`.`id`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1






$sql = mysqli_query($conn,"select `seller_notes`.`CreatedDate` , `seller_notes`.`Title` , `seller_notes`.`id` as note_id , `seller_notes`.`IsActive`,`notecategories`.`Name` , `notecategories`.`id` , `referencedata`.`id` , `referencedata`.`Value` from `seller_notes` , `notecategories` , `referencedata` where `seller_notes`.`seller_id` = '$sellerId' AND `seller_notes`.`Category` = `notecategories`.`id` AND `seller_notes`.`status` = `referencedata`.`id` AND `seller_notes`.`IsActive` = '1' LIMIT $offset, $total_records_per_page");
if(mysqli_num_rows($sql) > 0){
	while($row=mysqli_fetch_array($sql)){
		$noteid = $row['note_id'];
		
?>

					<tr class="table-row">
						<td><?php echo $row['CreatedDate']; ?></td>
						<td><?php echo $row['Title']; ?></td>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['Value'] ?></td>
						<?php
						if($row['Value'] == "Draft"){
							?>
						<td class='text-center'><a href='add-notes.php?id=<?php echo $noteid; ?>'><img src='images/images/edit.png' alt=''></a> &nbsp;
							<a onclick="confirm('Are you sure you wants to delete ?')" class='delete' href="delete_notes.php?id=<?php echo $noteid; ?>"><img src='images/images/delete.png' alt=''></a>
							<?php
						echo "</td>";
						}
						else{
							echo "<td class='text-center'><a href='note-details.php?id=".$noteid."')\><img src='images/images/eye.png' alt=''></a></td>";
						}
						?>
					</tr>
	<?php				
	} }
	
	else{
		echo "<p>No Record Found</p>";
	}
	?>
				</tbody>
			</table>
			<ul class="pagination text-center pull-right">
			<li class="page-item active" aria-current="page" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a class='left' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>><img src="images/search/left-arrow.png" alt=""></a>
	</li>
        <?php
        pagination($page_no,$previous_page,$total_no_of_pages,$second_last,$next_page);
        ?>
        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a class='right' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>><img src="images/search/right-arrow.png" alt=""></a>
	</li>
  
			</ul>
		</div>
	</div>







	<div class="container">
		<div class="heading">
			<div class="row">
				<div class="col-md-6 col-12">
					<h3>Published Notes</h3>
				</div>
				<div class="col-md-6 pull-right searching-div col-12">
					<input type="text" class="search-box" placeholder="Search Notes">
					<button class="btn search-btn">Search</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive">
			<table class="table" id="mytable">
				<thead>
					<tr>
						<th scope="col" class="table-column-header">Added Date</th>
						<th scope="col" class="table-column-header">Title</th>
						<th scope="col" class="table-column-header">Category</th>
						<th scope="col" class="table-column-header">Sell Type</th>
						<th scope="col" class="table-column-header">Price</th>
					</tr>
				</thead>
				<tbody>
<?php				
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes` , `notecategories` , `referencedata` where `seller_notes`.`seller_id` = '$sellerId' AND `seller_notes`.`Category` = `notecategories`.`id` AND `seller_notes`.`status` = `referencedata`.`id`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1






$sql = mysqli_query($conn,"select * from `seller_notes` , `notecategories` , `referencedata` where `seller_notes`.`seller_id` = '$sellerId' AND `seller_notes`.`Category` = `notecategories`.`id` AND `seller_notes`.`status` = `referencedata`.`id` AND `seller_notes`.`status`= '9' LIMIT $offset, $total_records_per_page");
if(mysqli_num_rows($sql) > 0){
	while($row=mysqli_fetch_array($sql)){

?>

<tr class="table-row">
						<td><?php echo $row['CreatedDate']; ?></td>
						<td><?php echo $row['Title']; ?></td>
						<td><?php echo $row['Name']; ?></td>
						<td><?php echo $row['Value'] ?></td>
						<td><?php echo "$". $row['Selling_price'] ?></td>	
					</tr>
					<?php } } else{
						echo "<p>No Record Found</p>";
					}
					?>
				</tbody>
			</table>
			<ul class="pagination text-center pull-right">
			<li class="page-item active" aria-current="page" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a class='left' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>><img src="images/search/left-arrow.png" alt=""></a>
	</li>
        <?php
        pagination($page_no,$previous_page,$total_no_of_pages,$second_last,$next_page);
        ?>
        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a class='right' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>><img src="images/search/right-arrow.png" alt=""></a>
	</li>
  
			</ul>
		</div>
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











	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>
	<script>




	</script>
</body>
</html>