<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
include 'includes/connect.php';
include 'includes/functions.php';

if(!isset($_SESSION['userIdentifier'])){
    header('location:login.php');
}

if(isset($_REQUEST['id'])){
$id = $_REQUEST['id'];
$sql = mysqli_query($conn,"select `seller_notes`.`id`, `seller_notes`.`Title`,`seller_notes`.`Category`,`seller_notes`.`Country`,`seller_notes`.`Note_type`,`notecategories`.`id` as noteid,`notecategories`.`Name` as notename,`note_types`.`id` as notetypeid,`note_types`.`Name` as notetypename,`seller_notes`.`Number_of_pages`,`seller_notes`.`Description`,`countries`.`id` as countryid,`countries`.`Name` as countryname,`seller_notes`.`University_name`,`seller_notes`.`Course`,`seller_notes`.`Course_code`,`seller_notes`.`Professor`,`seller_notes`.`Selling_price`, `referencedata`.`id` as radioid,`referencedata`.`Value` as radiovalue from `seller_notes` , `referencedata`,`notecategories` , `note_types`  , `countries`  where `seller_notes`.`id` = '$id' AND `seller_notes`.`Category` = `notecategories`.`id`  AND `seller_notes`.`Note_type` = `note_types`.`id` ANd `seller_notes`.`Country` = `countries`.`id` AND `seller_notes`.`IsPaid` = `referencedata`.`id` ");
if(mysqli_num_rows($sql) > 0){
	while($row = mysqli_fetch_array($sql)){
		$title = $row['Title'];
		$catid=$row['noteid'];

		$category=$row['notename'];
		
		$refid = $row['notetypeid'];
		$notetype = $row['notetypename'];
		
		$noofpages = $row['Number_of_pages'];
		$desc = $row['Description'];
		$country =$row['countryname'];
		$country_id=$row['countryid'];
		$university =$row['University_name'];
		$course = $row['Course'];
		$code=$row['Course_code'];
		$lecturer = $row['Professor'];
		$radio = $row['radioid'];
		$price=$row['Selling_price'];
	}
}

}
else{
	$id="";
	$title = "";
		$catid="2";

		$category="select category";
		
		$refid = "";
		$notetype = "";
		
		$noofpages = "";
		$desc = "";
		$country ="select country";
		$country_id="2";
		$university ="";
		$course = "";
		$code="";
		$lecturer = "";
		// = $row['id'];
		$price="";
		$radio=0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Add Notes</title>
	<!--Google Font-->
	<link href="https://fonts.googleapiws.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--External CSS-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<style>
		
	</style>
	</head>
<body class="add-notes">
	<!--Nvaigation Bar Starts-->
	<?php include 'header.php'; ?>

<!--Banner Image with text overlay Starts	-->
<section class="banner">
		<img src="images/User-Profile/banner-with-overlay.jpg" alt="banner" id="bannerImage class="img-responsive>
		<div class="banner-text-center">Add Notes</div>
	</section>
<!--Banner Image with text overlay ends-->
	
<!--Heading Starts	-->
<div class="container">
		<div class="content-box">
			<h3>Basic Note Details</h3>
		</div>
	</div>
<!--Heading Ends -->
	
	<div class="container">
		<form id="add-notes" action="" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="id" value = "<?php echo $id; ?>">
		<div class="form-row">
			<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Title <sup>*</sup></label>
					<input type="text" class="form-control" id="title" placeholder="Enter your notes title" name="title" required
					value = "<?php echo $title; ?>" >
					
				</div>
			
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Category <sup>*</sup></label>
					<select id="category" class="form-control select" name="category">
                      
						<option value = "<?php echo $catid ?>" selected><?php echo $category; ?></option>
                        <?php 
                       
                       fetchCategoriesToDropdown();
                        
                       ?>
                     
					</select>
				</div>
        </div>
        
        <div class="form-row">
        	<div class="col-md-6 col-sm-6 form-group">
        		<label for="inputEmail4">Display Picture</label> 
				<div class="choose_file">
						<span style=""><img src="images/User-Profile/upload.png" alt="">
							<input name="uploadPicture" type="file" id="uploadPicture">
							<p>Upload a Picture</p>
						</span>
					</div>
        	</div>
        	
        	<div class="col-md-6 col-sm-6 form-group">
        		<label for="inputEmail4">Upload Notes <sup>*</sup></label>
					<div class="choose_file">
						<span>
						
						<img src="images/images/upload-note.png" alt="">
							<input name="uploadFiles[]" type="file" id="uploadNote" multiple>
							<p>Upload your notes</p>
						</span>
					</div>
	</div>
        </div>
		
		<div class="form-row">
			<div class="form-group col-md-6 col-sm-6">
				<label for="inputEmail4">Type</label>
					<select name="notetype" id="type" class="form-control select">
						<option value="<?php echo $refid; ?>"><?php echo $notetype ?></option>
                        <?php fetchNoteTypes(); ?>
					</select>
					
				</div>
			
				<div class="form-group col-md-6 col-sm-6">
						<label for="inputEmail4">Number Of Pages</label>
					<input type="text" value="<?php echo $noofpages; ?>" class="form-control" id="noOfPages" name="noofpages" placeholder="Enter number of note pages">
				</div>
		</div>
		
	<div class="form-row">
		<div class="form-group col-md-12 col-sm-12">
		<label for="">Description <sup>*</sup></label>
			<textarea name="description" id="description" class="textarea form-control"><?php echo $desc; ?></textarea>
		</div>
	</div>
	</div>
	
	<div class="container">
			<div class="content-box">
				<h3>Institute Information</h3>
			</div>
	</div>
	
	<div class="container">
		<div class="form-row">
			<div class="form-group col-md-6 col-sm-6">
				<label for="inputEmail4">Country</label>
					<select name="country" id="country" class="form-control select">
						<option value="<?php echo $country_id; ?>" selected><?php echo $country;?></option>
                        <?php
                          fetchCountriesToDropdown();
                          ?>
					</select>
					
				</div>
			
				<div class="form-group col-md-6 col-sm-6">
						<label for="inputEmail4">Institute Name</label>
					<input type="text" value="<?php echo $university; ?>" name="institute" class="form-control" id="institute" placeholder="Enter your institute name">
				</div>
		</div>
	</div>
	
	<div class="container">
			<div class="content-box">
				<h3>Course Details</h3>
			</div>
	</div>
	
	<div class="container">
		<div class="form-row">
			<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Course Name</label>
					<input type="text" value="<?php echo $course; ?>" name="coursename" class="form-control" id="course" placeholder="Enter your course name">
					
				</div>
			
				<div class="form-group col-md-6 col-sm-6">
						<label for="inputEmail4">Course Code</label>
					<input type="text" name="coursecode" value="<?php echo $code; ?>" class="form-control" id="courseCode" placeholder="Enter your course code">
				</div>
				
				<div class="form-group col-md-6 col-sm-6">
						<label for="inputEmail4">Professor / Lecturer</label>
					<input type="text" name="lecturer" value="<?php echo $lecturer; ?>" class="form-control" id="lecturer" placeholder="Enter your professor name">
				</div>
		</div>
	</div>
	
	<div class="container">
			<div class="content-box">
				<h3>Selling Information</h3>
			</div>
	</div>
		
			<div class="container">
				<div class="form-row">
					<div class="form-group col-md-6 col-sm-6 col-12">
						<label for="inputEmail4">Sell For <sup>*</sup></label>
					<br>
					<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sellFor" id="free" value="5" <?php if ($radio == '5') {echo ' checked ';} else {echo '';} ?> onclick="javascript:FreeorPaid();">
  <label class="form-check-label" for="inlineRadio1">Free</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="sellFor" id="paid" value="4" <?php if ($radio == '4') {echo ' checked ';} else {echo '';} ?> onclick="javascript:FreeorPaid();">
  <label class="form-check-label" for="inlineRadio2">Paid</label>
</div>
				</div>
		<div class="form-group col-md-6 col-sm-6 col-12 note-preview">
			
				<label for="inputEmail4">Note Preview <sup>*</sup></label>
					<div class="choose_file">
						<span>
						<img src="images/User-Profile/upload.png" alt="">
							<input name="notepreview" type="file" id="notePreview">
							<p>Upload a file</p>
							<div id="np"></div>
						</span>
					</div>
		</div>
			<div class="form-group col-md-6 col-sm-6 col-12 sell-price">
				<label for="" id="sellPriceLabel">Sell Price <sup>*</sup></label>
				<input type="text" class="form-control" value="<?php echo $price; ?>" id="sellPrice" name="sellprice" value="0">
			</div>
			
				</div>
				<button class="btn submit-btn btn-sub" type="submit" name="submit">Save</button>
			<?php 
				if(isset($_REQUEST['id'])){
					echo "<button class='btn submit-btn' id='publish'  type='button' data-toggle='modal' data-target='#exampleModal'>Publish</button>";

				}
				else{
					?>
				<button class="btn submit-btn" id="publish" style="display:none;" type="button" data-toggle="modal" data-target="#exampleModal">Publish</button>
<?php } ?>

				</form>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure ?</h5>
        <br>
        <div id="waitfor" style="color:green"></div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
      Publishing this note will send note to administrator for review, once
administrator review and approve then this note will be published to
portal. Press yes to continue.
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" style="background-color:#6255a5;" onclick="javascript:publishNote();">Yes</button>  
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
				      
      </div>
    </div>
  </div>
</div>






<div id="comment" style="color:green"></div>
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
		
		
	
	
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>
<script>
    $(document).ready(function(){
	$(document).on('submit','#add-notes',function(e){
		$("#wait").html("Please Wait.....");
		e.preventDefault();  //add this line to prevent reload
                    var title= $("#title").val();
			
            var fd = new FormData();
            fd.append('file', document.getElementById("uploadPicture").files[0]);
            console.log(fd);
			
       
			$.ajax({
                        type: "POST",
                        url: "addnotes_process.php",
                        // data: "title=" + title+ "&category=" + category+ "&uploadPicture=" + uploadPicture+ "&uploadNote=" + uploadNote+ "&type=" + type+ "noOfPages=" + noOfPages+ "&description=" + description+ "&country=" + country+ "&institute=" + institute+ "&course=" + course+ "&courseCode=" + courseCode+ "&lecturer=" + lecturer+ "&sellfor=" + sellFor+ "&notePreview=" + notePreview+ "&sellPrice=" + sellPrice,
                       data: new FormData(this),
                       processData: false,
                        contentType: false,
                       enctype: 'multipart/form-data',
                        success: function(data) {
							$('#comment').html(data);
							
                           console.log(data);
						   if(data == "Note Added Successfully!! You can publish your note if you want." ){
						   $("#publish").removeAttr("style").show();
						   }
                        }
						
                    });
					

	
                
		});
	});

    function publishNote(){
        var title= $("#title").val();
        $("#waitfor").html("Please Wait.....");
        $.ajax({
                        type: "POST",
                        url: "publishNote.php",
                      
                       data: "title="+title,
                       
                        success: function(data) {
							console.log(data);
							$("#publish").hide();
							$('#add-notes').trigger("reset");
                            var redirect = "dashboard.php";
                            window.location.assign(redirect);
                                                }                     
                                           });
						
                
    }

</script>

<script type="text/javascript">

function FreeorPaid() {
    if (document.getElementById('paid').checked) {
		document.getElementById('sellPriceLabel').style.visibility = 'visible';
        document.getElementById('sellPrice').style.visibility = 'visible';
    } else {
		document.getElementById('sellPriceLabel').style.visibility = 'hidden';
        document.getElementById('sellPrice').style.visibility = 'hidden';
		document.getElementById('sellPrice').value = '0';
    }
}

</script>
<script>
var input = document.getElementById( 'uploadPicture' );
var infoArea = document.getElementById( 'up' );

var input1 = document.getElementById( 'notePreview' );
var infoArea1 = document.getElementById( 'np' );

input.addEventListener( 'change', showFileName );
input1.addEventListener( 'change', showFileName2 );

function showFileName( event ) {
  
  // the change event gives us the input it occurred in 
  var input = event.srcElement;
  
  // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  var fileName = input.files[0].name;
  
 // use fileName however fits your app best, i.e. add it into a div
 infoArea.textContent = 'File Name:' + fileName;

}

function showFileName2(event){
	 
var input1 = event.srcElement;

// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
var fileName1 = input1.files[0].name;

// use fileName however fits your app best, i.e. add it into a div
infoArea1.textContent = 'File Name:' + fileName1;
}



</script>








	</body>
</html>