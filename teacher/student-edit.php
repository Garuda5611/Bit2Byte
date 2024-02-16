<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['student_id'])) {

    if ($_SESSION['role'] == 'Teacher') {
      
       include "../DB_connection.php";
       include "data/student.php";
       include "data/section.php";
       include "data/class.php";

       $sections = getAllSections($conn);
       
       $student_id = $_GET['student_id'];
       $student = getStudentById($student_id, $conn);

       if ($student == 0) {
         header("Location: student.php");
         exit;
       }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Student</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
    include "header.php";
        include "inc/navbar.php";
     ?>
     <div class="container mt-5" style="min-height:70vh;">
        <a href="student.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/student-edit.php">
        <h3>Edit Student Info</h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>
        <div class="mb-3">
          <label class="form-label">Roll number</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['roll_no']?>" 
                 name="roll">
        </div>
        <div class="mb-3">
          <label class="form-label">First name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['fname']?>" 
                 name="fname">
        </div>
        <div class="mb-3">
          <label class="form-label">Last name</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['lname']?>"
                 name="lname">
        </div>
        <div class="mb-3">
          <label class="form-label">Address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['address']?>"
                 name="address">
        </div>
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['email_address']?>"
                 name="email_address">
        </div>
        <div class="mb-3">
          <label class="form-label">Date of birth</label>
          <input type="date" 
                 class="form-control"
                 value="<?=$student['date_of_birth']?>"
                 name="date_of_birth">
        </div>
        <div class="mb-3">
          <label class="form-label">Gender</label><br>
          <input type="radio"
                 value="Male"
                 <?php if($student['gender'] == 'Male') echo 'checked';  ?> 
                 name="gender"> Male
                 &nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio"
                 value="Female"
                 <?php if($student['gender'] == 'Female') echo 'checked';  ?> 
                 name="gender"> Female
        </div>

        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" 
                 class="form-control"
                 value="<?=$student['username']?>"
                 name="username">
        </div>
        <input type="text"
                value="<?=$student['student_id']?>"
                name="student_id"
                hidden>


        <br><hr>

        <div class="mb-3">
          <label class="form-label">Class</label>
          <div class="row row-cols-5">


          <select class="form-control" name="classes" id="classes">
          
          <option value='0'>Select Class</option>
          <?php foreach ($sections as $section): 
              
              $class = getClassById($section["class_id"],$conn);
              ?>

                <option value="<?=$section["section_id"]?>"><?=($class["class_name"].' '.$section["section"])?></option>
            <?php endforeach ?>  
            
            </select>
          </div>
        </div>

        

      <button type="submit" 
              class="btn btn-primary">
              Update</button>
     </form>

     

          <div class="mb-3">
          </div>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
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
    header("Location: student.php");
    exit;
  } 
}else {
	header("Location: student.php");
	exit;
} 

?>'-$_COOKIE'