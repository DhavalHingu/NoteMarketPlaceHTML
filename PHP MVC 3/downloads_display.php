<?php
if(!isset($_SESSION)){
   session_start();
}
include 'includes/connect.php';




$seller_id = $_SESSION['userIdentifier'];



if(isset($_POST['spamNote'])){
$note = $_POST['note'];
$current_date = Date('Y-m-d H:i:s');

$select_downloadId = mysqli_query($conn,"select * from `downloads` where `Downloader` = '$userId' AND `note_id` = '$noteid' ");
while($row=mysqli_fetch_array($select_downloadId)){
  $downloadId = $row['id'];
}

$sql = mysqli_query($conn,"insert into seller_notes_reported_issues(`note_id`,`reported_id`,`download_id`,`CreatedDate`,`CreatedBy`) values('$noteid','$seller_id','$downloadId','$current_date','$userId')");

if($sql){

header("location:downloads.php?success");
}


}









$srno = 1;

//count the records
  $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `downloads`,`users`,`notecategories`,`referencedata` where `downloads`.`Downloader` = '$seller_id' AND `downloads`.`Downloader` = `users`.`id` AND `downloads`.`Note_category` = `notecategories`.`id` AND `downloads`.`IsPaid` = `referencedata`.`id` AND `downloads`.`Downloader` = $seller_id");
	$total_records1 = mysqli_fetch_array($result_count);
	$total_records = $total_records1['total_records'];
  

$limit = '5';
$page = 1;


if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}
$search = $_POST['query'];
//if page not set then displays all the data



$query = mysqli_query($conn, "select * from downloads d left join notecategories n on d.Note_category = n.id AND `d`.`Downloader` = '$seller_id' left join referencedata r on d.IsPaid = r.id AND `d`.`Downloader` = '$seller_id' left join users u on d.Downloader = u.id AND `d`.`Downloader` = '$seller_id' where `d`.`Downloader` = '$seller_id' AND Allowed_Download = '1' LIMIT $start , $limit ");
$output = '';
$output = ' <table class="table" id="mytable">
<thead>
  <tr class="">
    <th scope="col" class="table-column-header">sr no.</th>
    <th scope="col" class="table-column-header">note title</th>
    <th scope="col" class="table-column-header">Category</th>
    <th scope="col" class="table-column-header">buyer</th>
    <th scope="col" class="table-column-header">sell type</th>
    <th scope="col" class="table-column-header">price</th>
    <th scope="col" class="table-column-header">downloaded date/time</th>
    <th></th>
  </tr>
</thead>

<tbody id="tbl_body">';
   
 



if($_POST['query'] != '')
{
  $query = mysqli_query($conn, "select * from downloads d left join notecategories n on d.Note_category = n.id AND `d`.`Downloader` = '$seller_id' left join referencedata r on d.IsPaid = r.id AND `d`.`Downloader` = '$seller_id' left join users u on d.Downloader = u.id AND `d`.`Downloader` = '$seller_id' where `d`.`Downloader` = '$seller_id' AND Allowed_Download = '1' AND `d`.`Note_title` LIKE '%$search%' OR `n`.`Name` LIKE '%$search%' OR `u`.`Email_id` LIKE '%$search%' OR `r`.`Value` LIKE '%$search%' OR `d`.`Purchased_price` LIKE '%$search%' OR `d`.`CreatedDate` LIKE '%$search%' LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select * from downloads d left join notecategories n on d.Note_category = n.id AND `d`.`Downloader` = '$seller_id' left join referencedata r on d.IsPaid = r.id AND `d`.`Downloader` = '$seller_id' left join users u on d.Downloader = u.id AND `d`.`Downloader` = '$seller_id' where `d`.`Downloader` = '$seller_id' AND Allowed_Download = '1' AND `d`.`Note_title` LIKE '%$search%' OR `n`.`Name` LIKE '%$search%' OR `u`.`Email_id` LIKE '%$search%' OR `r`.`Value` LIKE '%$search%' OR `d`.`Purchased_price` LIKE '%$search%' OR `d`.`CreatedDate` LIKE '%$search%' ");
  $total_records = mysqli_num_rows($query1);
}

  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
      
        $output .= '<tr class="table-row">
        <td>' . $srno++ . '</td>        
        <td><a href="note-details.php?id='.$row['note_id'].'" class="table-link">'. $row['Note_title'] . '</td>
        <td>' . $row['Name'] . '</td>
<td>' . $row['Email_id'] . '</td>
<td>' . $row['Value']. '</td>
<td>' . $row['Purchased_price'] . '</td>
<td>' . $row['CreatedDate'] . '</td>
<td class="">
<div class="table-dropdown-left">
<a href="note-details.php?id='.$row['note_id'].'"><img src="images/images/eye.png" alt=""></a>
 &nbsp;
<button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
<img src="images/images/dots.png" alt="">
</button>
<div class="dropdown-menu dropdown-menu-right">
<!-- Dropdown menu links -->
<a href="downloadNote.php?id='.$row['note_id'].'" class="dropdown-item">Download Note</a>
<a href=javascript:" class="dropdown-item openmodal" data-toggle="modal" data-target="#exampleModal" data-id="'.$row['note_id'].'">Add Reviews/Feedback</a>
<a href="#" class="dropdown-item openmodal2" data-toggle="modal" data-target="#exampleModalConfirm" data-id="'.$row['note_id'].'">Report as Inappropriate</a>
</div>
</div>
</td>
</tr>';

}
  
}
else
{
$output .= '
<tr>
<td colspan="8"> No Data found. </td>   
</tr>';
}


$output .= '</tbody>
           
</table>
<ul class="pagination text-center pull-right">'; 
$total_links = ceil($total_records/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 9)
{
  if($page < 10)
  {
    for($count = 1; $count <= 10; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 10;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}
if(!$total_records==0){
for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="active"  style=" pointer-events: none;">
      <a class="link" href="#">'.$page_array[$count].' </a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="link left" href="javascript:void(0)" data-page_number="'.$previous_id.'"><img src="images/search/left-arrow.png" alt=""></a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled" style=" pointer-events: none;">
        <a class="link left disabled" href="#"><img src="images/search/left-arrow.png" alt=""></a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
      <li class="page-item disabled"  style=" pointer-events: none;">
        <a class="link right disabled" href="#"><img src="images/search/right-arrow.png" alt=""></a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="link right" href="javascript:void(0)" data-page_number="'.$next_id.'"><img src="images/search/right-arrow.png" alt=""></a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled"  style=" pointer-events: none;">
          <a class="link disabled" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class=""><a class="link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}
}

$output .= $previous_link . $page_link . $next_link;


  $output .= '</ul>';

echo $output;

?>












<?php


?>

<!-- add review popup model	-->
<!-- Button trigger modal -->
<!-- inappropriate spam modal -->
<div class="modal fade thanks-popup" id="exampleModalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					
				</div>
<div class="modal-body">
Are you sure you want to mark this report as spam, you cannot update it later?
      </div>
      <div class="modal-footer">
		 <form method="POST" action="">
     <input type="hidden" id="abcde" name="note"> 
     <button type="submit" class="btn btn-primary" style="background-color:#6255a5;" name="spamNote" id="downloadNote">Yes</button>  
      
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							</form>
      </div>
</div>
		</div>
	</div>



<script>

  $('.openmodal').click(function(){
    
    var id = $(this).data('id');      
      console.log("data: "+ id);

    $('#abcd').val(id);  
        } );


        $('.openmodal2').click(function(){
    
    var id = $(this).data('id');      
      console.log("data: "+ id);

    $('#abcde').val(id);  
        } );
 
</script>
<script>
 $(function(){

$('table#mytable').tableSortable();

});
</script>