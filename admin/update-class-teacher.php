<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      $section_id = $_GET['section_id'];
      include '../DB_connection.php';
      include 'data/teacher.php';

      $teachers = getAvailableTeachers($conn);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Update Class Teacher</title>
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
     <div class="container mt-5" style="min-height:70vh;">
        <a href="class.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/update-class-teacher.php">
        <h3>Update Class Teacher</h3><hr>
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
          <label class="form-label">Select Teacher</label>
          <div class="row row-cols-5">

          <select class="form-content" name="teacher_id">
          
          <option value='0'>Select Teacher</option>
            <?php foreach ($teachers as $teacher): 
            ?>

                <option value="<?=$teacher["teacher_id"]?>"><?=($teacher["fname"].' '.$teacher["lname"])?></option>
            <?php endforeach ?>   
            
            </select>
          </div>
        </div>
        <div class="mb-3">
          <input type="hidden" value="<?=$section_id?>" name="section_id">
        </div>
      <button type="submit" class="btn btn-primary">Update Teacher</button>
     </form>
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