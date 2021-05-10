
            
            
 <?php

include '../includes/connect.php';

if(!isset($_SESSION)){
    session_start();
}

$srno = 1;

//count the records
//   $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes`  where `seller_notes`.status != '9'");
// 	$total_records1 = mysqli_fetch_array($result_count);
// 	$total_records = $total_records1['total_records'];
  

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
$query = mysqli_query($conn, "select n.id,n.Name,n.Description,n.CreatedDate,u.FirstName,u.LastName,n.IsActive from notecategories n inner join users u on n.CreatedBy = u.id where  `u`.`IsActive` = '1' LIMIT $start, $limit");
 // $publishedNotes = mysqli_query($conn, "select count(s.seller_id) as published from seller_notes s inner join users u on s.seller_id = u.id AND s.status = 9 group by s.seller_id LIMIT $start, $limit");
// $downloadedNotes = mysqli_query($conn, "select count(*) downloaded from downloads d inner join users u on d.Downloader = u.id where d.Attachment_downloaded = '1' group by d.Downloader  LIMIT $start, $limit");
$total_records = mysqli_num_rows($query);
$output = '';
$output = '<table class="table table-sm table-xs" id="mytable" >
<thead>
    <tr>
    <th scope="col" class="table-column-header">Sr No.</th>
    <th scope="col" class="table-column-header">category</th>
    <th scope="col" class="table-column-header">description</th>
    <th scope="col" class="table-column-header">date-added</th>
    <th scope="col" class="table-column-header">added by</th>
    <th scope="col" class="table-column-header">active</th>
    <th scope="col" class="table-column-header">action</th>
    </tr>
</thead>
<tbody id="tbl_body">';
   
 



if($_POST['query'] != '')
{
    $query = mysqli_query($conn, "select n.id,n.Name,n.Description,n.CreatedDate,u.FirstName,u.LastName from notecategories n inner join users u on n.CreatedBy = u.id where  `u`.`IsActive` = '1' AND u.Firstname LIKE '%$search%' or n.Name LIKE '%$search%' or n.Description LIKE '%$search%' or n.CreatedDate LIKE '%$search%' LIMIT $start, $limit");
 
  $query1 = mysqli_query($conn, "select n.id,n.Name,n.Description,n.CreatedDate,u.FirstName,u.LastName from notecategories n inner join users u on n.CreatedBy = u.id where  `u`.`IsActive` = '1' AND u.Firstname LIKE '%$search%' or n.Name LIKE '%$search%' or n.Description LIKE '%$search%' or n.CreatedDate LIKE '%$search%'");
  $total_records = mysqli_num_rows($query1);
}



  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        $catid = $row['id'];
        if($row['IsActive'] == 1){
            $active = "Yes";
        }
        else{
            $active ="No";
        }

        $output .= '<tr class="table-row">
        <td>' . $srno++ . '</td>             
        <td>' . $row['Name'] . '</td>
        <td>' . $row['Description'] . '</td>
        <td>' . $row['CreatedDate'] . '</td>
        <td>' . $row['FirstName'] . " " . $row['LastName'] . '</td>
        <td>' . $active . '</td>
        <td> 
		<a href="add-category.php?id='.$catid.'"><img src="images/images/edit.png" alt=""></a>
    &nbsp;
    <a href="#"  data-toggle="modal" data-target="#exampleModal" onClick="showModal('.$catid.')"><img src="images/images/delete.png" alt=""></a>	
     
    </div>
    
		</td>

        
' ;

       
      
$output .= "</tr>"; 
       

    }
}
else
{
$output .= '
<tr>
<td colspan="7"> No Record found. </td>   
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
                   <h4>Are you sure you want to make this Category Inactive ?</h4>
                 </div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="../images/images/close-icon.svg" alt="">
            </button>
          </div>
          <form action="add-category.php" method="POST">
          <div class="modal-body">
          
           <div class="container text-right">
           
           
      </div>
            
            <input type="hidden" id="hiddenid1" name="catid">     
            <button class="btn" style="background:#6255a5; color:white" type="submit" name="deletecategory">Yes</button>
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
      var id1 = id;
    console.log(id1);
   
    $("#hiddenid1").val(id1);
    $("#hiddenid2").val(id1);
    $("#hiddenid3").val(id1);
   
}
</script>