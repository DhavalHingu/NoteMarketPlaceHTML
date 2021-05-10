
            
            
            <?php

include '../includes/connect.php';
include '../includes/functions.php';


$srno = 1;

//count the records
  $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes`  where `seller_notes`.status = '9'");
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
$query = mysqli_query($conn, "select * from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.IsPaid = r.id INNER JOIN downloads d on s.id = d.note_id INNER JOIN seller_notes_attachments sa ON s.id = sa.note_id inner join users u on s.seller_id = u.id where `status` = '9' AND `s`.`IsActive` = '1' group by d.note_id LIMIT $start, $limit");
$output = '';
$output = '<table class="table table-sm table-xs" id="mytable" >
<thead>
    <tr>
    <th scope="col" class="table-column-header">Sr No.</th>
    <th scope="col" class="table-column-header">Title</th>
    <th scope="col" class="table-column-header">Category</th>
    <th scope="col" class="table-column-header">Attachment Size</th>
    <th scope="col" class="table-column-header">Sell Type</th>
    <th scope="col" class="table-column-header">Price</th>
    <th scope="col" class="table-column-header">Publisher</th>
    <th scope="col" class="table-column-header">published date</th>
    <th scope="col" class="table-column-header">No.of Downloads</th>
    <th scope="col" class="table-column-header"></th>
    </tr>
</thead>
<tbody id="tbl_body">';
   
 



if($_POST['query'] != '')
{
  $query = mysqli_query($conn, "select * from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.IsPaid = r.id INNER JOIN downloads d on s.id = d.note_id INNER JOIN seller_notes_attachments sa ON s.id = sa.note_id inner join users u on s.seller_id = u.id where `status` = '9' AND `s`.`IsActive` = '1' AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' OR s.Selling_price LIKE '%$search%' OR u.FirstName LIKE '%$search%'  group by d.note_id  LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select * from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.IsPaid = r.id INNER JOIN downloads d on s.id = d.note_id INNER JOIN seller_notes_attachments sa ON s.id = sa.note_id inner join users u on s.seller_id = u.id where `status` = '9' AND `s`.`IsActive` = '1' group by d.note_id  AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' OR s.Selling_price LIKE '%$search%' OR u.FirstName LIKE '%$search%' ");
  $total_records = mysqli_num_rows($query1);
}

if($_POST['query2'] != '')
{
  $search1 = $_POST['query2'];
  $query = mysqli_query($conn, "select * from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.IsPaid = r.id INNER JOIN downloads d on s.id = d.note_id INNER JOIN seller_notes_attachments sa ON s.id = sa.note_id inner join users u on s.seller_id = u.id where `status` = '9' AND `s`.`IsActive` = '1' AND month(s.Published_date) = '$search1'  group by d.note_id  LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select * from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.IsPaid = r.id INNER JOIN downloads d on s.id = d.note_id INNER JOIN seller_notes_attachments sa ON s.id = sa.note_id inner join users u on s.seller_id = u.id where `status` = '9' AND `s`.`IsActive` = '1'  AND month(s.Published_date) = '$search1' group by d.note_id  ");
  $total_records = mysqli_num_rows($query1);
}


  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $filepath = $row['File_path'];
        $getFileSize = filesize("../$filepath");
        $noteid = $row['note_id'];
      
        $totalDownload = mysqli_query($conn,"select count(*) as total_downloaded from downloads where note_id = '$noteid' and Attachment_downloaded = '1'");
        while($row1=mysqli_fetch_array($totalDownload)){
          $modalname = "exampleModal".$srno;
        $output .= '<tr class="table-row">
             
        <td>' . $srno++ . '</td>
        <td id="title_'.$noteid.'">' . $row['Title'] . '</td>
        <td>' . $row['Name'] . '</td>
        <td>' . $getFileSize ." kb". '</td>
        <td>' . $row['Value'] . '</td>
        <td>' . $row['Selling_price'] . '</td>
        <td>' . $row['FirstName'] . '</td>
        <td>' . $row['Published_date'] . '</td>
        <td>' . $row1['total_downloaded'] . '</td>
        <td class="text-center"> 
        <div class="table-dropdown-left">
        <button type="button" class="btn three-dots" data-toggle="dropdown" aria-expanded="false">
          <img src="images/images/dots.png" alt="">
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <!-- Dropdown menu links -->
          <a href="../downloadNote.php?id='.$noteid.'" class="dropdown-item">Download Note</a>
          <a href="note-details.php?id='.$noteid.'" class="dropdown-item">View More Details</a>
          <a data-target="#exampleModal"  onClick="showModal('.$noteid.')" data-toggle="modal" href="#" class="dropdown-item">Unpublished</a>
        </div>
      </div>

' ;
       
      
$output .= "</tr>"; 




}
}
}
else
{
$output .= '
<tr>
<td colspan="10"> No Record found. </td>   
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <div class="container">
                 <div class="content-box">
                   <h3 id="title"></h3>
                 </div>
          </div>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="../images/images/close-icon.svg" alt="">
            </button>
          </div>
          <div class="modal-body">
           <div class="container">
           
         
      </div>
      <form action="" class="text-left-nodal" method="POST">
             
               <div class="container">
                 <label for="" class="comment">Remarks <sup>*</sup></label>
                <input type="hidden" id="hiddenid" name="id">
                <textarea class="form-control" id="message-text" name="comment"></textarea>
                  <br> 
                 <button class="btn" style="background:#6255a5; color:white" type="submit" name="submitRemarks">Unpublish</button>
             </form>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
              
            
          </div>
        
        </div>
      </div>
    </div>



<script>
function showModal(id)
{
    // setting the values of clicked item in the bootstrap Modal
    $("#title").text($("#title_"+id).text());
    var id1 = id;
    console.log(id1);
    $("#hiddenid").val(id1);
   
}
</script>