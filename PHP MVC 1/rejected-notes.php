<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0 ,user-scalable=no">
	<title>Rejected Notes</title>
	<!--Google Font-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
	<!--Font Awesome-->
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
	<!--External CSS-->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	</head>
<body class="dashboard downloads">
		<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#"><img src="images/Login/logo.png" alt=""></a>
  <button class="navbar-toggler ChangeToggle" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="ChangeToggle">
 
    <span class="navbar-toggler-icon">
    	  <i class="fa fa-bars" style="color:#6255a5; font-size:28px;"></i>
    </span>
	    </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="search.html">Search Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.html">Sell Your Notes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="buyer-requests.html">Buyer Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="faq.html">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact-us.html">Contact Us</a>
      </li>
      <li>
      	<div class="dropdown">
      <a href="#" id="imageDropdown" data-toggle="dropdown">
        <img src="images/User-Profile/user-img.png">
      </a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="imageDropdown">
        <li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="user-profile.html" >My Profile</a></li>
        <li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="my-downloads.html">My Downloads</a></li>
        <li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="my-sold-notes.html">My Sold Notes</a></li>
 <li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="my-rejected-notes.html">My Rejected Notes</a></li>
 <li role="presentation" class="dropdown-item"><a role="menuitem" tabindex="-1" href="change-password.html">Change Password</a></li>
 <li role="presentation" class="dropdown-item log"><a role="menuitem" tabindex="-1" href="#" class="dropdown-logout">Logout</a></li>

     </ul>
    </div>
      </li>
      <li class="nav-item">
      	<a class="btn nav-btn" href="#"  role="button"><p>Logout</p></a>
      </li>
    </ul>
      </div>
</nav>
	
	<div class="container">
		<div class="heading-first">
	<div class="row">
	<div class="col-md-6 col-12">
		<h3>My Rejected Notes</h3>
		</div>
		
			<div class="col-md-6 pull-right searching-div col-12">
			
		<input type="text" class="search-box" placeholder="Search Notes">
		<button class="btn search-btn">Search</button>
		</div>
		</div>
			</div>
	</div>
	<div class="container">
	<div class="table-responsive">
		<table class="table">
  <thead>
    <tr>
      <th scope="col" class="table-column-header">sr no.</th>
      <th scope="col" class="table-column-header">note title</th>
      <th scope="col" class="table-column-header">Category</th>
      <th scope="col" class="table-column-header">Remarks</th>
      <th scope="col" class="table-column-header">Clone</th>
         <th></th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-row">
      <td>1</td>
      <td><a href="#" class="table-link">Data Science</a></td>
      <td>Science</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td>
      <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
   
  </div>
</div>

		</td>	
    </tr>
 <tr class="table-row">
      <td>2</td>
      <td><a href="#" class="table-link">Accounts</a></td>
      <td>Commerce</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td>
       <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
   
  </div>
</div>

		</td>	
    </tr>
  <tr class="table-row">
     <td>3</td>
      <td><a href="#" class="table-link">Social Studies</a></td>
      <td>Social</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td> 
            <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
   
  </div>
</div>

		</td>	
       </tr>
    <tr class="table-row">
      <td>4</td>
      <td><a href="#" class="table-link">AI</a></td>
      <td>IT</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td>
     <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
     </div>
</div>

		</td>	
		    </tr>
  <tr class="table-row">
      <td>5</td>
      <td><a href="#" class="table-link">Lorem ipsum</a></td>
      <td>Lorem</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td>Clone</td>
       <td class="">
			
     
    <div class="table-dropdown-left">
     
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
     </div>
</div>

		</td>	
    </tr>
      <tr class="table-row">
      <td>6</td>
      <td><a href="#" class="table-link">Data Science</a></td>
      <td>Science</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td>
      <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
   
  </div>
</div>

		</td>	
    </tr>
 <tr class="table-row">
      <td>7</td>
      <td><a href="#" class="table-link">Accounts</a></td>
      <td>Commerce</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td>
       <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
   
  </div>
</div>

		</td>	
    </tr>
  <tr class="table-row">
     <td>8</td>
      <td><a href="#" class="table-link">Social Studies</a></td>
      <td>Social</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td> 
            <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
   
  </div>
</div>

		</td>	
       </tr>
    <tr class="table-row">
      <td>9</td>
      <td><a href="#" class="table-link">AI</a></td>
      <td>IT</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td><a href="#" class="table-link">Clone</a></td>
     <td class="">
			
     
    <div class="table-dropdown-left">
    
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
     </div>
</div>

		</td>	
		    </tr>
  <tr class="table-row">
      <td>10</td>
      <td><a href="#" class="table-link">Lorem ipsum</a></td>
      <td>Lorem</td>
      <td>Lorem ipsum is simply dummy text</td>
      <td>Clone</td>
       <td class="">
			
     
    <div class="table-dropdown-left">
     
  <button type="button" class="btn" data-toggle="dropdown"  aria-expanded="false">
    <img src="images/images/dots.png" alt="">
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- Dropdown menu links -->
    <a href="#" class="dropdown-item">Download Note</a>
     </div>
</div>

		</td>	
    </tr>

   </tbody>
</table>
	
		
<ul class="pagination text-center pull-right">
    <li class="page-item active" aria-current="page"><a href="#" class="left"><img src="images/search/left-arrow.png" alt=""></a></li>
    <li class="active"><a href="#" class="link">1</a></li>
    <li><a href="#" class="link">2</a></li>
    <li><a href="#" class="link">3</a></li>
     <li><a href="#" class="link">4</a></li>
      <li><a href="#" class="link">5</a></li>
    <li><a href="#" class="right"><img src="images/search/right-arrow.png" alt=""></a></li>
  </ul>
		</div>
	</div>
	
	
	<hr>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<p>Copyright &copy; Tatvasoft All rights reserved.</p>
					</div>
					<div class="col-md-6">
						<div class="social-list text-right">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>
			</div>
		</footer>
	

	
	
	<!--Jquery-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--Bootstrap-->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
	<!--Custom JS-->
	<script src="js/script.js"></script>
	</body>
</html>