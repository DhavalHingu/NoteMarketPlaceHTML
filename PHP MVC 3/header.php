<!DOCTYPE html>
<html lang="en">
<head>


	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Notes Marketplace</title>
	<!--Google Font-->
	<link href="https://fonts.googleapiws.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--External CSS-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
<style>
	.add-notes{
			overflow-x:hidden;
		}
		.ds .searching-div .search-box,
		.ds .searching-div .search-btn{
			position: relative;
			bottom: 35px;
			left: -24px;
		}
		.ds .searching-div .search-btn{
			position: relative;
			bottom: 38px
		}
		@media(max-width:768px){
			.dashboard .searching-div .search-box,
			.dashboard .searching-div .search-btn{
				position: relative;
				left: 248px;
				bottom: 50px;
			}
			.dashboard .searching-div .search-btn{
				position: relative;
				bottom: 53px;
			}
		}
		@media(max-width:425px){
			.dashboard .searching-div .search-box,
			.dashboard .searching-div .search-btn{
				position: relative;
				left: -100px;
				
				
			}
			.dashboard .searching-div{
				max-width: 90%;
			}
		}
		@media(max-width:320px){
			.dashboard .searching-div .search-btn{
				max-width: 100%;
			}
			.dashboard .searching-div{
				max-width: 100%;
			}
		}
		
.np .checked{
			color : orange;
		}
        .np .ratings{
            position:relative;
            top:15px;
            
        }
        .np .customer-reviews{
            padding-top:5px;
        }
		.sp .first-section img {
			height: 300px;
			width: 100%;
		}

		.sp .first-section {
			position: relative;
		}

		.sp .text-overlay h3 {
			font-family: "Open Sans", sans-serif;
			font-size: 40px;
			font-weight: 600;
			line-height: 28px;
			color: white;
		}

		.sp .text-overlay {
			position: absolute;
			top: 25%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.sp .heading h3 {
			font-family: "Open Sans", sans-serif;
			font-size: 24px;
			font-weight: 600;
			line-height: 28px;
			color: #6255a5;
			padding-top: 60px;
		}

		.sp .search {
			background-color: whitesmoke;
			padding: 30px;
			margin-top: 20px;
		}

		.sp .search-note-input {
			padding-bottom: 20px;
		}

		.sp .notes {
			padding-top: 30px;
		}

		.sp .card {
			border: 1px solid #d1d1d1;
			padding: 0;
			margin-bottom: 20px;
		}

		.sp .card-body {
			padding: 0;
		}

		.sp .note-heading {
			padding-top: 20px;
			padding-bottom: 20px;
			height: 120px;
		}

		.sp .note-heading h4 {
			padding-left: 20px;
			font-family: "Open Sans", sans-serif;
			font-size: 20px;
			font-weight: 600;
			line-height: 26px;
			color: #6255a5;
		}

		.sp .notes ul {
			list-style: none;
			padding-left: 20px;
		}

		.sp .notes ul li {
			padding-bottom: 20px;
			font-family: "Open Sans", sans-serif;
			font-size: 15px;
			font-weight: 400;
			line-height: 20px;
			color: #333333;
		}

		.sp .notes ul li img {
			position: relative;
			left: -12px;
		}

		.sp .search-box {
			background-image: url(images/images/search-icon.png);
			text-indent: 30px;
			background-position: 20px;
			background-repeat: no-repeat;
		}

		.sp .search-box:focus {
			background: none;
			text-indent: 0;
		}

		.sp .rating {
			border: none;
			float: left;
			position: relative;
			bottom: 0px;
			padding-left: 12px;
		}

		.sp span {
			position: relative;
			padding-left: 15px;
		}

		.sp .rating>input {
			display: none;
		}

		.sp .rating>label:before {
			margin: 5px;
			font-size: 1.25em;
			font-family: FontAwesome;
			display: inline-block;
			content: "\f005";
			position: relative;
			bottom: 4px;
		}

		.sp .rating>label {
			color: #ddd;
			float: right;
		}

	    .sp .checked{
			color : orange;
		}
		

		.sp .pagination {
			margin: 0 39%;
		}
</style>

	</head>


<?php

include 'includes/connect.php';
$pagename = basename($_SERVER['PHP_SELF']);
	$class1 = "";
	$class2 = "";
	$class3 = "";
	$class4 = "";
	$class5 = "";

	$search = 'search.php';
	$dashboard = 'dashboard.php';
	$br = 'buyer-requests.php';
	$faq = 'faq.php';
	$contact='contact-us.php';


	if($pagename == $search){
		$class1="active";
	}
	else if($pagename == $dashboard){
		$class2="active";
	}
	elseif($pagename == $br){
		$class3="active";
	}
	else if($pagename == $faq ){
		$class4="active";
	}
	else if($pagename == $contact){
		$class5="active";
	}

if(isset($_SESSION['userIdentifier'])){
	

	

	


    ?>
    <nav class="navbar navbar-expand-lg fixed-top">
			<a class="navbar-brand" href="#"><img src="images/Login/logo.png" alt=""></a>
			<button class="navbar-toggler ChangeToggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="ChangeToggle">
				<span class="navbar-toggler-icon">
					<i class="fa fa-bars" style="color:#6255a5; font-size:28px;"></i>
				</span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item <?php echo $class1; ?>">
						<a class="nav-link" href="search.php">Search Notes</a>
					</li>
					<li class="nav-item <?php echo $class2; ?>">
						<a class="nav-link" href="dashboard.php">Sell Your Notes</a>
					</li>
					<li class="nav-item <?php echo $class3; ?>">
						<a class="nav-link" href="buyer-requests.php">Buyer Request</a>
					</li>
					<li class="nav-item <?php echo $class4; ?>">
						<a class="nav-link" href="faq.php">FAQ</a>
					</li>
					<li class="nav-item <?php echo $class5; ?>">
						<a class="nav-link" href="contact-us.php">Contact Us</a>
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
								$sql =mysqli_query($conn,"select * from system_configurations where Key = 'sellerdefaultimage'");
							while($row=mysqli_fetch_array($sql)){
								$dir = $row['Value'];
							}
							}
								?>
								<img src="<?php echo $dir; ?>" style="width:42px; height:32px; margin-top:4px;">
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="user-profile.php">My Profile</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="downloads.php">My Downloads</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="sold-notes.php">My Sold Notes</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="rejected-notes.php">My Rejected Notes</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
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
                <a class="nav-link" href="search.php">Search Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Sell Your Notes</a>
            </li>
            <li class="nav-item <?php echo $class4; ?>">
                <a class="nav-link" href="faq.php">FAQ</a>
            </li>
            <li class="nav-item <?php echo $class5; ?>">
                <a class="nav-link" href="contact-us.php">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="btn nav-btn" href="login.php" role="button">
                    <p>Login</p>
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php
}
?>