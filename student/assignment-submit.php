<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
      
       include "../DB_connection.php";
        include "data/assignment.php";
        include "data/student.php";
        $student_id = $_SESSION['student_id'];
        $student = getStudentById($student_id,$conn);
        $assignment_id = $_GET['assignment_id'];
        $assignment = getAssignmentById($assignment_id, $conn);
        $tbl_name = "assignment".$student['section_id'].'_'.$assignment_id;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Submit Assignment</title>
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
        <a href="assignment.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/assignment-submit.php"
              name="std">
        <h3>Submit Solution</h3><hr>
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
            <h4>Title: <?= $assignment['title']?></h4>
            <h6>Description: <?=$assignment['description']?></h6>
        </div>
        <hr/>
        <div class="mb-3">
          <label class="form-label">Solution(Within 500 characters)</label>
          <textarea row="8" class="form-control" name="description"></textarea>
        </div>
        <input type="hidden" value="<?=$tbl_name?>" name="tbl_name">
        <input type="hidden" value="<?=$student_id?>" name="student_id">
        <input type="hidden" value="<?=$assignment_id?>" name="assignment_id">

      <button type="submit" class="btn btn-primary">Submit</button>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
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