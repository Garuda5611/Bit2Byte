<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.jpeg">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
	
</head>
<body>
    <?php 
        include "header.php";
        include "inc/navbar.php";
     ?>
     <section class="welcome-text d-flex justify-content-center align-items-center flex-column">
        	<img src="../logo.jpeg" style="width:300px; height:200px;">
        	<h4 style="color: #0e2d36;">Welcome to Bit2Byte</h4>
        	<p>Cognitive Development of Students</p>
        </section>
     <div class="container mt-5" style="background-color:#58c775; padding:20px;">
         <div class="container text-center">
          <h4>Available Features</h4><br/>
             <div class="row row-cols-5">
               <a href="teacher.php" 
                  class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-user-md fs-1" aria-hidden="true"></i><br>
                  Teachers
               </a> 
               <a href="student.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
                  Students
               </a> 
               <a href="class.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-cubes fs-1" aria-hidden="true"></i><br>
                  Class
               </a> 
               <a href="study-material.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-calendar fs-1" aria-hidden="true"></i><br>
                  Study Material
               </a>  
               <a href="notice.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-envelope fs-1" aria-hidden="true"></i><br>
                  Notice
               </a> 
               <a href="../logout.php" class="col btn btn-warning m-2 py-3 col-5">
                 <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                  Logout
               </a> 
             </div>
         </div>
     </div>
    <br/><br/>
    <?php
    include "footer.php"
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>