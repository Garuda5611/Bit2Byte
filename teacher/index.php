<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
      
      include "../DB_connection.php";
      $teacher_id = $_SESSION['teacher_id'];
      $sql = "SELECT * FROM teachers
              WHERE teacher_id=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$teacher_id]);
      $teacher = $stmt->fetch();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Teacher - Home</title>
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
        	<h4 style="color: #0e2d36;">Welcome <?= $teacher['fname'].' '.$teacher['lname']?></h4>
        	<p>Class : <?php
        include "data/class.php";
        include "data/section.php";

        $section = getSectionById($teacher['section'], $conn);
        $class = getClassById($section['class_id'], $conn);
        echo $class['class_name'].' '.$section['section'];?></p>
        </section>
     <div class="container mt-5" style="background-color:#58c775; padding:20px;">
         <div class="container text-center">
          
        <h4 style="font-family:poppins; font-size:30px;">You can visit</h4><br/>
             <div class="row row-cols-5">
             <?php
                if($teacher['section'] != '')
                {
              ?>
               <a href="student.php" 
                  class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-user-md fs-1" aria-hidden="true"></i><br>
                  View Students
               </a> 
               <a href="problems.php" 
                  class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-question-circle fs-1" aria-hidden="true"></i><br>
                  Problem Status
               </a> 
               <a href="assignment.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i><br>
                  Assignment
               </a> 
               <a href="study-material.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-book fs-1" aria-hidden="true"></i><br>
                  Study Material
               </a>  
               <?php
                  }
                  else
                  {
                    echo "<h1>You dont have any class allocated</h1>";
                    echo '<br/><br/>';
                  }
                ?> 
             </div>
             <div class="row row-cols-5">
             <a href="notice.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-envelope fs-1" aria-hidden="true"></i><br>
                  Notice
               </a> 
               <a href="teacher-view.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-user fs-1" aria-hidden="true"></i><br>
                  Profile
               </a>
               <a href="change-password.php" class="col btn btn-dark m-2 py-3">
                 <i class="fa fa-key fs-1" aria-hidden="true"></i><br>
                  Change Password
               </a>
               <a href="../logout.php" class="col btn btn-warning m-2 py-3 col-5">
                 <i class="fa fa-sign-out fs-1" aria-hidden="true"></i><br>
                  Logout
               </a>
                </div>
         </div>
     </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>
<br/><br/>
    <?php
    include "footer.php"
    ?>
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