<?php
include '../includes/connect.php';
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['userIdentifier'])){
    header('location:../login.php');
}

if(isset($_POST['deactivate'])){
    $userid = $_POST['userid'];

    $query = mysqli_query($conn,"update users set IsActive = 0 where id = $userid");
    if($query){
        header('Location:members.php');
    }
}

?>


<?php include 'header.php'; ?>

<body class="dashboard downloads">
	
	<div class="container">
		<div class="heading-first">
	<div class="row">
	<div class="col-md-6">
		<h3>Members</h3>
		</div>
		
			<div class="col-md-6 pull-right searching-div">
			
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
		
	<?php include 'footer.php'; ?>
    <script>
         $(document).ready(function(){

load_data(1);

function load_data(page,query ='')
{
  $.ajax({
    url:"member_process.php",
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
	</body>
</html>