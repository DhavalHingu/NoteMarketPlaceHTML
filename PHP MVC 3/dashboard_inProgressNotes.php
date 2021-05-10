<?php
if(!isset($_SESSION)){
   session_start();
}
include 'includes/connect.php';
include 'includes/functions.php';
$seller_id = $_SESSION['userIdentifier'];

$srno = 1;

//count the records
  $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes`  where `seller_notes`.`seller_id` = '$seller_id' AND `seller_notes`.status = '6' OR `seller_notes`.status = '7' OR `seller_notes`.status = '8' ");
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
$query = mysqli_query($conn, "select `s`.`CreatedDate` , `s`.`Title` , `s`.`id` as note_id , `s`.`IsActive`,`n`.`Name` , `n`.`id` , `r`.`id` , `r`.`Value` from `seller_notes` s INNER join `notecategories` n on s.Category = n.id AND `s`.`seller_id` = '$seller_id' AND s.status != '9'  inner join `referencedata` r on s.status = r.id  AND `s`.`seller_id` = '$seller_id' AND s.status != '9' where `s`.`seller_id` = '$seller_id' AND s.`status` != '1' AND s.`status` != '2' AND s.`status` != '3' AND s.`status` != '4' AND s.`status` != '5' AND s.`status` != '9' AND s.`status` != '10' AND s.`status` != '11' AND `s`.`IsActive` = '1' LIMIT $start, $limit");
$output = '';
$output = '<table class="table table-sm table-xs" id="mytable1" >
<thead>
    <tr>
        <th scope="col" class="table-column-header" data-order="desc">Added Date</th>
        <th scope="col" class="table-column-header" data-order="desc">Title</th>
        <th scope="col" class="table-column-header" data-order="desc">Category</th>
        <th scope="col" class="table-column-header" data-order="desc">Status</th>
        <th scope="col" class="table-column-header">Actions</th>
    </tr>
</thead>
<tbody id="tbl_body">';
   
 



if($_POST['query'] != '')
{
  $query = mysqli_query($conn, "select `s`.`CreatedDate` , `s`.`Title` , `s`.`id` as note_id , `s`.`IsActive`,`n`.`Name` , `n`.`id` , `r`.`id` , `r`.`Value` from `seller_notes` s INNER join `notecategories` n on s.Category = n.id AND `s`.`seller_id` = '$seller_id' AND s.status != '9' inner join `referencedata` r on s.status = r.id AND `s`.`seller_id` = '$seller_id' AND s.status != '9' where `s`.`seller_id` = '$seller_id' AND s.`status` != '1' AND s.`status` != '2' AND s.`status` != '3' AND s.`status` != '4' AND s.`status` != '5' AND s.`status` != '9' AND s.`status` != '10' AND s.`status` != '11' AND `s`.`IsActive` = '1' AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select `s`.`CreatedDate` , `s`.`Title` , `s`.`id` as note_id , `s`.`IsActive`,`n`.`Name` , `n`.`id` , `r`.`id` , `r`.`Value` from `seller_notes` s INNER join `notecategories` n on s.Category = n.id AND `s`.`seller_id` = '$seller_id' AND s.status != '9' inner join `referencedata` r on s.status = r.id AND `s`.`seller_id` = '$seller_id' AND s.status != '9' where `s`.`seller_id` = '$seller_id' AND s.`status` != '1' AND s.`status` != '2' AND s.`status` != '3' AND s.`status` != '4' AND s.`status` != '5' AND s.`status` != '9' AND s.`status` != '10' AND s.`status` != '11' AND `s`.`IsActive` = '1' AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' ");
  $total_records = mysqli_num_rows($query1);
}

  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $noteid = $row['note_id'];
        $output .= '<tr class="table-row">
             
        <td>' . $row['CreatedDate'] . '</td>
        <td>' . $row['Title'] . '</td>
<td>' . $row['Name'] . '</td>

<td>' . $row['Value'] . '</td>';

if($row['Value'] == "Draft"){

$output .= '<td class="text-center"><a href="add-notes.php?id='.$noteid.'"><img src="images/images/edit.png" alt=""></a> &nbsp
    <a onclick="confirm("Are you sure you wants to delete ?")" class="delete" href="delete_notes.php?id='.$noteid.'"><img src="images/images/delete.png" alt=""></a>
     </td> ';
}
else{
    $output .= '<td class="text-center"><a href="note-details.php?id='.$noteid.'")><img src="images/images/eye.png" alt=""></a></td>';
}

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

// if (isset($_POST['query'])) {
//   $search = mysqli_real_escape_string($conn, $_POST["query"]);
//    $query = mysqli_query($conn, "select downloads.id,downloads.note_id,downloads.Allowed_Download,downloads.Note_title,downloads.Purchased_price,downloads.Attachment_downloaded_date,notecategories.Name,users.Email_id,users.FirstName,user_profile.Phone_number,referencedata.Value from `downloads` INNER JOIN users ON downloads.Seller = users.id AND downloads.Seller = '$seller_id' INNER JOIN notecategories ON notecategories.id = downloads.Note_category INNER JOIN user_profile ON user_profile.user_id = downloads.Seller INNER JOIN referencedata on referencedata.id = downloads.IsPaid WHERE downloads.Seller = '$seller_id' AND  `Note_title` LIKE '%$search%'  OR `Name` LIKE '%$search%' OR `Email_id` LIKE '%$search%'  OR `Phone_number` LIKE '%$search% '  OR `Name` LIKE '%$search%'  OR `Purchased_price` LIKE '%$search%'  OR `Attachment_downloaded_date` LIKE '%$search%' LIMIT $offset , $record");
//    // select downloads.id,downloads.note_id,downloads.Allowed_Download,downloads.Note_title,downloads.Purchased_price,downloads.Attachment_downloaded_date,notecategories.Name,users.Email_id,users.FirstName,user_profile.Phone_number,referencedata.Value from `downloads`,`users`,`notecategories`,`user_profile`,`referencedata` where `Note_title` LIKE '%".$search."%' OR `Name` LIKE '%".$search."%' AND `downloads`.`Seller` = '$seller_id' AND `downloads`.`Downloader` = `users`.`id` AND `downloads`.`Note_category` = `notecategories`.`id` AND  `users`.`id` = `user_profile`.`user_id` AND `downloads`.`IsPaid` = `referencedata`.`id`  
   
//    $output = '';
//    if (mysqli_num_rows($query) > 0) {
//        while ($row = mysqli_fetch_array($query)) {
//         $output .= '<tr class="table-row">
//         <td>' . $srno++ . '</td>        
//         <td>' . $row['Note_title'] . '</td>
//         <td>' . $row['Name'] . '</td>
// <td>' . $row['Email_id'] . '</td>
// <td>' . $row['Phone_number'] . '</td>
// <td>' . $row['Value'] . '</td>
// <td>' . $row['Purchased_price'] . '</td>
// <td>' . $row['Attachment_downloaded_date'] . '</td>
// <td class="">
//  <div class="table-dropdown-left">
// <a href="#"><img src="images/images/eye.png" alt=""></a> &nbsp;
// <button type="button" class="btn" data-toggle="dropdown" aria-expanded="false">
// <img src="images/images/dots.png" alt="">
// </button>
// <div class="dropdown-menu dropdown-menu-right">' . 
// $pq = ($row['Allowed_Download'] == 0) ? "<a href='allow_downloads.php?id=".$row['id']."&name=".$row['FirstName']."&email=".$row['Email_id']."' class='dropdown-item'>Allow Download</a>" :  "<a href='#' class='dropdown-item'> Yes ! I Received.</a>"
// ; ''. '</div>
// </div>
// </td>
// </tr>';
//        }
//    } 
//    else {
   
//        $output = '
//  <tr>
//    <td colspan="9"> No Data found. </td>   
//  </tr>';
//    }
//    echo $output;
// }

// else{
  
//   $query = mysqli_query($conn, "select downloads.id,downloads.note_id,downloads.Allowed_Download,downloads.Note_title,downloads.Purchased_price,downloads.Attachment_downloaded_date,notecategories.Name,users.Email_id,users.FirstName,user_profile.Phone_number,referencedata.Value from `downloads`,`users`,`notecategories`,`user_profile`,`referencedata` where `downloads`.`Seller` = '$seller_id' AND `downloads`.`Downloader` = `users`.`id` AND `downloads`.`Note_category` = `notecategories`.`id` AND  `users`.`id` = `user_profile`.`user_id` AND `downloads`.`IsPaid` = `referencedata`.`id` LIMIT $offset , $record ");

  
//   $output = '';
//   if (mysqli_num_rows($query) > 0) {
//       while ($row = mysqli_fetch_array($query)) {
        
//           $output .= '<tr class="table-row">
//           <td>' . $srno++ . '</td>        
//           <td>' . $row['Note_title'] . '</td>
//           <td>' . $row['Name'] . '</td>
//   <td>' . $row['Email_id'] . '</td>
//   <td>' . $row['Phone_number'] . '</td>
//   <td>' . $row['Value'] . '</td>
//   <td>' . $row['Purchased_price'] . '</td>
//   <td>' . $row['Attachment_downloaded_date'] . '</td>
//   <td class="">
//    <div class="table-dropdown-left">
//   <a href="#"><img src="images/images/eye.png" alt=""></a> &nbsp;
//   <button type="button" class="btn" data-toggle="dropdown" aria-expanded="false">
//   <img src="images/images/dots.png" alt="">
//   </button>
//   <div class="dropdown-menu dropdown-menu-right">' . 
//   $pq = ($row['Allowed_Download'] == 0) ? "<a href='allow_downloads.php?id=".$row['id']."&name=".$row['FirstName']."&email=".$row['Email_id']."' class='dropdown-item'>Allow Download</a>" :  "<a href='#' class='dropdown-item'> Yes ! I Received.</a>"
//   ; ''. '</div>
// </div>
// </td>
// </tr>';
      
// }
     
// }
// else
// {
 
//   $output = '
// <tr>
// <td colspan="9"> No Data found. </td>   
// </tr>';
// }
// echo $output;
// }
?>
