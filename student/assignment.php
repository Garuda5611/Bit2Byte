<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
       include "../DB_connection.php";
       include "data/student.php";
       include "data/assignment.php";

       $student_id = $_SESSION['student_id'];
       $student = getStudentById($student_id, $conn);
       $assignments = getAssignments($student['section_id'], $conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Assignment</title>
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
      <?php
        if ($assignments != 0) {
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
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($assignments as $assignment ) { 
                    $i++;  ?>
                  <tr>
                    <td><?=$i?>
                    <td><?=$assignment['title']?></td>
                    <td>
                        <?=$assignment['description']?>
                    </td>
                    <td><?=$assignment['date']?></td>
                    <td>
                        
                        <?php
                         $tbl_name = "assignment".$student['section_id'].'_'.$assignment['id'];
                         $sql = "SELECT * from ".$tbl_name." where student_id=?";
                          $stmt = $conn->prepare($sql);
                          $stmt->execute([$student_id]);
                          $submission = $stmt->fetch();
                         if($submission['status'] == 0)
                         {
                         ?>
                        <a href="assignment-submit.php?assignment_id=<?=$assignment['id']?>"
                           class="btn btn-warning">Submit Solution</a>
                         <?php
                         
                        }
                         else
                         {
                            echo "Already submitted";
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
             $("#navLinks li:nth-child(3) a").addClass('active');
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