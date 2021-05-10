<?php
if(!isset($_SESSION)){
session_start();
}
if(!isset($_SESSION['userIdentifier'])){
	header('location:../login.php');
}
include '../includes/connect.php';
include '../includes/functions.php';
?>

<?php
if(isset($_POST['submitRemarks'])){
unpublishNoteByAdmin();
}

?>

<?php include 'header.php'; ?>
<body class="dashboard">
	
	<div class="container">
		<div class="heading-first">
			<h3>Dashboard</h3>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 mb-4">
				<a href="notes-under-review.html" style="text-decoration: none">
					<div class="downloads three-div">
						<h3 class="text-center">
                        <?php
								
									$sql = mysqli_query($conn,"select COUNT(*) as total_in_review from `seller_notes` where status = '7'");
								
									while($row = mysqli_fetch_array($sql)){
										$totalNotesInReview = $row['total_in_review'];
									}
									echo"<a style='text-decoration:none; color:#6255a5' href='notes-under-review.php'> $totalNotesInReview </a>";
								?>


                        </h3>
						<p class="text-center">Numbers of Notes in Review for Publish</p>
					</div>
				</a>
			</div>
			<div class="col-md-4 mb-4">
				<a href="download-note.html" style="text-decoration: none">
					<div class="rejected three-div">
						<h3 class="text-center">
                        <?php
								
									$sql = mysqli_query($conn,"select COUNT(*) as total_download from `downloads` where Attachment_downloaded_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() AND Attachment_downloaded = '1' ");
								
									while($row = mysqli_fetch_array($sql)){
										$totalDownloadNotes = $row['total_download'];
									}
									echo"<a style='text-decoration:none; color:#6255a5' href='downloaded-note.php'> $totalDownloadNotes </a>";
								?>

                        </h3>
						<p class="text-center">Numbers of New Notes Downloaded <br> {Last 7 Days}</p>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="members.html" style="text-decoration: none">
					<div class="buyer-req three-div">
						<h3 class="text-center">
                        <?php
								
                                $sql = mysqli_query($conn,"select COUNT(*) as total_users from `users` where CreatedDate BETWEEN DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND CURDATE() AND IsEmailVerified != ''");
                            
                                while($row = mysqli_fetch_array($sql)){
                                    $totalNewUsers = $row['total_users'];
                                }
                                echo"<a style='text-decoration:none; color:#6255a5' href='members.php'> $totalNewUsers </a>";
                            ?>
                        </h3>
						<p class="text-center">Numbers of New Registrations<br>{Last 7 Days}</p>
					</div>
				</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="heading">
			<div class="row">
				<div class="col-md-4">
					<h3 class="heading">Published Notes</h3>
				</div>
				<div class="col-md-6 searching-div">
					<input type="text" class="search-box" placeholder="Search Notes" id="tags">
					<button class="btn search-btn" id="search">Search</button>
				</div>
				<div class="col-md-2 searching-div pull-right">
					<select name="" id="month" class="select">
						<option value="">Select month</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive">
			
		</div>
	</div>
	<?php include 'footer.php'; ?>
<script>
    $(document).ready(function(){

load_data(1);

function load_data(page,query ='',query2='')
{
  $.ajax({
    url:"dashboard_publishednotes.php",
    method:"POST",
    data:{page:page,query:query,query2:query2},
    success:function(data)
    {
      $('.table-responsive').html(data);
    }
  });
}

$(document).on('click', '.link', function(){
      var page = $(this).data('page_number');
      var query = $('#tags').val();
      load_data(page, query,"");
    });


    $(document).on('click', '#search', function(){
      var query = $('#tags').val();
      console.log(query);
      load_data(1, query,"");
    });

	$("#month").change(function(){
      var query2 = $('#month').val();
      console.log(query2);
      load_data(1, "",query2);
    });

  });     
       
</script>



</body>

</html>
