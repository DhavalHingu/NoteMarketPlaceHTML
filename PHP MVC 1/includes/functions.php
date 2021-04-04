<?php
if(!isset($_SESSION)) 
{ 
session_start(); 
} 
include 'connect.php';





function userLoginRedirect()
{
    //1=>registered Admin user
    //2=>registered Normal user
    //3=>registerd Super Admin
    global $conn;
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = mysqli_query($conn, "select * from users where `Email_id` = '{$email}' AND `Password` = '{$password}'");
    if (!$sql) {
        die(mysqli_error($conn));
    }
   
    while ($row = mysqli_fetch_array($sql)) {
        $user_role = $row['role_id'];
        $user_email = $row['Email_id'];
        $user_pass = $row['Password'];
        $emailverify = $row['IsEmailVerified'];
        $user_id = $row['id'];
        $user_name = $row['FirstName'];
        
    }
    
    $_SESSION['userIdentifier'] = $user_id;
    $_SESSION['userName'] = $user_name;
    
   
    if ($email != $user_email && $password != $user_pass) {
    
        header("Location:login.php?msg=error");
     
    }
    
    elseif($_SESSION['RefUrl'] != ""){
        $url = $_SESSION['RefUrl'];
        echo $url;
        header("location:$url");
         }
    elseif ($email == $user_email && $password == $user_pass && $user_role == '1') {
        header("Location:Admin/dashboard.html");
    } elseif ($email == $user_email && $password == $user_pass && $user_role == '2' && $emailverify == '0') {
        if(isset($_SESSION['userIdentifier'])){
        header("Location:user-profile.php");
        }
    } elseif ($email == $user_email && $password == $user_pass && $user_role == '2' && $emailverify == '1'){
        header("Location:search.php");
    }
    elseif ($email == $user_email && $password == $user_pass && $user_role == '3'){
        header("Location:Admin/dashboard.html");
    }
     else {
        header("Location:login.php?error");
    }
}








function signUp(){     
global $conn;
$first_name = $_POST['fname'];
$last_name = $_POST['lname'];
$email = $_POST['email'];
$password=$_POST['password'];
   
if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
    echo "2";
}
else{
$checkEmailExists = mysqli_query($conn,"select * from  `users` where `Email_id` = '$email' ");
if(mysqli_num_rows($checkEmailExists)>0){
    echo "0";
}
else{

$sql = mysqli_query($conn,"insert into users(role_id,FirstName,LastName,Email_id,Password) values('2','$first_name','$last_name','$email','$password')");

if(!$sql){ 
    die(mysqli_error($conn)); 
}	
else{
    $title = "Note Marketplace - Email Verification";
    $body = "Hello {$first_name}.<br><br>Thank you for signing up with us. please click on below link to verify your email address and to do login.<br><br> <a href='localhost/notesmarketplace/email-verification.php?email={$email}'>Click Here..</a>   <br><br><br> Regards,<br>Notes Marketplace
    ";
sendMail($email,$title,$body);
}
echo "1";
}
}
}







function emailVerify(){
    //email verify bit value
    //Null=>registered user(without email verification)
    //0=>registered user(email verification done but user profile not updated, so redirected on user profile page)
    //1=>registered user(email verification and user profile insertion done, so redirected on search page)
    global $conn;
    $email = $_REQUEST['email'];
    $sql = mysqli_query($conn,"update users set `IsEmailVerified` = 0 where `Email_id` = '$email' ");
    if(!$sql){
        die(mysqli_error($conn));
    }
    else{
        header('Location:user-profile.html');
    }
}







function forgotPassword(){
    global $conn;
    $email = $_POST['email'];
$email = mysqli_real_escape_string($conn, $email);
$sql = mysqli_query($conn,"select * from `users` where `Email_id`= '{$email}'");

if(mysqli_num_rows($sql) > 0){
while($row=mysqli_fetch_array($sql)){
  $useremail = $row['Email_id'];
}   

//random password generate
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@';
$randomPassword = substr(str_shuffle($permitted_chars), 0, 10);


  $updatePassword = mysqli_query($conn,"update `users` set `Password` = '$randomPassword' where `Email_id` = '$useremail'");
 $title = "New Temporary Password has been created for you";
  $body = "Hello,<br><br><br>We have generated a new password for you.<br>
  Password: {$randomPassword}. <br><br>Regards,<br>Notes Marketplace
  ";
  sendMail($useremail,$title,$body);  
  }
  else{
    $data = array("success" => 0);
    echo json_encode($data);
  }
}








function userprofileInsertorUpdate(){
    global $conn;
    $dob = $_POST['dob'];
	$gender = $_POST['gender'];
    $email = $_POST['email'];
	$mobile_code = $_POST['mobcode'];
    $mobile_number=$_POST['mob_no'];

    $target_dir = "images/";
    $file = $_FILES["filetoupload"]["name"];
    $target_file = $target_dir . basename($file);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zipcode'];
    $country=$_POST['country'];
    $university=$_POST['university'];
    $college=$_POST['college'];
    $userid = $_SESSION['userIdentifier'];

    $sql = mysqli_query($conn,"select * from `user_profile` where `user_id` = '$userid' ");

    if(mysqli_num_rows($sql)>0){
        //update data
        if($file != ""){
        $updateData = mysqli_query($conn,"update `user_profile` set `DOB` = '$dob', `gender` = '$gender', `SecondaryEmailAddress` = '$email', `CountryCode` = '$mobile_code', `Phone_number`= '$mobile_number', `Profile_picture` = '$target_file', `Addressline_1` = '$address1', `Addressline_2` = '$address2', `City` = '$city', `State` = '$state', `Zipcode` = '$zipcode', `Country` = '$country', `University` = '$university', `College` = '$college' where `user_id` = '$userid';  ");
        }
        else{
            $updateData = mysqli_query($conn,"update `user_profile` set `DOB` = '$dob', `gender` = '$gender', `SecondaryEmailAddress` = '$email', `CountryCode` = '$mobile_code', `Phone_number`= '$mobile_number', `Addressline_1` = '$address1', `Addressline_2` = '$address2', `City` = '$city', `State` = '$state', `Zipcode` = '$zipcode', `Country` = '$country', `University` = '$university', `College` = '$college' where `user_id` = '$userid';  "); 
        }
        
        if($updateData){
          
            header('location:search.php');
        }
        else{
            die(mysqli_error($conn));
        }
    }
    else{
        //insert data
        if($gender == 'Male'){
            $gender = 1;
        }
        else{
            $gender = 2;
        }
        $insertData = mysqli_query($conn,"insert into user_profile(`user_id`,`DOB`,`gender`,`SecondaryEmailAddress`,`CountryCode`,`Phone_number`,`Profile_picture`,`Addressline_1`,`Addressline_2`,`City`,`State`,`Zipcode`,`Country`,`University`,`College`) values('$userid','$dob','$gender','$email','$mobile_code','$mobile_number','$target_file','$address1','$address2','$city','$state','$zipcode','$country','$university','$college')");
        if($insertData){
            header('location:search.php');
        }
        else{
            die(mysqli_error($conn));            
        }

        $sql1 = mysqli_query($conn,"update users set `IsEmailVerified` = 1 where `id` = '$userid' ");
        if(!$sql1){
        die(mysqli_error($conn));
        }
    }
// Check if image file is a actual image or fake image
   $check = getimagesize($_FILES["filetoupload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }

    // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Check file size
  if ($_FILES["filetoupload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["filetoupload"]["name"])). " has been uploaded.";
      unset($_SESSION['imagepath']);
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}







function fetchCategoriesToDropdown(){
    global $conn;
    $fetchCategory = mysqli_query($conn,"select * from `notecategories`");
    while($row=mysqli_fetch_array($fetchCategory)){
        $category = $row['Name'];
        $id = $row['id'];
        echo "<option value='$id'>  $category </option>";
    } 
}






function fetchCountriesToDropdown(){
    global $conn;
    $fetchCountry = mysqli_query($conn,"select * from `countries`");
    while($row=mysqli_fetch_array($fetchCountry)){
        $country = $row['Name'];
        $id = $row['id'];
        echo "<option value='$id'>  $country </option>";
    } 
}







function fetchCountriesCodeToDropdown(){
    global $conn;
    $fetchCountry = mysqli_query($conn,"select * from `countries`");
    while($row=mysqli_fetch_array($fetchCountry)){
        $country = $row['Country_code'];
        $id = $row['id'];
        echo "<option value='$id'>  $country </option>";
    } 
}







function fetchNoteTypes(){
    global $conn;
    $fetchCountry = mysqli_query($conn,"select * from `note_types`");
    while($row=mysqli_fetch_array($fetchCountry)){
        $country = $row['Name'];
        $id = $row['id'];
        echo "<option value='$id'>  $country </option>";
    } 
}














function createNotes(){
    global $conn;
    $title = $_POST['title'];
$category = $_POST['category'];
$note_type = $_POST['notetype'];
$noOfPages = $_POST['noofpages'];
$description = $_POST['description'];
$country = $_POST['country'];
$institute = $_POST['institute'];
$course = $_POST['coursename'];
$code = $_POST['coursecode'];
$lecturer = $_POST['lecturer'];
$sellfor = $_POST['sellFor'];
$sellprice = $_POST['sellprice'];
$user_id = $_SESSION['userIdentifier'];
$target_dir_of_displayPicture = "images/";
$target_dir_of_note = "notes/";
$current_date = Date('Y-m-d H:i:s');
$file1 = $_FILES["uploadPicture"]["name"];
$file3 = $_FILES["notepreview"]["name"];

$target_file_1 = $target_dir_of_displayPicture .  basename($_FILES["uploadPicture"]["name"]);

$target_file_3 = $target_dir_of_note .  basename($_FILES["notepreview"]["name"]);



$sql = mysqli_query($conn,"insert into `seller_notes`(`seller_id`,`status`,`Title`,`Category`,`Display_picture`,`Note_type`,`Number_of_pages`,`Description`,`University_name`,`Country`,`Course`,`Course_code`,`Professor`,`IsPaid`,`Selling_price`,`NotesPreview`,`CreatedDate`,`CreatedBy`) values('$user_id','6','$title','$category','$target_file_1','$note_type','$noOfPages','$description','$institute','$country','$course','$code','$lecturer','$sellfor','$sellprice','$target_file_3','$current_date','$user_id') ");
if($sql){

}
else{
    $data = mysqli_error($conn);
    echo $data;
}


$uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file_1,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["uploadPicture"]["tmp_name"]);
if($check !== false) {
  $uploadOk = 1;
} else {

  $uploadOk = 0;
}
// Check if file already exists
if (file_exists($target_file_1)) {

$uploadOk = 0;
}
// Check file size
if ($_FILES["uploadPicture"]["size"] > 500000) {

$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

} else {
if (move_uploaded_file($_FILES["uploadPicture"]["tmp_name"], $target_file_1)) {
} else {
}
}

$uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file_3,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["notepreview"]["tmp_name"]);
if($check !== false) {
  //echo "File is an image - " . $check["mime"] . ".";
  $uploadOk = 1;
} else {
  //echo "File is not an image.";
  $uploadOk = 0;
}
// Check if file already exists
if (file_exists($target_file_3)) {
//echo "Sorry, file already exists.";
$uploadOk = 0;
}
// Check file size
if ($_FILES["notepreview"]["size"] > 500000) {
//echo "Sorry, your file is too large.";
$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {

} else {
if (move_uploaded_file($_FILES["notepreview"]["tmp_name"], $target_file_3)) {
//$data =  "The file ". htmlspecialchars( basename( $_FILES["notepreview"]["name"])). " has been uploaded.";
  //  echo $data;
} else {
  //  $data = "Sorry, there was an error uploading your file."; 
//  echo $data;
}
}

$fetchData = mysqli_query($conn,"select * from `seller_notes` order by `id` asc");
if(mysqli_num_rows($fetchData)>0){
    while($row1=mysqli_fetch_array($fetchData)){
        $noteId = $row1['id'];
    }
   
    $count=0;
    $gett = count($_FILES["uploadFiles"]["name"]);
        for($j=0; $j < $gett; $j++)
        { //loop the uploaded file array
          $filen = $_FILES["uploadFiles"]['name']["$j"]; //file name
          $path = 'notes/'.$filen; //generate the destination path
          $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
          if($imageFileType != "pdf") {
          $data = "Note file must be in PDF format.";
          echo $data;
          }
          else{
          if(move_uploaded_file($_FILES["uploadFiles"]['tmp_name']["$j"],$path)) 
       {
          //upload the file
          $attach = mysqli_query($conn,"insert into `seller_notes_attachments`(`note_id`,`File_name`,`File_path`,`CreatedDate`,`CreatedBy`) values('$noteId','$filen','$path','$current_date','$user_id')");      
           //Success message
           $data = "Note Added Successfully!! You can publish your note if you want.";
           echo $data;
          }
         }
        }
    }
}






function deleteNote(){
  global $conn;
  $noteid = $_REQUEST['id'];
  $sql = mysqli_query($conn,"update `seller_notes` set `IsActive` = '0' where `id` = '$noteid' ");
    if($sql){
        header('location:dashboard.php');
    }
    else{
        echo mysqli_error($conn);
    }
  
}








function publishNote(){
    global $conn;
    $title = $_POST['title'];
$user_id = $_SESSION['userIdentifier'];

$sql = mysqli_query($conn,"select * from `seller_notes` where `Title` = '$title' AND `seller_id` = '$user_id' order by `id` asc");
if(mysqli_num_rows($sql)>0){
    while($row=mysqli_fetch_array($sql)){
        $noteId = $row['id']; 
    }
}

$publish = mysqli_query($conn,"update `seller_notes` set `status` = '7' where `id` = '$noteId' ");
if($publish){
    echo "success";
    $useremail = "techwork.dhaval@gmail.com";  
   $userName = $_SESSION['userName'];
   
   $subject = "{$userName}. sent his note for review";
   $body = "Hello Admins, <br><br> We want to inform you that, {$userName} sent his note
   {$title} for review. Please look at the notes and take required actions. <br><br> Regards,
   <br>Notes Marketplace";
  
  sendMail($useremail,$subject,$body);  
}
else{
  echo mysqli_error($conn);
  
}
}





//THIS FUNCTION IS USED FOR CHECK IN THE PAGE OF NOTE DETAILES WHERE USER LOGGED IN OR NOT
function userLoginorNot(){
    global $conn;
    $_SESSION['RefUrl'] = $_POST['referURL'];
    if(!isset($_SESSION['userIdentifier'])){
        header("Location:login.php");
    }
    else{
        $url = $_SESSION['RefUrl'];
        // header("loaction:$url");
        echo $url;
    }

}






function paidNoteDownloadRequest(){
    global $conn;
    $noteId = $_POST['id'];
$user = $_SESSION['userIdentifier'];
$userName = $_SESSION['userName'];
$sql = mysqli_query($conn,"select * from `seller_notes` where `id` = '$noteId'");

while($row=mysqli_fetch_array($sql)){
    $seller = $row['seller_id'];
    $ispaid = $row['IsPaid'];
    $price = $row['Selling_price'];
    $title = $row['Title'];
    $category = $row['Category'];

}


$SellerName = mysqli_query($conn,"Select * from `users` where `id` = '$seller'");
while($fetch = mysqli_fetch_array($SellerName)){
    $seller_name = $fetch['FirstName'];
    $seller_email = $fetch['Email_id'];
}


$fetchAttachment = mysqli_query($conn,"select * from `seller_notes_attachments` where `note_id` = '$noteId'");
while($row1=mysqli_fetch_array($fetchAttachment)){
    $path = $row1['File_path'];
}


$checkIfAlreadyDownloaded = mysqli_query($conn,"select * from `downloads` where `Downloader` = '$user' AND `note_id` = '$noteId'");

if(mysqli_num_rows($checkIfAlreadyDownloaded) <= 0){


        
    $insertDatatoDownloads = mysqli_query($conn,"insert into `downloads`(`note_id`,`Seller`,`Downloader`,`Attachment_path`,`IsPaid`,`Purchased_price`,`Note_title`,`Note_category`,`CreatedBy`) Values('$noteId','$seller','$user','$path','$ispaid','$price','$title','$category','$user') ");
    if($insertDatatoDownloads){
    $data = 1;
            
            $subject = "{$userName} wants to purchase your notes";
            $body = "Hello {$seller_name},<br><br><br>
            We would like to inform you that, {$userName} wants to purchase your notes. Please see
            Buyer Requests tab and allow download access to Buyer if you have received the payment from
            him. <br><br>
            Regards,<br>
            Notes Marketplace";
            sendMail($seller_email,$subject,$body);
            }
           
        
        }
   

else{
    $data = "Note is already Purchased!";
    echo $data;

}
}




function freeNoteDownloadRequestAndDoApprove(){
    global $conn;
    $noteId = $_POST['id'];

$noteId = $_POST['id'];
$user = $_SESSION['userIdentifier'];
$userName = $_SESSION['userName'];
$sql = mysqli_query($conn,"select * from `seller_notes` where `id` = '$noteId'");

while($row=mysqli_fetch_array($sql)){
    $seller = $row['seller_id'];
    $ispaid = $row['IsPaid'];
    $price = $row['Selling_price'];
    $title = $row['Title'];
    $category = $row['Category'];

}


$SellerName = mysqli_query($conn,"Select * from `users` where `id` = '$seller'");
while($fetch = mysqli_fetch_array($SellerName)){
    $seller_name = $fetch['FirstName'];
    $seller_email = $fetch['Email_id'];
}


$fetchAttachment = mysqli_query($conn,"select * from `seller_notes_attachments` where `note_id` = '$noteId'");
while($row1=mysqli_fetch_array($fetchAttachment)){
    $path = $row1['File_path'];
}



$checkIfAlreadyDownloaded = mysqli_query($conn,"select * from `downloads` where `Downloader` = '$user' AND `note_id` = '$noteId'");

if(mysqli_num_rows($checkIfAlreadyDownloaded) <= 0){
    $insertfreeNotetoDownloads = mysqli_query($conn,"insert into `downloads`(`note_id`,`Seller`,`Downloader`,`Allowed_Download`,`Attachment_path`,`IsPaid`,`Purchased_price`,`Note_title`,`Note_category`,`CreatedBy`) Values('$noteId','$seller','$user','1','$path','$ispaid','$price','$title','$category','$user') ");
        if($insertfreeNotetoDownloads){
            echo "1";
        }
}
else{
    
    echo "Note is Already Purchased";
}

}





function pagination($page_no,$previous_page,$total_no_of_pages,$second_last,$next_page){
    global $conn;
    
   
       
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a class='link'>$counter</a></li>";	
				}else{
           echo "<li><a class='link' href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a class='link'>$counter</a></li>";	
				}else{
           echo "<li><a class='link' href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a class='link'>...</a></li>";
		echo "<li><a class='link' href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a class='link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a class='link' href='?page_no=1'>1</a></li>";
		echo "<li><a class='link' href='?page_no=2'>2</a></li>";
        echo "<li><a class='link'>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a class='link'>$counter</a></li>";	
				}else{
           echo "<li><a class='link' href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a class='link'>...</a></li>";
	   echo "<li><a class='link' href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a class='link' href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a class='link' href='?page_no=1'>1</a></li>";
		echo "<li><a class='link' href='?page_no=2'>2</a></li>";
        echo "<li><a class='link'>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a class='link'>$counter</a></li>";	
				}else{
           echo "<li><a class='link' href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}

   
  
}




//global Mail function used for sending mail of relevant files. 
function sendMail($email_recipient,$subject,$body){
    global $mail;
   // $mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "dhaval7030@gmail.com";                 
$mail->Password = "9054085445";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;                                   
$mail->SMTPDebug = false;
$mail->From = "dhaval7030@gmail.com";
$mail->FromName = "Notes Marketplace";

$mail->addAddress($email_recipient,"Notes Marketplace");

$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = "This is the plain text version of the email content";

try {
    $sendMail = $mail->send();
   echo 1;
 
       
} catch (Exception $e) {
    echo 0;
}
}

?>
