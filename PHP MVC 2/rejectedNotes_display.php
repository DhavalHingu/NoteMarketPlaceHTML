<?php
if(!isset($_SESSION)){
   session_start();
}
include 'includes/connect.php';




$seller_id = $_SESSION['userIdentifier'];


$srno = 1;

//count the records
  $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes` where `seller_id` = '$seller_id' AND `status` = '10' ");
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





$query = mysqli_query($conn, "select * from `seller_notes` s inner join notecategories n on s.Category = n.id AND `seller_id` = '$seller_id'  where `seller_id` = '$seller_id'  AND `status` = '10'  LIMIT $start , $limit ");
$output = '';
$output .= ' <table class="table" id="mytable">
<thead>
  <tr class="">
    <th scope="col" class="table-column-header">sr no.</th>
    <th scope="col" class="table-column-header">note title</th>
    <th scope="col" class="table-column-header">Category</th>
    <th scope="col" class="table-column-header">Remarks</th>
    <th scope="col" class="table-column-header">Clone</th>
    <th></th>
  </tr>
</thead>

<tbody id="tbl_body">';
   
 



if($_POST['query'] != '')
{
  $query = mysqli_query($conn, "select * from `seller_notes` s inner join notecategories n on s.Category = n.id AND `seller_id` = '$seller_id'  where `seller_id` = '$seller_id'  AND `status` = '10'  LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select * from seller_notes s inner join notecategories n on s.Category = n.id AND `seller_id` = '$seller_id' where `s`.`seller_id` = '$seller_id'  AND `s`.`Title` LIKE '%$search%' OR `n`.`Name` LIKE '%$search%' OR `s`.`AdminRemarks` LIKE '%$search%' AND `status` = '10'");
  $total_records = mysqli_num_rows($query1);
}

  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
      
        $output .= '<tr class="table-row">
        <td>' . $srno++ . '</td>        
        <td><a href="note-details.php?id='.$row['id'].'" class="table-link">'. $row['Title'] . '</td>
        <td>' . $row['Name'] . '</td>
<td>' . $row['AdminRemarks'] . '</td>
<td><a href="#" class="table-link">Clone</a></td>
<td class="">
<div class="table-dropdown-left">
<button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
<img src="images/images/dots.png" alt="">
</button>
<div class="dropdown-menu dropdown-menu-right">
<!-- Dropdown menu links -->
<a href="downloadNote.php?id='.$row['id'].'" class="dropdown-item">Download Note</a>
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
<td colspan="6"> No Data found. </td>   
</tr>';
}

$output .= '</tbody>
           
</table>';
$output .='
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
<script src="https://unpkg.com/jquery-tablesortable"></script>
<script>
 $(function(){

$('table#mytable').tableSortable();

});
</script>













