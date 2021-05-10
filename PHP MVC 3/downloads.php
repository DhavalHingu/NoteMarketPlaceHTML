<?php
include 'includes/connect.php';
include 'includes/functions.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require_once "vendor/autoload.php";

	if(isset($_REQUEST['id'])){
  $id = $_REQUEST['id'];
}
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['userIdentifier'])){
	header('location:login.php');
}
$userId = $_SESSION['userIdentifier'];
//add reviews
if(isset($_POST['submit'])){
$rate = $_POST['rating'];
$comment = $_POST['comment'];
$noteid = $_POST['noteid'];

$current_date = Date('Y-m-d H:i:s');

$select_downloadId = mysqli_query($conn,"select * from `downloads` where `Downloader` = '$userId' AND `note_id` = '$noteid' ");
while($row=mysqli_fetch_array($select_downloadId)){
  $downloadId = $row['id'];
}

$checkreviews = mysqli_query($conn,"select * from seller_notes_reviews where reviewer_id = '$userId' AND `note_id` = '$noteid'");
if(mysqli_num_rows($checkreviews) > 0){
	$sql = mysqli_query($conn,"update seller_notes_reviews set `Ratings` = '$rate' , `Comments` = '$comment' , `ModifiedDate` = '$current_date' , `ModifiedBy` = '$userId' where `reviewer_id` = '$userId' AND `note_id` = '$noteid'");
}
else{
$sql = mysqli_query($conn,"insert into seller_notes_reviews(`note_id`,`reviewer_id`,`download_id`,`Ratings`,`Comments`,`CreatedDate`,`CreatedBy`,`IsActive`) values('$noteid','$userId','$downloadId','$rate','$comment','$current_date','$userId','1')");
}
if($sql){

header("location:downloads.php?success");
}
}
//spam note
if(isset($_POST['spamNote'])){
  $note = $_POST['note'];
  $current_date = Date('Y-m-d H:i:s');
  
  $select_downloadId = mysqli_query($conn,"select * from `downloads` where `Downloader` = '$userId' AND `note_id` = '$note' ");
  while($row=mysqli_fetch_array($select_downloadId)){
    $downloadId = $row['id'];
	$notetitle = $row['Note_title'];
	$seller = $row['Seller'];
  }
  $select_seller = mysqli_query($conn,"select * from `users` where `id` = '$seller' ");
  while($row=mysqli_fetch_array($select_seller)){
	  $sellerName = $row['FirstName'];
  }
  
  $checkifalready = mysqli_query($conn,"select * from seller_notes_reported_issues where note_id = '$note' and reported_id = '$userId'");
if(mysqli_num_rows($checkifalready) <= 0){
  $sql = mysqli_query($conn,"insert into seller_notes_reported_issues(`note_id`,`reported_id`,`download_id`,`CreatedDate`,`CreatedBy`) values('$note','$userId','$downloadId','$current_date','$userId')");
  
  $username = $_SESSION['userName'];
  
  $email = "techwork.dhaval@gmail.com";
  $title = "{$username} Reported an issue for {$notetitle}";
  $body = "We want to inform you that, {$username} Reported an issue for {$sellerName}’s Note with
  title {$notetitle}. Please look at the notes and take required actions. <br><br>
  Regards,<br>
  Notes Marketplace";
  
  $mail = new PHPMailer(true);
  
  if($sql){
	sendMail($email,$title,$body); 
//   header("location:downloads.php?success");
 
  }
}
  
  }


?>
<?php	
include 'header.php';
  ?>

<body class="dashboard downloads">

	
	
	<div class="container">
		<div class="heading-first">
	<div class="row">
	<div class="col-md-6 col-12">
		<h3>My Downloads</h3>
		</div>
		
			<div class="col-md-6 col-12 pull-right searching-div">
				
		<input type="text" class="search-box" id="tags" placeholder="Search Notes">
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
	
	
<!-- add review popup model	-->
<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <div class="container">
         		<div class="content-box">
         			<h3>Add Review</h3>
         		</div>
		  </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="images/images/close-icon.svg" alt="">
        </button>
      </div>
      <div class="modal-body">
       <div class="container">
       <form action="" class="text-left-nodal" method="POST">
     <input type="hidden" value="<?php $id; ?>" name="noteid">
       <div class="rating">
  	<input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
   
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
   
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
   
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
   
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
		   </div>
  </div>
          <br>
           <div class="container">
            
            <label for="" class="comment">Comments <sup>*</sup></label>
             <textarea class="form-control" id="message-text" name="comment"></textarea>
             <input type="hidden" id="abcd" name="noteid">
           
             <button class="btn submit-btn" type="submit" name="submit">Submit</button>
			   </form>
		</div>
          
        
      </div>
		
    </div>
  </div>
</div>
	
	
	
	
	
	
	
	
	
	
	
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
    url:"downloads_display.php",
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