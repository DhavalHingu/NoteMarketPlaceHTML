
            
            
 <?php

include '../includes/connect.php';
include '../includes/functions.php';


$srno = 1;

//count the records
  $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes`  where `seller_notes`.status = '10'");
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
$query = mysqli_query($conn, "select s.id as note, s.Title , s.CreatedDate , s.status , n.Name , u.FirstName , u.LastName,u.id as us,us1.id as admin,s.ModifiedDate,us1.FirstName as admin_fname,us1.Lastname as admin_lname,s.AdminRemarks,r.Value from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.status = r.id inner join users u on s.seller_id = u.id inner join users us1 on s.ActionedBy = us1.id where `status` = '10' AND `s`.`IsActive` = '1' LIMIT $start, $limit");
$output = '';
$output = '<table class="table table-sm table-xs" id="mytable" >
<thead>
    <tr>
    <th scope="col" class="table-column-header">Sr No.</th>
    <th scope="col" class="table-column-header">Note Title</th>
    <th scope="col" class="table-column-header">Category</th>
    <th scope="col" class="table-column-header">seller</th>
    <th scope="col" class="table-column-header">date Edited</th>
    <th scope="col" class="table-column-header">rejected by</th>
    <th scope="col" class="table-column-header">remark</th>
    <th scope="col" class="table-column-header"></th>
    </tr>
</thead>
<tbody id="tbl_body">';
   
 



if($_POST['query'] != '')
{
  $query = mysqli_query($conn, "select s.id as note , s.Title , s.CreatedDate , s.status , n.Name , u.FirstName , u.LastName,u.id as us,us1.id as admin,s.ModifiedDate,us1.FirstName as admin_fname,us1.Lastname as admin_lname,s.AdminRemarks,r.Value from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.status = r.id inner join users u on s.seller_id = u.id inner join users us1 on s.ActionedBy = us1.id where `status` = '10' AND `s`.`IsActive` = '1'  AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' OR s.ModifiedDate LIKE '%$search%' OR u.FirstName LIKE '%$search%' OR us1.FirstName LIKE '%$search%' OR s.AdminRemarks LIKE '%$search%' LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select s.id as note , s.Title , s.CreatedDate , s.status , n.Name , u.FirstName , u.LastName,u.id as us,us1.id as admin,s.ModifiedDate,us1.FirstName as admin_fname,us1.Lastname as admin_lname,s.AdminRemarks,r.Value from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.status = r.id inner join users u on s.seller_id = u.id inner join users us1 on s.ActionedBy = us1.id where `status` = '10' AND `s`.`IsActive` = '1'  AND `s`.`Title` like '%$search%' OR n.Name LIKE '%$search%' OR r.Value LIKE '%$search%' OR s.ModifiedDate LIKE '%$search%' OR u.FirstName LIKE '%$search%' OR us1.FirstName LIKE '%$search%' OR s.AdminRemarks LIKE '%$search%'");
  $total_records = mysqli_num_rows($query1);
}

if($_POST['query2'] != '')
{
  $search1 = $_POST['query2'];
  $query = mysqli_query($conn, "select s.id as note , s.Title , s.CreatedDate , s.status , n.Name , u.FirstName ,u.LastName, u.id as us,us1.id as admin,s.ModifiedDate,us1.FirstName as admin_fname,us1.Lastname as admin_lname,s.AdminRemarks,r.Value from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.status = r.id inner join users u on s.seller_id = u.id inner join users us1 on s.ActionedBy = us1.id where `status` = '10' AND `s`.`IsActive` = '1'  AND `u`.`FirstName` like '%$search1%' LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select s.id as note , s.Title , s.CreatedDate , s.status , n.Name , u.FirstName ,u.LastName, u.id as us,us1.id as admin,s.ModifiedDate,us1.FirstName as admin_fname,us1.Lastname as admin_lname,s.AdminRemarks,r.Value from `seller_notes` s INNER join `notecategories` n on s.Category = n.id inner join `referencedata` r on s.status = r.id inner join users u on s.seller_id = u.id inner join users us1 on s.ActionedBy = us1.id where `status` = '10' AND `s`.`IsActive` = '1'  AND `u`.`FirstName` like '%$search1%'  ");
  $total_records = mysqli_num_rows($query1);
}


  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
            $noteid = $row['note'];
               $userid = $row['us'];
                $adminid = $row['admin'];
        
        $output .= '<tr class="table-row">
             
        <td>' . $srno++ . '</td>
        <td id="title_'.$noteid.'" > <a href="note-details.php?id='.$noteid.'" style="color:#6255a5">' . $row['Title'] . '</a></td>
        <td>' . $row['Name'] . '</td>
        <td>' . $row['FirstName']. " ". $row['LastName'] . '&nbsp <a href="member-details.php?id='.$userid.'"><img src="../images/images/eye.png" alt=""></a>'. '</td>
        <td>' . $row['ModifiedDate'] . '</td>
        <td>' . $row['admin_fname']. " ". $row['admin_lname'] . '&nbsp <a href="member-details.php?id='.$adminid.'"><img src="../images/images/eye.png" alt=""></a>'. '</td>
        <td>' . $row['AdminRemarks'] . '</td>
        <td class="" style="">
		
     
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="../downloadNote.php?id='.$noteid.'" class="dropdown-item" data-toggle="modal" data-target="#exampleModal" onClick="showModal('.$noteid.')">Approve</a>
    <a href="../downloadNote.php?id='.$noteid.'" class="dropdown-item">Download Notes</a>
    <a href="note-details.php?id='.$noteid.'" class="dropdown-item">View More Details</a>
   
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
<td colspan="8"> No Record found. </td>   
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
                   <h4>Please press Yes to continue..</h4>
                 </div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="../images/images/close-icon.svg" alt="">
            </button>
          </div>
          <form action="" method="POST">
          <div class="modal-body">
          
           <div class="container text-right">
           
           
      </div>
            
            <input type="hidden" id="hiddenid1" name="noteid">     
            <button class="btn" style="background:#6255a5; color:white" type="submit" name="noteApprove">Yes</button>
            </form>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
              
            
          </div>
        
        </div>
      </div>
    </div>


    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <div class="container">
                 <div class="content-box">
                   <h5 id="">Via marking the note In Review – System will let user know that review process has been
initiated. Please press yes to continue. With yes, no buttons.</h5>
                 </div>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <img src="../images/images/close-icon.svg" alt="">
            </button>
          </div>
          <form action="" method="POST">
          <div class="modal-body">
          
           <div class="container text-right">
           
           
      </div>
            
            <input type="hidden" id="hiddenid2" name="noteid">     
            <button class="btn" style="background:#6255a5; color:white" type="submit" name="noteReview">Yes</button>
            </form>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
              
            
          </div>
        
        </div>
      </div>
    </div>




    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                 <label for="">Remarks <sup>*</sup></label>
                <input type="hidden" id="hiddenid3" name="noteid">
                <textarea class="form-control" id="message-text" name="comment"></textarea>
                  <br> 
                 <button class="btn" style="background:red; color:white" type="submit" name="noteReject">Reject</button>
             </form>
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
              
            
          </div>
        
        </div>
      </div>
    </div>








<script>
function showModal(id)
{
    $("#title").text($("#title_"+id).text());
    var id1 = id;
    console.log(id1);
    console.log($("#title_"+id).text());
    $("#hiddenid1").val(id1);
    $("#hiddenid2").val(id1);
    $("#hiddenid3").val(id1);
   
}
</script>