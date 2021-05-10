<?php
include '../includes/connect.php';
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userIdentifier'])){
    header('location:../login.php');
}
if(isset($_POST['submit'])){
    $supportemail = $_POST['supportEmail'];
    $supportphone = $_POST['supportPhone'];
    $email=$_POST['email'];
    $fb=$_POST['fb'];
    $tw = $_POST['tw'];
    $li = $_POST['li'];

    
    $target_dir = "../images/";
    $target_dir_origin = "images/";
    //for note
    $file = $_FILES["uploadImage"]["name"];
    if($file != NULL){
    $target_file = $target_dir . basename($file);
    $target_file_origin = $target_dir_origin . basename($file);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    }
    //for seller
    
    $file1 = $_FILES["uploadNote"]["name"];
    if($file1 != null){
    $target_file_1 = $target_dir . basename($file1);
    $target_file_1_origin = $target_dir_origin . basename($file1);
    $uploadOk = 1;
    $imageFileType_1 = strtolower(pathinfo($target_file_1,PATHINFO_EXTENSION));
    
}

if($file != "" || $file1 != ""){
    // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType !="" || $imageFileType_1 != "jpg" && $imageFileType_1 != "png" && $imageFileType_1 != "jpeg" && $imageFileType_1 !=""  ) {
    // echo "<script> alert('Sorry, only JPG, JPEG & PNG files are allowed'); </script>";

  $uploadOk = 0;
}


if(!empty($supportemail) || $supportemail == ""){
    $updatesupportemail = mysqli_query($conn,"update system_configurations set Value = '$supportemail' where `Key` = 'support_email' ");    
}  
else{
    mysqli_error($conn);
}
if(!empty($supportphone)){
    $updatesupportphone = mysqli_query($conn,"update system_configurations set Value = '$supportphone' where `Key` = 'support_phoneNo' ");    
}
else{
    mysqli_error($conn);
}
if(!empty($supportemail)){
    $updateeventemail = mysqli_query($conn,"update system_configurations set Value = '$email' where `Key` = 'emailforevents' ");    
} 
else{
    mysqli_error($conn);
} 
if(!empty($fb)){
    $updatefburl = mysqli_query($conn,"update system_configurations set Value = '$fb' where `Key` = 'facebook_url' ");    
} 
else{
    mysqli_error($conn);
} 
if(!empty($tw)){
    $updatetwitterurl = mysqli_query($conn,"update system_configurations set Value = '$tw' where `Key` = 'twitter_url' ");    
} 
else{
    mysqli_error($conn);
} 
if(!empty($li)){
    $updatelinkedinurl = mysqli_query($conn,"update system_configurations set Value = '$li' where `Key` = 'linkedin_url' ");    
} 
else{
    mysqli_error($conn);
} 
if($file != ""){
$updateDefaultNoteImage = mysqli_query($conn,"update system_configurations set Value = '$target_file_origin' where `Key` = 'notedefaultimage'");
}
else{
    mysqli_error($conn);
}
if($file1 != ""){
    $updateDefaultSellerImage = mysqli_query($conn,"update system_configurations set Value = '$target_file_1_origin' where `Key` = 'sellerdefaultimage'");
    }
    else{
        mysqli_error($conn);
    }






}
else{
        if(!empty($supportemail) || $supportemail == ""){
            $updatesupportemail = mysqli_query($conn,"update system_configurations set Value = '$supportemail' where `Key` = 'support_email' ");    
        }  
        else{
            mysqli_error($conn);
        }
        if(!empty($supportphone)){
            $updatesupportphone = mysqli_query($conn,"update system_configurations set Value = '$supportphone' where `Key` = 'support_phoneNo' ");    
        }
        else{
            mysqli_error($conn);
        }
        if(!empty($supportemail)){
            $updateeventemail = mysqli_query($conn,"update system_configurations set Value = '$email' where `Key` = 'emailforevents' ");    
        } 
        else{
            mysqli_error($conn);
        } 
        if(!empty($fb)){
            $updatefburl = mysqli_query($conn,"update system_configurations set Value = '$fb' where `Key` = 'facebook_url' ");    
        } 
        else{
            mysqli_error($conn);
        } 
        if(!empty($tw)){
            $updatetwitterurl = mysqli_query($conn,"update system_configurations set Value = '$tw' where `Key` = 'twitter_url' ");    
        } 
        else{
            mysqli_error($conn);
        } 
        if(!empty($li)){
            $updatelinkedinurl = mysqli_query($conn,"update system_configurations set Value = '$li' where `Key` = 'linkedin_url' ");    
        } 
        else{
            mysqli_error($conn);
        } 
   
   
   
   // Check file size
if ($_FILES["uploadImage"]["size"] > 500000) {
    
    $uploadOk = 0;
  }
  if ($_FILES["uploadNote"]["size"] > 500000) {

    $uploadOk = 0;
  }
  
  
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file_1)) {
    //   echo "The file ". htmlspecialchars( basename( $_FILES["uploadImage"]["name"])). " has been uploaded.";
      unset($_SESSION['imagepath']);
    }
   
    
    else {
      echo "Sorry, there was an error uploading your file.";
    }
    if (move_uploaded_file($_FILES["uploadNote"]["tmp_name"], $target_file)) {
        // echo "The file ". htmlspecialchars( basename( $_FILES["uploadNote"]["name"])). " has been uploaded.";
        unset($_SESSION['imagepath']);
      }
      else {
        
      }
  }
   
   
   
   
   
   
   
    





}

}


$selectSupportEmail = mysqli_query($conn,"select Value from system_configurations where `Key` = 'support_email'");
while($row1=mysqli_fetch_array($selectSupportEmail)){
    if($row1['Value'] == ""){
        $supportEmail = "";
    }
    $supportEmail = $row1['Value'];
}

$selectSupportPhone = mysqli_query($conn,"select Value from system_configurations where `Key` = 'support_phoneNo'");
while($row2=mysqli_fetch_array($selectSupportPhone)){
    if($row2['Value'] == ""){
        $supportPhone1 = "";
    }
    $supportPhone1 = $row2['Value'];
}

$selectEmail = mysqli_query($conn,"select Value from system_configurations where `Key` = 'emailforevents'");
while($row3=mysqli_fetch_array($selectEmail)){
    if($row3['Value'] == ""){
        $email1= "";
    }
    $email1 = $row3['Value'];
}

$selectFbUrl = mysqli_query($conn,"select Value from system_configurations where `Key` = 'facebook_url'");
while($row4=mysqli_fetch_array($selectFbUrl)){
    if($row4['Value'] == ""){
        $fb1 = "";
    }
    $fb1 = $row4['Value'];
}

$selectTwUrl = mysqli_query($conn,"select Value from system_configurations where `Key` = 'twitter_url'");
while($row5=mysqli_fetch_array($selectTwUrl)){
    if($row5['Value'] == ""){
        $tw1 = "";
    }
    $tw1 = $row5['Value'];
}

$selectLiUrl = mysqli_query($conn,"select Value from system_configurations where `Key` = 'linkedin_url'");
while($row6=mysqli_fetch_array($selectLiUrl)){
    if($row6['Value'] == ""){
        $li1 = "";
    }
    $li1 = $row6['Value'];
}





?>


<?php include 'header.php'; ?>

<body class="dashboard add-notes">
<!--Navigation Bar Ends	-->
<div class="container">
		<div class="heading-first">
			<h3>Manage System Configuration</h3>
		</div>
		<form method="POST" action="" enctype= "multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Support Email Address <sup>*</sup></label>
					<input type="email" class="form-control" value="<?php echo $supportEmail; ?>" name="supportEmail" id="inputEmail4" placeholder="Enter your support email address">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Support Phone No <sup>*</sup></label>
					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $supportPhone1; ?>" name="supportPhone" placeholder="Enter your phone no">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Email address(for varius events system will send notifications to these users) <sup>*</sup></label>
					<input type="email" class="form-control" value="<?php echo $email1; ?>" id="inputEmail4" name="email" placeholder="Enter your email address">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Facebook url <sup>*</sup></label>
					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $fb1; ?>" name="fb" placeholder="Enter your facebook url">
				</div>
				
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">twitter url <sup>*</sup></label>
					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $tw1; ?>" name="tw" placeholder="Enter your twitter url">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">linkedin url <sup>*</sup></label>
					<input type="text" class="form-control" id="inputEmail4" value="<?php echo $li1; ?>" name="li" placeholder="Enter your linkedin url">
				</div>
			</div>
				<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Default image for notes(if seller not upload)</label>
					<div class="choose_file">
						<span><img src="images/User-Profile/upload.png" alt="">
							<input type="file" id="uploadNote" name="uploadNote">
							<p>Upload a Picture</p>
						</span>
					</div>
				</div>
			</div>
			<div class="form-row">
					<div class="form-group col-md-6">
					<label for="inputEmail4">Default Profile Picture(if seller do not upload)</label>
					<div class="choose_file">
						<span><img src="images/User-Profile/upload.png" alt="">
							<input type="file" name="uploadImage" id="uploadImage">
							<p>Upload a Picture</p>
						</span>
					</div>
				</div>
			</div>
			

<button type="Submit" class="btn admin-btn" name="submit">SUBMIT</button>
	</form>
	</div>
	









<?php include 'footer.php'; ?>




</body>
</html>