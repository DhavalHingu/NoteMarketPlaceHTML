<?php
if(!isset($_SESSION)){
   session_start();
   
}
include 'includes/connect.php';
include 'includes/functions.php';

if(isset($_SESSION['userIdentifier'])){
  $seller_id = $_SESSION['userIdentifier'];
}
else{
  $seller_id = "";
}
$srno = 1;

//count the records
  $result_count = mysqli_query($conn,"select COUNT(*) as total_records from `seller_notes` where `status` = '9'");
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
$query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' LIMIT $start , $limit ");
$output = '';

$sql = mysqli_query($conn,"Select `id` from `seller_notes` where `status` = '9' LIMIT $start , $limit");

   


	
	


if($_POST['query'] != '')
{
  $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Title` LIKE '%$search%' LIMIT $start , $limit");

  $query1 = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Title` LIKE '%$search%'");
  $total_records = mysqli_num_rows($query1);

  $sql = mysqli_query($conn,"select `id` from `seller_notes` where `status`  = '9' AND `Title` LIKE '%$search%'");
 
}


if($_POST['query1'] != '')
{
  $type = $_POST['query1'];
  if($type == "0"){
    $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' LIMIT $start , $limit");
    $sql = mysqli_query($conn,"Select `id` from `seller_notes` where `status` = '9' LIMIT $start , $limit");
  }
  else{
  $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Note_type` LIKE '%$type%' LIMIT $start , $limit");
  $sql = mysqli_query($conn,"select `id` from `seller_notes` where `status`  = '9' AND `Note_type` LIKE '%$type%'");
 
}

  $query1 = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Note_type` LIKE '%$type%'");
  $total_records = mysqli_num_rows($query1);
  
  
}

if($_POST['query2'] != '')
{
  $cat = $_POST['query2'];
  if($cat == "0"){
    $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' LIMIT $start , $limit");
    $sql = mysqli_query($conn,"Select `id` from `seller_notes` where `status` = '9' LIMIT $start , $limit");
  }
  else{
  $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Category` LIKE '%$cat%' LIMIT $start , $limit");
  $sql = mysqli_query($conn,"select `id` from `seller_notes` where `status`  = '9' AND `Category` LIKE '%$cat%'");
 
}

  $query1 = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Category` LIKE '%$cat%'");
  $total_records = mysqli_num_rows($query1);
  
  
}

if($_POST['query3'] != '')
{
  $cat = $_POST['query3'];
  if($cat == "0"){
    $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' LIMIT $start , $limit");
    $sql = mysqli_query($conn,"Select `id` from `seller_notes` where `status` = '9' LIMIT $start , $limit");
  }
  else{
  $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `University_name` LIKE '%$cat%' LIMIT $start , $limit");
  $sql = mysqli_query($conn,"select `id` from `seller_notes` where `status`  = '9' AND `University_name` LIKE '%$cat%'");
 
}

  $query1 = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `University_name` LIKE '%$cat%'");
  $total_records = mysqli_num_rows($query1);
  
  
}

if($_POST['query4'] != '')
{
  $cat = $_POST['query4'];
  if($cat == "0"){
    $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' LIMIT $start , $limit");
    $sql = mysqli_query($conn,"Select `id` from `seller_notes` where `status` = '9' LIMIT $start , $limit");
  }
  else{
  $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Course` LIKE '%$cat%' LIMIT $start , $limit");
  $sql = mysqli_query($conn,"select `id` from `seller_notes` where `status`  = '9' AND `Course` LIKE '%$cat%'");
 
}

  $query1 = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Course` LIKE '%$cat%'");
  $total_records = mysqli_num_rows($query1);
  
  
}

if($_POST['query5'] != '')
{
  $cat = $_POST['query5'];
  if($cat == "0"){
    $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' LIMIT $start , $limit");
    $sql = mysqli_query($conn,"Select `id` from `seller_notes` where `status` = '9' LIMIT $start , $limit");
  }
  else{
  $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Country` LIKE '%$cat%' LIMIT $start , $limit");
  $sql = mysqli_query($conn,"select `id` from `seller_notes` where `status`  = '9' AND `Country` LIKE '%$cat%'");
 
}

  $query1 = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Country` LIKE '%$cat%'");
  $total_records = mysqli_num_rows($query1);
  
  
}

if($_POST['query6'] != '')
{
  $cat = $_POST['quer6'];
  if($cat == "0"){
    $query = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' LIMIT $start , $limit");
    $sql = mysqli_query($conn,"Select `id` from `seller_notes` where `status` = '9' LIMIT $start , $limit");
  }
  else{
  $query = mysqli_query($conn, "select * from `seller_notes`,seller_notes_reviews where `status` = '9' AND seller_notes.id = seller_notes_reviews.note_id AND `Ratings` LIKE '%$cat%' LIMIT $start , $limit");
  $sql = mysqli_query($conn,"select `id` from `seller_notes`,seller_notes_reviews where `status`  = '9' AND seller_notes.id = seller_notes_reviews.note_id AND `Ratings` LIKE '%$cat%'");
 
}

  $query1 = mysqli_query($conn, "select * from `seller_notes` where `status` = '9' AND `Country` LIKE '%$cat%'");
  $total_records = mysqli_num_rows($query1);
  
  
}





$cnt=mysqli_num_rows($sql);
$output .= '<div class="heading">
<div class="container">
  
 <h3>Total '.$cnt.' Notes</h3>
</div>
</div>
<div class="notes">
<div class="container">
<div class="row">';
  if (mysqli_num_rows($query) > 0) {
    $sum = 0;
 $countID = 1;  
    while ($row = mysqli_fetch_array($query)) {
        $title = $row['Title'];
        $image = $row['Display_picture'];
        $university = $row['University_name'];
        $pages = $row['Number_of_pages'];
        $date = $row['Published_date'];
        $id = $row['id'];
  
        
        $spam = mysqli_query($conn,"select COUNT(*) as totalspam from seller_notes_reported_issues where note_id = '$id'");
        while($row4=mysqli_fetch_array($spam)){
          $totalspam = $row4['totalspam'];
        }

  





        $output .= '<div class="col-lg-4 col-md-6 col-12"> 
         <div class="card" style="width: 22rem;">
						  <img class="card-img-top" src='.$image.' alt="Card image cap" style="height:250px;">
						  <div class="card-body">
							  <div class="note-heading">
								  <a href="note-details.php?id='.$id.'">
									  <h4>'.$title.'</h4>
								  </a>
							  </div>
							  <ul>
								  <li><img src="images/search/university.png" alt="">'.$university.",".' </li>
								  <li class="pages"><img src="images/search/pages.png" alt="">&nbsp'.$pages."Pages".'</li>
								  <li class="date"><img src="images/search/date.png" alt="">'.$date.'</li>
              	<li style="color: red" class="flag"><img src="images/search/flag.png" alt="">
                   &nbsp; '.$totalspam.' Users marked this note as inappropriate</li>
							  </ul>
                <div class="rating">';
                $qu = mysqli_query($conn,"select note_id,SUM(Ratings) as sum , COUNT(*) as countid from seller_notes_reviews where note_id = '$id'");
                while($row3=mysqli_fetch_array($qu)){
                  $notes = $row3['note_id'];
                  //$rates = $row3['Ratings'];
                  $counts = $row3['countid'];
               
                if($counts==0){
                  $avg=1;
                }
                else{
                  $avg = $counts;
                }
                // echo $notes;
               //  echo $rates;
             //echo $count;
              $sum = $row3['sum'];
               $devide = ceil($sum / $avg);
              //  echo $devide;
              
              
                if($devide == 5){
               $output .= '   
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>
                <span class="fa fa-star checked" ></span>';
                }
                if($devide == 4){
                  $output .= '   
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star checked" ></span>
                   <span class="fa fa-star-o" ></span>';
                   }
                   if($devide == 3){
                    $output .= '   
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star checked" ></span>
                     <span class="fa fa-star-o" ></span>
                     <span class="fa fa-star-o" ></span>';
                     }
                     if($devide == 2){
                      $output .= '   
                       <span class="fa fa-star checked" ></span>
                       <span class="fa fa-star checked" ></span>
                       <span class="fa fa-star-o " ></span>
                       <span class="fa fa-star-o " ></span>
                       <span class="fa fa-star-o" ></span>';
                       }
                       if($devide == 1){
                        $output .= '   
                         <span class="fa fa-star checked" ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o " ></span>
                         <span class="fa fa-star-o" ></span>';
                         }
                         if($devide == 0){
                          $output .= '   
                           <span class="fa fa-star-o" ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o " ></span>
                           <span class="fa fa-star-o" ></span>';
                           }
        
                        }
        
              $output .=  '</div>
							  <span>'.$counts.' Reviews</span>
						  </div>
                          </div>
                          
                         
                         
                          </div>';
  $countID++;
}
       
}
else
{
$output .= '
 No Notes found. ';
}

$output .= '
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




