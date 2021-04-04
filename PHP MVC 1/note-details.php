<?php
if(!isset($_SESSION['userIdentifier'])){
session_start();
}
include 'includes/connect.php';
include 'includes/functions.php';
$noteId = $_REQUEST['id'];
 $sql = mysqli_query($conn,"select * from `seller_notes` where `id` = '$noteId'");
 if(mysqli_num_rows($sql)>0){
     while($row=mysqli_fetch_array($sql)){
         $title = $row['Title'];
         $catId = $row['Category'];
         $desc = $row['Description'];
         $price = $row['Selling_price'];
         $noteImage = $row['Display_picture'];
         $institute =$row['University_name'];
         $countryId = $row['Country'];
         $course = $row['Course'];
         $code= $row['Course_code'];
         $professor=$row['Professor'];
         $pages = $row['Number_of_pages'];
         $date = $row['Published_date'];
		 
     }
     $selectCat = mysqli_query($conn,"select * from `notecategories` where `id` = '$catId' ");
     while($row1=mysqli_fetch_array($selectCat)){
         $category = $row1['Name'];
     }

     $selectCountry = mysqli_query($conn,"select * from `countries` where `id` = '$countryId'");
     while($row2=mysqli_fetch_array($selectCountry)){
        $country = $row2['Name'];
    }

    $notePreview = mysqli_query($conn,"select * from `seller_notes_attachments` where `note_id` = '$noteId' ");
    while($row3=mysqli_fetch_array($notePreview)){
        $pdf = $row3['File_path'];
    }
 }

//  $selectseller = mysqli_query($conn,"select * from `users` where `id` = '$seller_id'");
//      while($row2=mysqli_fetch_array($selectseller)){
//         $seller = $row2['FirstName'];
//     }

 if(isset($_POST['submit'])){
	 userLoginorNot();
 }



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Note Details</title>
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
	</style>
</head>
<body class="note-details-page dashboard">
	
<?php include 'header.php';?>



<div class="heading-first">
		<div class="container">
			<h3>Search and Filter notes</h3>
			<div id="wait" style="color:red"></div>
		</div>
	</div>
	<section class="note-details">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-md-4">
							<img src="<?php echo $noteImage; ?>" alt="">
						</div>
						<div class="col-md-8 padding-0">
							<h3 class="book-name"><?php echo $title; ?></h3>
							<sub class="book-cat"><?php echo $category; ?></sub>
							<p class="book-desc"><?php echo $desc; ?> </p>
                          
 							<?php    
								if(isset($_SESSION['userIdentifier'])){

									if($price > 0){
									echo '<button type="submit" class="btn book-download-btn" data-toggle="modal" data-target="#exampleModalConfirm" name="submit">Download / $ '.$price.' </button>';
									}
									else{
										echo '<button type="submit" class="btn book-download-btn" name="freeNote" id="freeNote">Download / $ '.$price.' </button>';
									}

								}
								else{
									echo '<form action="" method="POST">';
							
									echo '<input type="hidden" name="referURL" value="'.$_SERVER['REQUEST_URI'].'">';
									echo '<button type="submit" class="btn book-download-btn" data-target="#exampleModalLong" name="submit">Download / $ '.$price.' </button>';
								}
								echo '</form>';
							?>							
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-12 col-12">
					<div class="row">
						<div class="col-md-4"><label for="" class="static-label">Institution:</label></div>
						<div class="col-md-8 text-right"><label for="" class="text-right dynamic-label"><?php echo $institute; ?></label></div>
					</div>
					<div class="row">
						<div class="col-md-4"><label for="" class="static-label">Country:</label></div>
						<div class="col-md-8 text-right"><label for="" class="text-right dynamic-label"><?php echo $country; ?></label></div>
					</div>
					<div class="row">
						<div class="col-md-4"><label for="" class="static-label">Course:</label></div>
						<div class="col-md-8 text-right"><label for="" class="text-right dynamic-label"><?php echo $course; ?></label></div>
					</div>
					<div class="row">
						<div class="col-md-7"><label for="" class="static-label">Course Code:</label></div>
						<div class="col-md-5 text-right"><label for="" class="text-right dynamic-label"><?php echo $code; ?></label></div>
					</div>
					<div class="row">
						<div class="col-md-4"><label for="" class="static-label">Professor:</label></div>
						<div class="col-md-8 text-right"><label for="" class="text-right dynamic-label"><?php echo $professor; ?></label></div>
					</div>
					<div class="row">
						<div class="col-md-8"><label for="" class="static-label">Number of Pages:</label></div>
						<div class="col-md-4 text-right"><label for="" class="text-right dynamic-label"><?php echo $pages; ?></label></div>
					</div>
					<div class="row">
						<div class="col-md-6"><label for="" class="static-label">Approved Date:</label></div>
						<div class="col-md-6 text-right"><label for="" class="text-right dynamic-label"><?php echo $date; ?></label></div>
					</div>
					<div class="row">
						<div class="col-md-6"><label for="" class="static-label">Rating</label></div>
						<div class="col-md-6 text-right">
							<label for="" class="text-right dynamic-label">100 Reviews</label>
						</div>
						<div class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
							<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
							<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
							<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
							<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<hr class="hr-1">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-12">
				<div class="heading">
					<h3>Note Preview</h3>
				</div>
				<div id="Iframe-Cicis-Menu-To-Go" class="">
					<div class="responsive-wrapper 
     responsive-wrapper-padding-bottom-90pct" style="-webkit-overflow-scrolling: touch; overflow: auto;">
						<iframe src="<?php echo $pdf; ?>">
							<p style="font-size: 110%;"><em><strong>ERROR: </strong>
									An &#105;frame should be displayed here but your browser version does not support &#105;frames.</em> Please update your browser to its most recent version and try again, or access the file <a href="http://unec.edu.az/application/uploads/2014/12/pdf-sample.pdf">with this link.</a></p>
						</iframe>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-12 mb-5">
				<div class="heading customer-review-heading">
					<h3>Customer Reviews</h3>
				</div>
				<div class="customer-reviews">
					<div class="review-content">
						<img src="images/User-Profile/user-img.png" alt="">
						<h3>Richard Brown</h3>
						<div class="rating-">
							<div class="rating">
								<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est fuga libero eos aliquid magnam vitae, autem qui eius</p>
						</div>
					</div>
					<hr class="review-content-seprate">
					<div class="review-content review-content-2">
						<img src="images/User-Profile/user-img.png" alt="">
						<h3>Richard Brown</h3>
						<div class="rating-">
							<div class="rating">
								<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est fuga libero eos aliquid magnam vitae, autem qui eius</p>
						</div>
					</div>
					<hr class="review-content-seprate-2">
					<div class="review-content review-content-3">
						<img src="images/User-Profile/user-img.png" alt="">
						<h3>Richard Brown</h3>
						<div class="rating-">
							<div class="rating">
								<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
								<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
								<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
								<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
								<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<footer>
		<hr>
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
	<!--	Thanks popup model-->
	<!-- Modal -->
	<div class="modal fade thanks-popup" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="heading">
						<h3 class="text-center">Thank you for Purchasing !</h3>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative; top: 2px; left: 6px;">
						<span aria-hidden="true">
							<image src="images/images/close.png"></image>
						</span>
					</button>
				</div>
				<div class="modal-body" id="modal-body">
					<div class="img"></div>
					<h4>Dear <?php echo $_SESSION['userName']; ?>,</h4>
					<p>As this is paid notes - you need to pay seller offline. We will send him an email that you want to download this note. He may contact you furtherfor payment process completion.</p>
					<p>In case you have urgency,<br>Please contact us on +9195377345959</p>
					<p>Once he receives payment and acknowledge us- selected notes you can see over my downloads tab for download </p>
					<p>Have a Good Day!</p>
				</div>
			</div>
		</div>
	</div>

<!-- paid notes modal -->
<div class="modal fade thanks-popup" id="exampleModalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
<div class="modal-body">
Are you sure you want to download this Paid note ? Please Confirm.
      </div>
      <div class="modal-footer">
		 <form>
      <button type="submit" class="btn btn-primary" style="background-color:#6255a5;" name="downloadNote" id="downloadNote">Yes</button>  
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							</form>
      </div>
</div>
		</div>
	</div>


	<div class="modal fade thanks-popup" id="exampleModalLongFree" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="heading">
						<h3 class="text-center">Thank you for Purchasing !</h3>
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative; top: 2px; left: 6px;">
						<span aria-hidden="true">
							<image src="images/images/close.png"></image>
						</span>
					</button>
				</div>

	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>
<script>
	 $(document).ready(function(){
	$(document).on('click','#downloadNote',function(e){
		$('#exampleModalConfirm').modal('hide');
		$("#wait").html("Please Wait....");
		
		e.preventDefault();  //add this line to prevent reload
			
       var id = "<?php echo $noteId; ?>";            	
			$.ajax({
                        type: "POST",
                        url: "notedetails_process.php",
                        data: "id=" + id,
                        success: function(data) {
								 if(data=="1"){
								$("#wait").hide();
								$('#exampleModalLong').modal('show');
								console.log(data);
						
							}	
							else{
								$("#wait").html(data);
								
							}
							
					}
							
						
						
                    });
					

	
                
		});
	
		
		$(document).on('click','#freeNote',function(e){

		$("#wait").html("Please Wait....");
		
		e.preventDefault();  //add this line to prevent reload
			
       var id = "<?php echo $noteId; ?>";            	
			$.ajax({
                        type: "POST",
                        url: "notedetails_process_freeNotes.php",
                        data: "id=" + id,
                       
                        success: function(data) {
					
							if(data=="1"){
								$("#wait").hide();
								$('#exampleModalLongFree').modal('show');
								console.log(data);	
							}
																	
						else{
							$("#wait").html(data);
								console.log(data);
							}
							
					}
							
						
						
                    });
				});
					
	
	
	
	
	
	
	
	});	

</script>
</body>
</html>