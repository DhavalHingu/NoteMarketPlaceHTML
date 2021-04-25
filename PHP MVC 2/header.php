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
								$dir="images/User-profile/user-img.png";
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