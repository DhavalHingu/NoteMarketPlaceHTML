<?php
include 'includes/connect.php';
include 'includes/functions.php';
if(!isset($_POST['userIdentifier'])){
    session_start();
}
$seller_id = $_SESSION['userIdentifier'];

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($conn,"select COUNT(*) as total_records from `downloads`,`users`,`notecategories`,`user_profile`,`referencedata` where `downloads`.`Seller` = '$seller_id' AND `downloads`.`Downloader` = `users`.`id` AND `downloads`.`Note_category` = `notecategories`.`id` AND  `users`.`id` = `user_profile`.`user_id` AND `downloads`.`IsPaid` = `referencedata`.`id`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1


    $sql= mysqli_query($conn,"select downloads.id,downloads.note_id,downloads.Allowed_Download,downloads.Note_title,downloads.Purchased_price,downloads.Attachment_downloaded_date,notecategories.Name,users.Email_id,users.FirstName,user_profile.Phone_number,referencedata.Value from `downloads`,`users`,`notecategories`,`user_profile`,`referencedata` where `downloads`.`Seller` = '$seller_id' AND `downloads`.`Downloader` = `users`.`id` AND `downloads`.`Note_category` = `notecategories`.`id` AND  `users`.`id` = `user_profile`.`user_id` AND `downloads`.`IsPaid` = `referencedata`.`id` LIMIT $offset, $total_records_per_page");



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
  <title>Buyer Requests</title>
  <!--Google Font-->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  <!--Bootstrap CSS-->
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <!--Font Awesome-->
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
  <!--External CSS-->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="downloads dashboard">
  <?php
    include 'header.php';
  ?>
  <div class="container">
    <div class="heading-first">
      <div class="row">
        <div class="col-md-6 col-12">
          <h3>Buyer Requests</h3>
        </div>

        <div class="col-md-6 col-12 pull-right searching-div">

          <input type="text" id="tags" class="search-box" placeholder="Search Notes" id="searchdata">
          <button class="btn search-btn" id="search">Search</button>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="table-responsive">
    
    <table class="table" id="mytable">
        <thead>
          <tr class="">
            <th scope="col" class="table-column-header">sr no.</th>
            <th scope="col" class="table-column-header">note title</th>
            <th scope="col" class="table-column-header">Category</th>
            <th scope="col" class="table-column-header">buyer</th>
            <th scope="col" class="table-column-header">phone no</th>
            <th scope="col" class="table-column-header">sell type</th>
            <th scope="col" class="table-column-header">price</th>
            <th scope="col" class="table-column-header">downloaded date/time</th>
            <th></th>
          </tr>
        </thead>

    
    
    <?php
    $srno=1;
    if(mysqli_num_rows($sql) > 0){
        while($row=mysqli_fetch_array($sql)){
  

    ?>

            <tbody>
            <tr class="table-row">
              <td><?php echo $srno++; ?></td>
              <td> <a href="note-details.php?id=<?php echo $row['note_id']; ?>" class="
        table-link"><?php echo $row['Note_title']; ?> </a></td>
           
        
            <td><?php echo $row['Name'] ?></td>
              <td><?php echo $row['Email_id']; ?> </td>
              <td><?php echo $row['Phone_number']; ?></td>
              <td><?php echo $row['Value']; ?></td>
              <td><?php echo "$" . $row['Purchased_price'];?> </td>
              <td><?php echo $row['Attachment_downloaded_date']; ?></td>
              <td class="">
  
  
                <div class="table-dropdown-left">
                  <a href="#"><img src="images/images/eye.png" alt=""></a>
                  &nbsp;
                  <button type="button" class="btn" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/images/dots.png" alt="">
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <!-- Dropdown menu links -->

                    <?php
                      if($row['Allowed_Download'] == 0){
                        
                        echo "<a href='allow_downloads.php?id=".$row['id']."&name=".$row['FirstName']."&email=".$row['Email_id']."' class='dropdown-item'>"; echo "Allow Download</a>";
                      }
                      else{
                        echo "<a href='#' class='dropdown-item'>"; echo "Yes ! I Received.</a>";
                      }
                 
                    ?>
                    
  
                  </div>
                </div>
  
              </td>
            </tr>




        </tbody>
        <?php
        }
    }
    ?>
      </table>

      <ul class="pagination text-center pull-right">
      <li class="page-item active" aria-current="page" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a class='left' <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>><img src="images/search/left-arrow.png" alt=""></a>
	</li>
        <?php
        pagination($page_no,$previous_page,$total_no_of_pages,$second_last,$next_page);
        ?>
        <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a class='right' <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>><img src="images/search/right-arrow.png" alt=""></a>
	</li>
    </ul>
    </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--Bootstrap-->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>
  <!--Custom JS-->
  <script src="js/script.js"></script>
  <script>
$(document).ready(function(){
   
 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"search_buyer-request.php",
   method:"POST",
   data:{query:query},
   datatype:"json",
   success:function(data)
   {
   var html'';
   if(data.length > 0){
     for(var count=0; count<data.length ; count++){
      html += '<tr>';
      html += '<td>'+data[count].Title+'</td>';
      html += '<td>'+data[count].Category+'</td>';
      html += '<td>'+data[count].Buyer+'</td>';
      html += '<td>'+data[count].Phone+'</td>';
      html += '<td>'+data[count].Selltype+'</td>';
      html += '<td>'+data[count].Price+'</td>';
      html += '<td>'+data[count].Date+'</td>';

     }
   }
   else{
      html += '<tr><td colspan="8">No Data Found</td></tr>';
   }
 $('tbody').html(html);
   }
  });
 }
 
 $('#search').click(function(){
  var query =$('#tags').val();
  load_data(query);
 });
 
});
});
</script>
 

</body>

</html>