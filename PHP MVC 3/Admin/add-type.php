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
    $sql = mysqli_query($conn,"insert into note_types(`Name`,`Description`,`CreatedDate`,`CreatedBy`) values('$cat','$desc','$current_date','$user')");
    if($sql){
        echo "<script>
alert('Type added Successfully..');
window.location.href='add-type.php';
</script>";
    }
}

if(isset($_POST['update'])){
$id = $_REQUEST['id'];
    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $user = $_SESSION['userIdentifier'];
    $current_date = Date('Y-m-d H:i:s');
    $sql = mysqli_query($conn,"update note_types set Name = '$cat' , Description = '$desc' , ModifiedDate = '$current_date' , ModifiedBy = '$user' where id = '$id'");
    if($sql){
        echo "<script>
alert('Type Update Successfully..');
window.location.href='add-type.php?id=$id';
</script>";
    }
}

if(isset($_POST['deletecategory'])){
    $catid = $_POST['catid'];
    $sql = mysqli_query($conn,"update note_types set IsActive = 0 where id = '$catid'");
    if($sql){
        echo "<script>
alert('Type Deleted Successfully..');
window.location.href='manage-type.php';
</script>";
    }
}

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $sql=mysqli_query($conn,"select * from note_types where id = '$id'");
    while($row=mysqli_fetch_array($sql)){
        $category = $row['Name'];
        $description = $row['Description'];
    }
    
}
else{
    $category="";
    $description="";
}




?>





<?php include 'header.php'; ?>
<body class="add-notes dashboard">

<!--Navigation Bar Ends	-->

	    
	    <div class="container">
		<div class="heading-first">
			<h3>Add Type</h3>
		</div>
		<form method="POST" action="">
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Type Name <sup>*</sup></label>
					<input type="text" class="form-control" value="<?php echo $category; ?>" name="category" id="inputEmail4" placeholder="Enter your Type name">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 col-sm-6">
					<label for="inputEmail4">Description <sup>*</sup></label>
					<textarea name="desc" id="" cols="30" rows="10" class="form-control"><?php echo $description; ?></textarea>
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