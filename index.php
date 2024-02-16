<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Welcome to Bit2Byte</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="logo.jpeg">
</head>
<body>
	<?php
		include "header.php";
	?>
	<nav class="navbar navbar-expand-lg"
    	     style="background-color:#4d7985;">
		  <div class="container-fluid">
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="#" style="color: #fff;">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="#about" style="color: #fff;">About</a>
		        </li>
		      </ul>
		      <ul class="navbar-nav me-right mb-2 mb-lg-0">
		      	<li class="nav-item">
		          <a class="nav-link" href="login.php" style="color: #fff;">Login</a>
		        </li>
		      </ul>
		  </div>
		    </div>
		</nav>
    <div>
    	
        <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
        	<img src="logo.jpeg" style="width:300px; height:200px;">
        	<h4 style="color: #0e2d36;">Welcome to Bit2Byte</h4>
        	<p>Cognitive Development of Students</p>
        </section>
        <section id="about"
                 class="d-flex justify-content-center align-items-center flex-column" style="background-color:#dbc27b;">
        	<div class="card mb-3 card-1">
			  <div class="row g-0">
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">About Us</h5>
			        <p class="card-text">We help to effectively manage institutional administration along with cognitive development of students.</p>
			        <p class="card-text"><small>Bit2Byte</small></p>
			      </div>
			    </div>
			  </div>
			</div>
        </section>
	
    </div>

	<?php
		include "footer.php";
	?>
<!-- End of .container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
</body>
</html>