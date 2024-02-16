<?php 
session_start();
if (isset($_SESSION['dsa_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'DSAAdmin') {
       include "../DB_connection.php";
       include "data/problems.php";
       include "data/student.php";
       $problem_id = $_GET['problem_id'];
       $tbl_name = "problem".$problem_id;
       $students = getAllProblemStudents($tbl_name, $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Students</title>
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
      
     <div class="container mt-5">
        <a href="problems.php" class="btn btn-dark">Go Back</a>
      <?php
        if ($students != 0) {
     ?>
        

           <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3 n-table" 
                 role="alert">
              <?=$_GET['error']?>
            </div>
            <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-info mt-3 n-table" 
                 role="alert">
              <?=$_GET['success']?>
            </div>
            <?php } ?>

           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">Roll No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($students as $student ) { 
                    $i++;  ?>
                  <tr>
                    <td><?=$student['roll_no']?></td>
                    <td>
                        <?=$student['fname']?>
                    </td>
                    <td><?=$student['lname']?></td>
                    <td>
                    <?php
                      $student_ori = getStudentById($student['student_id'], $conn);
                      $class = getClassById($student_ori['class_id'], $conn);
                      $section = getSectionById($student_ori['section_id'], $conn);
                      echo $class['class_name'].' '.$section['section'];
                    ?>

                  </td>
                    <td>
                        <?php
                            if($student['status'] == 0)
                            {
                                echo "Not submitted";
                            }
                            else
                            {
                        ?>
                        <form action="submission-view.php" method="POST" target="_blank">
                        <input type="hidden" value="<?=$student['submission']?>" name="submission">
                        <input type="hidden" value="<?=$student['language']?>" name="language">
                        <input type="hidden" value="<?=$problem_id?>" name="problem_id">
                        <input type="submit" value="View Submission" class="btn btn-warning">
                        </form>
                        <?php
                            }
                            ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                No data
              </div>
         <?php } ?>
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
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>