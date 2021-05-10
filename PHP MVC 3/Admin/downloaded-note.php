<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['userIdentifier'])){
    header('location:../login.php');
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";
$mail = new PHPMailer(true);
include '../includes/connect.php';
include '../includes/functions.php';
if(isset($_POST['submitRemarks'])){
	
	unpublishNoteByAdmin();
}

?>

<?php include 'header.php'; ?>
	
<body class="dashboard dw">

	<div class="container">
		<div class="heading-first">
	<div class="row">
	<div class="col-md-12">
		<h3>Downloaded Notes</h3>
		</div>
			</div>
		
			<div class="row">
			<div class="col-md-2 col-6 pull-left under-review-select" style="width:4px;">
				<label for="" style="color: dimgray">Note</label><br>
					<select name="" id="note">
						<option value="">Select Note</option>
                        <?php
                        $sql = mysqli_query($conn,"select * from seller_notes where status = '9' ");
                        while($row=mysqli_fetch_array($sql)){
                            echo "<option value='".$row['Title']."'>  ".$row['Title']." </option>";
                        }

?>
					</select>
				</div>
				<div class="col-md-2 col-6 pull-left under-review-select under-review-select-2 mb-2">
					<label for="" style="color: dimgray">Seller</label><br>
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
			
				<div class="col-md-2 col-6 pull-left under-review-select">
					<label for="" style="color: dimgray">Buyer</label><br>
					<select name="" id="buyer">
						<option value="">Select Buyer</option>
                        <?php
                        $sql = mysqli_query($conn,"select u.FirstName , d.Downloader from users u inner join downloads d on u.id = d.Downloader group by d.Downloader");
                        while($row=mysqli_fetch_array($sql)){
                            echo "<option value='".$row['FirstName']."'>  ".$row['FirstName']." </option>";
                        }

?>
					</select>
				</div>


			
			<div class="col-md-6 col-12 pull-right searching-div mb-4">
			
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

function load_data(page,query ='',query2='',query3='',query4='')
{
  $.ajax({
    url:"downloaded-note_process.php",
    method:"POST",
    data:{page:page,query:query,query2:query2,query3:query3,query4:query4},
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

    $("#buyer").change(function(){
      var query3 = $('#buyer').val();
      console.log(query3);
      load_data(1, "","",query3);
    });

    $("#note").change(function(){
      var query4 = $('#note').val();
      console.log(query4);
      load_data(1, "","","",query4);
    });

  });     
       
</script>
	</body>
</html>