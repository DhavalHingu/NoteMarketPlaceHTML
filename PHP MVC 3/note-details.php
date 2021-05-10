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

<?php include 'header.php';?>
<body class="note-details-page dashboard np">
	




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
							<?php

$qu = mysqli_query($conn,"select note_id,SUM(Ratings) as sum , COUNT(*) as countid from seller_notes_reviews where note_id = '$noteId'");
while($row3=mysqli_fetch_array($qu)){
  $notes = $row3['note_id'];
  //$rates = $row3['Ratings'];
  $counts = $row3['countid'];

if($counts==0){
  $avg=1;
}
else{
  $avg = $counts;
}
// echo $notes;
//  echo $rates;
//echo $count;
$sum = $row3['sum'];
$devide = ceil($sum / $avg);
}
// 	?>
							<label for="" class="text-right dynamic-label"><?php echo $counts; ?> Reviews</label>
						</div>
						<div class="rating">
							<?php
						if($devide == 5){
               echo '   
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>';
                }
                if($devide == 4){
                  echo '   
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star-o" ></span>';
                   }
                   if($devide == 3){
                    echo '   
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star-o" ></span>
                     <span class="fa fa-star-o" ></span>';
                     }
                     if($devide == 2){
                      echo '   
                       <span class="fa fa-star checked" ></span>
                       <span class="fa fa-star checked" ></span>
                       <span class="fa fa-star-o " ></span>
                       <span class="fa fa-star-o " ></span>
                       <span class="fa fa-star-o" ></span>';
                       }
                       if($devide == 1){
                        echo '   
                         <span class="fa fa-star checked" ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o" ></span>';
                         }
                         if($devide == 0){
                          echo '   
                           <span class="fa fa-star-o" ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o" ></span>';
                           }
        ?>
                        
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
                  
            <div class="customer-reviews col-md-12">
                
            <?php

    $qu = mysqli_query($conn,"select SUM(Ratings) as sum , COUNT(*) as countid from seller_notes_reviews where note_id = '$noteId'");


    while($row3=mysqli_fetch_array($qu)){
  
  //$rates = $row3['Ratings'];
  $counts = $row3['countid'];
  $sum = $row3['sum'];

if($counts==0){
    $avg=1;
  }
  else{
    $avg = $counts;
  }
 
  $devide = ceil($sum / $avg);



$select = mysqli_query($conn,"select * from seller_notes_reviews where note_id = '$noteId'");
while($fetch=mysqli_fetch_array($select)){
    $reviewer = $fetch['reviewer_id'];
    $notes = $fetch['note_id'];

$selectname = mysqli_query($conn,"select * from users where id = '$reviewer' ");
while($row5 = mysqli_fetch_array($selectname)){



 	?>


            <?php
					if(mysqli_num_rows($select) > 0){
						
                            ?>

           <div class="row"> 
               
                 <div class="col-md-1"><img src="images/User-Profile/user-img.png" alt=""></div>
                 <div class="col-md-10"><h4><?php
                
						
                  echo  $row5['FirstName'] .' '. $row5['LastName']; 
                  ?>
                        
						</h4></div>
                    <div class="ratings">
                    <?php
                    if($devide == 5){
               echo '   
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>';
                }
                if($devide == 4){
                  echo '   
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star-o" ></span>';
                   }
                   if($devide == 3){
                    echo '   
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star-o" ></span>
                     <span class="fa fa-star-o" ></span>';
                     }
                     if($devide == 2){
                      echo '   
                       <span class="fa fa-star checked" ></span>
                       <span class="fa fa-star checked" ></span>
                       <span class="fa fa-star-o " ></span>
                       <span class="fa fa-star-o " ></span>
                       <span class="fa fa-star-o" ></span>';
                       }
                       if($devide == 1){
                        echo '   
                         <span class="fa fa-star checked" ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o" ></span>';
                         }
                         if($devide == 0){
                          echo '   
                           <span class="fa fa-star-o" ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o" ></span>';
                           }
        ?>
                    </div>
                <div class="col-md-12"> <?php echo $fetch['Comments']; ?> </div>        
                </div>
                <hr>
                
                <?php
                  } } } }
            
          
?>
            </div>
            
            </div>
						</div>
						
						</div>
						
	<br><br><br><br>
	<?php include 'footer.php'; ?>
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
						
					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative; top: 2px; left: 6px;">
						<span aria-hidden="true">
							<image src="images/images/close.png"></image>
						</span>
					</button>
				</div>

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