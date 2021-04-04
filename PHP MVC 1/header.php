<?php


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
					<li class="nav-item" active>
						<a class="nav-link" href="search.php">Search Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="dashboard.php">Sell Your Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="buyer-requests.php">Buyer Request</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="faq.html">FAQ</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact-us.php">Contact Us</a>
					</li>
					<li>
						<div class="dropdown">
							<a href="#" id="imageDropdown" data-toggle="dropdown">
								<img src="images/User-Profile/user-img.png">
							</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="my-downloads.html">My Downloads</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="my-sold-notes.html">My Sold Notes</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href=my-rejected-notes.html>My Rejected Notes</a></li>
								<li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="change-password.html">Change Password</a></li>
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
            <li class="nav-item active">
                <a class="nav-link" href="search.php">Search Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Sell Your Notes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="faq.html">FAQ</a>
            </li>
            <li class="nav-item">
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