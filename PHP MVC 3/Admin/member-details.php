<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userIdentifier'])){
    header('loaction:../login.php');
}
include '../includes/connect.php';

?>


<?php include 'header.php'; ?>	
<body class="dashboard note-details nd">



<div class="container">
		<div class="heading-first">
			<h3>Member Details</h3>
		</div>
	</div>
	
<?php
$userid = $_REQUEST['id'];
$sql = mysqli_query($conn,"select * from users u inner join user_profile up on u.id = up.user_id where u.id = '$userid' group by u.id");
while($row=mysqli_fetch_array($sql)){
?>



		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="row mb-4">
						<div class="col-lg-4 col-md-4 mb-4">
							<img src="../<?php echo $row['Profile_picture']; ?>" alt="" style="height:90px;">
						</div>
						<div class="col-lg-8 col-md-8 col-12 left-div-right">
							<div class="row">
	 				<div class="col-lg-4 col-md-4 col-4"><label for="" class="static-label">First Name:</label></div>
	 				<div class="col-md-8 col-8 text-left"><label for="" class="text-right dynamic-label" style="color: #6255a5;"><?php echo $row['FirstName']; ?></label></div>
	 			</div>
	 			
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">Last Name:</label></div>
	 				<div class="col-md-8 col-8 text-left"><label for="" class="text-right dynamic-label" style="color: #6255a5;"><?php echo $row['LastName']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">Email:</label></div>
	 				<div class="col-md-8 col-8 text-left"><label for="" class="text-right dynamic-label" style="color: #6255a5;"><?php echo $row['Email_id']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">DOB:</label></div>
	 				<div class="col-md-8 col-8 text-left"><label for="" class="text-right dynamic-label" style="color: #6255a5;"><?php echo $row['DOB']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">Phone No:</label></div>
	 				<div class="col-md-8 col-8 text-left"><label for="" class="text-right dynamic-label" style="color: #6255a5;"><?php echo $row['Phone_number']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">College/University:</label></div>
	 				<div class="col-md-8 col-8 text-left"><label for="" class="text-right dynamic-label" style="color: #6255a5;"><?php echo $row['University']; ?></label></div>
	 			</div>
						</div>
					</div>
									
				</div>

				<div class="col-lg-6 col-md-12">
					<div class="row">
					<div class="vl"></div>
						<div class="col-md-8 col-12 div-right">
							<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">Address 1:</label></div>
	 				<div class="col-md-8 col-8"><label for="" class="text-left dynamic-label" style="color: #6255a5;"><?php echo $row['Addressline_1']; ?></label></div>
	 			</div>
	 			
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">Address 2:</label></div>
	 				<div class="col-md-8 col-8"><label for="" class="text-left dynamic-label" style="color: #6255a5;"><?php echo $row['Addressline_2']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">City:</label></div>
	 				<div class="col-md-8 col-8"><label for="" class="text-left dynamic-label" style="color: #6255a5;"><?php echo $row['City']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">State:</label></div>
	 				<div class="col-md-8 col-8"><label for="" class="text-left dynamic-label" style="color: #6255a5;"><?php echo $row['State']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">Country:</label></div>
	 				<div class="col-md-8 col-8"><label for="" class="text-left dynamic-label" style="color: #6255a5;"><?php echo $row['Country']; ?></label></div>
	 			</div>
	 			<div class="row">
	 				<div class="col-md-4 col-4"><label for="" class="static-label">Zip code:</label></div>
	 				<div class="col-md-8 col-8"><label for="" class="text-left dynamic-label" style="color: #6255a5;"><?php echo $row['Zipcode'];  } ?></label></div>
	 			</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		
		<div class="container">
		<div class="heading">
	

		<h3>Notes</h3>
	
			
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

function load_data(page,query='',userid='<?php echo $userid; ?>')
{
  $.ajax({
    url:"member-details-note.php",
    method:"POST",
    data:{page:page,query:query,userid:userid},
    success:function(data)
    {
      $('.table-responsive').html(data);
    }
  });
}

$(document).on('click', '.link', function(){
      var page = $(this).data('page_number');
      load_data(page,"");
    });


  
  });     
       
</script>




	</body>
</html>