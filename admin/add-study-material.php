<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
      
        include "../DB_connection.php";
        include "data/class.php";
        include "data/section.php";
        $classes = getAllClasses($conn);
        $sections = getAllSections($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Add Study Material</title>
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
        <a href="study-material.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/add-study-material.php"
              name="std" enctype="multipart/form-data">
        <h3>Add New Student</h3><hr>
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
          <label class="form-label">Class</label>
          <div class="row row-cols-5">
            &nbsp
          <select class="form-control" name="classes" id="classes">
          
          <option value='0'>All</option>
            <?php foreach ($classes as $class): 
              
              ?>

                <option value="<?=$class["class_id"]?>"><?=($class["class_name"])?></option>
            <?php endforeach ?>   
            
            </select>
          </div>
        </div>
        <div class="mb-3">
        <label class="form-label">Select file to upload</label>
        <br/><input type="file" name="file1" class="form-control"/>
            </div>
      <button type="submit" class="btn btn-primary">Add</button>
     </form>
     </div>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(6) a").addClass('active');
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