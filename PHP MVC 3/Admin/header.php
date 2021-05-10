
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Notes Marketplace</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/font-awesome/css/font-awesome.css">
	<!--External CSS-->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
<style>
	.dw .searching-div .search-box{
			position: relative;
			top: 28px;
		}
		.dw .searching-div .search-btn{
			position: relative;
			top: 26px;
		}
		
		@media(max-width:425px){
			.dashboard .searching-div .search-box{
				position: relative;
				left: -px;
				
			}
			.dashboard .searching-div .search-btn{
				position: relative;
				left: -100px;
				width: 35%;
			}
			@media(max-width:320px){
				.dashboard .under-review-select{
					max-width: 50%;
				}
				.dashboard .under-review-select-2{
					max-width: %;
				}
			}
			
		}
		.nd .vl{
			border-left: 1px solid grey;
  height: 180px;
		}
		.nd .leftdiv-right{
			margin-left: -40px;
		}
		.nd .text-left{
			padding-left: 45px;
		}
		.nd .div-right{
			margin-left: 24px;
		}
		.ndp .checked{
			color : orange;
		}
        .ndp .ratings{
            position:relative;
            top:15px;
            
        }
        .ndp .customer-reviews{
            padding-top:5px;
        }
		</style>
	</head>
<?php
include '../includes/connect.php';
if(!isset($_SESSION)){
	session_start();
}

$pagename = basename($_SERVER['PHP_SELF']);
	$class1 = "";
	$class2 = "";
	$class3 = "";
	$class4 = "";
	$class5 = "";


	$dashboard = 'dashboard.php';
	
	$notes1 = 'notes-under-review.php';
	$notes2 = 'published-notes.php';
	$notes3 = 'downloaded-note.php';
	$notes4 = 'rejected-notes.php';
	
	$members = 'members.php';

	$spam = 'spam-reports.php';


$setting1 = 'manage-system-configurations.php';
$setting2 = 'manage-administrative.php';
$setting3 = 'manage-type.php';
$setting4 = 'manage-country.php';
$setting5 = 'manage-category.php';

	
	if($pagename == $dashboard){
		$class1="active";
    }
	if($pagename == $notes1 || $pagename==$notes2 || $pagename==$notes3 || $pagename==$notes4 ){
		$class2="active";
	}
	if($pagename == $members){
		$class3="active";
	}
	if($pagename == $spam){
		$class4="active";
	}
	if($pagename == $setting1 || $pagename==$setting2 || $pagename==$setting3 || $pagename==$setting4 || $pagename==$setting5 ){
		$class5="active";
	}




if(isset($_SESSION['userIdentifier'])){
    $user_id = $_SESSION['userIdentifier'];
  $sql = mysqli_query($conn,"select * from users where id = '$user_id'");
  while($row=mysqli_fetch_array($sql)){
      $userrole = $row['role_id'];
  }

  if($userrole == 3){
    ?>
	<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" href="#"><img src="images/Login/logo.png" alt=""></a>
		<button class="navbar-toggler ChangeToggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="ChangeToggle">
			<span class="navbar-toggler-icon">
				<i class="fa fa-bars" style="color:#6255a5; font-size:28px;"></i>
			</span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item  <?php echo $class1; ?>">
					<a class="nav-link " href="dashboard.php">Dashboard</a>
				</li>
				<li class="nav-item <?php echo $class2; ?>">
					<div class="dropdown">
						<a class="nav-link " href="#" data-toggle="dropdown" id="note">Notes</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="note">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="notes-under-review.php">Notes Under Review</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="published-notes.php">Published Notes</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="downloaded-note.php">Downloaded Notes</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="rejected-notes.php">Rejected Notes</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item <?php echo $class3; ?>">
					<a class="nav-link " href="members.php">Members</a>
				</li>
				<li class="nav-item <?php echo $class4; ?>">
					<div class="dropdown">
						<a class="nav-link " href="#" data-toggle="dropdown" id="note">Reports</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="note">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="spam-reports.php">Spam Reports</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item <?php echo $class5; ?>">
					<div class="dropdown">
						<a class="nav-link " href="#" data-toggle="dropdown" id="setting">Settings</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="setting">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-system-configuration.php">Manage System Configuration</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-administrative.php">Manage Administrative</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-category.php">Manage Category</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-type.php">Manage Type</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-country.php">Manage Countries</a></li>
						</ul>
					</div>
				</li>
				<li>
					<div class="dropdown">
						<a href="#" id="imageDropdown" data-toggle="dropdown">
							<img src="images/User-Profile/user-img.png">
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="profile.php">Update Profile</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="../change-password.php">Change Password</a></li>
							<li role="presentation" class="dropdown-item log"><a role="menuitem" tabindex="-1" href="logout.php" class="dropdown-logout">Logout</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="btn nav-btn" href="logout.php" role="button">
						<p>Logout</p>
					</a>
				</li>
			</ul>
		</div>
	</nav>
<?php
  }	
else{
    ?>
  	<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" href="#"><img src="images/Login/logo.png" alt=""></a>
		<button class="navbar-toggler ChangeToggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="ChangeToggle">
			<span class="navbar-toggler-icon">
				<i class="fa fa-bars" style="color:#6255a5; font-size:28px;"></i>
			</span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item <?php echo $class1; ?>">
					<a class="nav-link" href="dashboard.php">Dashboard</a>
				</li>
				<li class="nav-item <?php echo $class2; ?>">
					<div class="dropdown">
						<a class="nav-link " href="#" data-toggle="dropdown" id="note">Notes</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="note">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="notes-under-review.php">Notes Under Review</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="published-notes.php">Published Notes</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="downloaded-note.php">Downloaded Notes</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="rejected-notes.php">Rejected Notes</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item  <?php echo $class3; ?>">
					<a class="nav-link" href="members.php">Members</a>
				</li>
				<li class="nav-item <?php echo $class4; ?>">
					<div class="dropdown">
						<a class="nav-link " href="#" data-toggle="dropdown" id="note">Reports</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="note">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="spam-reports.php">Spam Reports</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item <?php echo $class5; ?>">
					<div class="dropdown">
						<a class="nav-link " href="#" data-toggle="dropdown" id="setting">Settings</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="setting">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-category.php">Manage Category</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-type.php">Manage Type</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="manage-country.php">Manage Countries</a></li>
						</ul>
					</div>
				</li>
				<li>
					<div class="dropdown">
						<a href="#" id="imageDropdown" data-toggle="dropdown">
						<?php
								$dir="";
							$userid = $_SESSION['userIdentifier'];
							$sql =mysqli_query($conn,"select * from user_profile where user_id = '$userid'");
							while($row=mysqli_fetch_array($sql)){
								$dir = $row['Profile_picture'];
							}
							if($dir==""){
								$sql1 =mysqli_query($conn,"select * from system_configurations where `Key` = 'sellerdefaultimage'");
							while($row1=mysqli_fetch_array($sql1)){
								$dir = $row1['Value'];
							}
							}
								?>
								<img src="../<?php echo $dir; ?>" style="width:42px; height:32px; margin-top:4px;">
						</a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="profile.php">Update Profile</a></li>
							<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="../change-password.php">Change Password</a></li>
							<li role="presentation" class="dropdown-item log"><a role="menuitem" tabindex="-1" href="logout.php" class="dropdown-logout">Logout</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="btn nav-btn" href="logout.php" role="button">
						<p>Logout</p>
					</a>
				</li>
			</ul>
		</div>
	</nav>  


<?php
}
}
?>