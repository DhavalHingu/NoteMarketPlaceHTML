<?php
if(!isset($_SESSION)){
  session_start();
}

if(!isset($_SESSION['userIdentifier'])){
	header('location:login.php');
}
 include 'header.php'; ?>

<body class="dashboard downloads">
<?php


?>
	<div class="container">
		<div class="heading-first">
	<div class="row">
	<div class="col-md-6 col-12">
		<h3>My Rejected Notes</h3>
		</div>
		
			<div class="col-md-6 pull-right searching-div col-12">
			
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
	
	<br><br><br><br><br><br><br>
	<?php include 'footer.php'; ?>
	

	
	
  <script>

$(document).ready(function(){

load_data(1);

function load_data(page,query ='')
{
  $.ajax({
    url:"rejectedNotes_display.php",
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