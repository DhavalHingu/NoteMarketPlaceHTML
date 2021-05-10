<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userIdentifier'])){
	header('location:../login.php');
}
include '../includes/connect.php';
$current_date = Date('Y-m-d H:i:s');
?>
<?php

if(isset($_POST['noteApprove'])){
 $noteid = $_POST['noteid'];
 $user = $_SESSION['userIdentifier'];

 $sql = mysqli_query($conn,"update seller_notes set status = '9' , ModifiedDate = '$current_date' , ModifiedBy = '$user' where id = '$noteid'");
 if($sql){
     header('location:notes-under-review.php?success');
 }
 else{
    header('location:notes-under-review.php?error');
 }
}


if(isset($_POST['noteReject'])){
    $noteid = $_POST['noteid'];
   
    $comment=$_POST['comment'];
    $user = $_SESSION['userIdentifier'];
    $current_date = Date('Y-m-d H:i:s');
    $sql = mysqli_query($conn,"update seller_notes set status = '10' , ActionedBy = '$user' , AdminRemarks = '$comment' ,  IsActive = '0' , ModifiedDate = '$current_date' , ModifiedBy='$user' where id = '$noteid' ");
    if($sql){
        header("location:notes-under-review.php?success");
    }
    else{
        header("location:notes-under-review.php?'".mysqli_error($conn)."'");
    }
   }


   if(isset($_POST['noteReview'])){
    $noteid = $_POST['noteid'];
    $user = $_SESSION['userIdentifier'];
   
    $sql = mysqli_query($conn,"update seller_notes set status = '8' , ModifiedDate = '$current_date' , ModifiedBy = '$user' where id = '$noteid'");
    if($sql){
        header('location:notes-under-review.php?success');
    }
    else{
       header('location:notes-under-review.php?error');
    }
   }


   






?>

<?php include 'header.php'; ?>
<body class="dashboard downloads">

	<div class="container">
		<div class="heading-first">
	<div class="row">
	<div class="col-md-12">
		<h3>Rejected Notes</h3>
		</div>
			</div>
			
			<div class="row">
			<div class="col-md-6 pull-left under-review-select">
				<label for="">Seller</label><br>
					<select name="" id="seller">
						<option value="">Select Seller</option>
                        <?php
                        $sql = mysqli_query($conn,"select u.FirstName , s.seller_id from users u inner join seller_notes s on u.id = s.seller_id group by s.seller_id");
                        while($row=mysqli_fetch_array($sql)){
                            echo "<option value='".$row['FirstName']."'>  ".$row['FirstName']." </option>";
                        }

?>
					</select>

			</div>
			<div class="col-md-6 col-12 pull-right searching-div under-review-search">
			<br>
		<input type="text" class="search-box" placeholder="Search Notes" id="tags">
		<button class="btn search-btn" id="search">Search</button>
		</div>
		</div>
			</div>
	</div>
    <div class="container">
		<div class="table-responsive">
			
		</div>
	</div>
	<br><br>
	<?php include 'footer.php'; ?>
    <script>
    $(document).ready(function(){

load_data(1);

function load_data(page,query ='',query2='')
{
  $.ajax({
    url:"rejected-notes_process.php",
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
      load_data(page, query,"","");
    });


    $(document).on('click', '#search', function(){
      var query = $('#tags').val();
      console.log(query);
      load_data(1, query,"");
    });

	$("#seller").change(function(){
      var query2 = $('#seller').val();
      console.log(query2);
      load_data(1, "",query2);
    });

  });     
       
</script>


	</body>
</html>