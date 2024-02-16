<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
            $assignment_id = $_POST['assignment_id'];
            $submission = $_POST['submission'];
            $tbl_name = $_POST['tbl_name'];
            $student_id = $_POST['student_id'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student</title>
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
        
     <a href="assignment-view.php?assignment_id=<?=$assignment_id?>" class="btn btn-dark">Go Back</a><br/><br/>
        <div class="card" style="height:100%;">
         <p style="font-size:18px;"><?=$submission;?></p>
    </div>
      
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
        <br/>
    <?php
      $sql  = "SELECT * from ".$tbl_name." where student_id=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$student_id]);
      $std = $stmt->fetch();
      if($std['marks'] != -1)
      {
        echo "Marks already Assigned";
      }
      else
      {
        ?>
          <form action="req/assign-marks.php" method="POST">
                        <input type="hidden" value="<?=$student_id?>" name="student_id">
                        <input type="hidden" value="<?=$tbl_name?>" name="tbl_name">
                        <input type="text" placeholder="Enter Marks" name="marks"><br/><br/>
                        <input type="submit" value="Assign Marks" class="btn btn-success">
                        </form>
        <?php
      }
    ?>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(4) a").addClass('active');
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