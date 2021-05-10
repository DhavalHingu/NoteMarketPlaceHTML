<?php
include '../includes/connect.php';
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userIdentifier'])){
    header('location:../login.php');
}
if(isset($_POST['submit'])){

    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $user = $_SESSION['userIdentifier'];
    $current_date = Date('Y-m-d H:i:s');
    $sql = mysqli_query($conn,"insert into countries(`Name`,`Country_code`,`CreatedDate`,`CreatedBy`) values('$cat','$desc','$current_date','$user')");
    if($sql){
        echo "<script>
alert('Country added Successfully..');
window.location.href='add-country.php';
</script>";
    }
}

if(isset($_POST['update'])){
$id = $_REQUEST['id'];
    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $user = $_SESSION['userIdentifier'];
    $current_date = Date('Y-m-d H:i:s');
    $sql = mysqli_query($conn,"update countries set Name = '$cat' , Country_code = '$desc' , ModifiedDate = '$current_date' , ModifiedBy = '$user' where id = '$id'");
    if($sql){
        echo "<script>
alert('Country Update Successfully..');
window.location.href='add-country.php?id=$id';
</script>";
    }
}

if(isset($_POST['deletecategory'])){
    $catid = $_POST['catid'];
    $sql = mysqli_query($conn,"update countries set IsActive = 0 where id = '$catid'");
    if($sql){
        echo "<script>
alert('Country Deleted Successfully..');
window.location.href='manage-country.php';
</script>";
    }
}

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql=mysqli_query($conn,"select * from countries where id = '$id'");
    while($row=mysqli_fetch_array($sql)){
        $category = $row['Name'];
        $description = $row['Country_code'];
    }
    
}
else{
    $category="";
    $description="";
}




?>






<body class="add-notes dashboard">
	<?php include 'header.php'; ?>
<!--Navigation Bar Ends	-->

	    
	    <div class="container">
		<div class="heading-first">
			<h3>Add Country</h3>
		</div>
		<form method="POST" action="">
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Country Name <sup>*</sup></label>
					<input type="text" class="form-control" value="<?php echo $category; ?>" name="category" id="inputEmail4" placeholder="Enter your country name">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
                <label for="inputEmail4">Country Code <sup>*</sup></label>
					<input type="text" class="form-control" value="<?php echo $description; ?>" name="desc" id="inputEmail4" placeholder="Enter your country code">
				</div>
			</div>
			
		<?php
           if(isset($_REQUEST['id'])){
?>
<button type="Submit" class="btn admin-btn" name="update">UPDATE</button>
<?php
           }
           else{
?>
<button type="Submit" class="btn admin-btn" name="submit">SUBMIT</button>
  <?php         }	?>


	</form>
	</div>
	<?php include 'footer.php'; ?>
	</body>
</html>