<?php
if(!isset($_SESSION)){
   session_start();
}
include 'includes/connect.php';
include 'includes/functions.php';
$seller_id = $_SESSION['userIdentifier'];

$srno = 1;

//count the records
  $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes`  where `seller_notes`.`seller_id` = '$seller_id' AND `seller_notes`.status = '9'");
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
$query = mysqli_query($conn, "select `s`.`CreatedDate`,s.Selling_price, `s`.`Title` , `s`.`id` as note_id , `s`.`IsActive`,`n`.`Name` , `n`.`id` , `r`.`id` , `r`.`Value` from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.IsPaid = r.id where `s`.`seller_id` = '$seller_id' AND `status` = '9' AND `s`.`IsActive` = '1' LIMIT $start, $limit");
$output = '';
$output = '<table class="table table-sm table-xs" id="mytable" >
<thead>
    <tr>
        <th scope="col" class="table-column-header">Added Date</th>
        <th scope="col" class="table-column-header">Title</th>
        <th scope="col" class="table-column-header">Category</th>
        <th scope="col" class="table-column-header">Sell Type</th>
        <th scope="col" class="table-column-header">Price</th>
    </tr>
</thead>
<tbody id="tbl_body">';
   
 



if($_POST['query'] != '')
{
  $query = mysqli_query($conn, "select `s`.`CreatedDate`,s.Selling_price, `s`.`Title` , `s`.`id` as note_id , `s`.`IsActive`,`n`.`Name` , `n`.`id` , `r`.`id` , `r`.`Value` from `seller_notes` s INNER join `notecategories` n on s.Category = n.id AND s.status = '9' AND s.seller_id = '$seller_id' inner join `referencedata` r on s.IsPaid = r.id AND s.status = '9' AND s.seller_id = '$seller_id' where `s`.`seller_id` = '$seller_id' AND `status` = '9' AND `s`.`IsActive` = '1' AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' OR s.Selling_price LIKE '%$search%' LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select `s`.`CreatedDate`,s.Selling_price, `s`.`Title` , `s`.`id` as note_id , `s`.`IsActive`,`n`.`Name` , `n`.`id` , `r`.`id` , `r`.`Value` from `seller_notes` s INNER join `notecategories` n on s.Category = n.id AND s.status = '9' AND s.seller_id = '$seller_id' inner join `referencedata` r on s.IsPaid = r.id AND s.status = '9' AND s.seller_id = '$seller_id' where `s`.`seller_id` = '$seller_id' AND `status` = '9' AND `s`.`IsActive` = '1' AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' OR s.Selling_price LIKE '%$search%' ");
  $total_records = mysqli_num_rows($query1);
}

  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $noteid = $row['note_id'];
        $output .= '<tr class="table-row">
             
        <td>' . $row['CreatedDate'] . '</td>
        <td>' . $row['Title'] . '</td>
<td>' . $row['Name'] . '</td>

<td>' . $row['Value'] . '</td>
<td>' ."$". $row['Selling_price'] . '</td>';


$output .= "</tr>";
    
}
   
}
else
{
$output .= '
<tr>
<td colspan="5"> No Data found. </td>   
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
<script>
 $(function(){

$('table#mytable').tableSortable();

});
</script>
<script>
 $(function(){

$('table#mytable1').tableSortable();

});
</script>

