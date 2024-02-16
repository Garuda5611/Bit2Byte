<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "../admin/data/section.php";
       include "../admin/data/class.php";
       include "../admin/data/teacher.php";
       $sections = getAllSections($conn);
       $class_id = $_GET["class_id"];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Class</title>
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
        if ($sections != 0) {
     ?>
     <div class="container mt-5" style="min-height:70vh;">
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
            <?php
                $class = getClassById($class_id, $conn);
            ?>
            <h1>
            <?php

              $class["class_name"];
            
            ?>
          </h1>
          
     <a href="section-add.php?class_id=<?=$class_id?>"
           class="btn btn-dark">Add New Section</a>
           <a href="class.php"
           class="btn btn-dark">Go Back</a>
           <div class="table-responsive">
              <table class="table table-bordered mt-3 n-table">
                <thead>
                  <tr>
                    <th scope="col">Section</th>
                    <th scope="col">Class Teacher</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($sections as $section ) { 
                    $i++;  
                    if($section["class_id"] == $class_id)
                    {
                        ?>
                  <tr>
                    <td>
                      <?php 
                            echo $section["section"];
                       ?>
                    </td>
                    <td>
                      <?php
                        $teacher_id = $section['teacher'];
                        $teacher = getTeacherById($teacher_id, $conn);
                        if($teacher == 0)
                          echo 'No teacher allocated';
                        else
                          echo $teacher['fname'].' '.$teacher['lname'];
                        ?>
                    </td>
                    <td>
                        <a href="view-section-student.php?section_id=<?=$section['section_id']?>&class_id=<?=$section['class_id']?>"
                           class="btn btn-danger">View</a> 
                           
                        <a href="section-edit.php?section_id=<?=$section['section_id']?>"
                           class="btn btn-warning">Edit Name</a>
                           
                        <a href="section-delete.php?section_id=<?=$section['section_id']?>"
                           class="btn btn-danger">Delete</a>

                        </td>
                        
                    </tr>
                        <?php }  }?>
                </tbody>
              </table>
           </div>
         <?php }else{ ?>
             <div class="alert alert-info .w-450 m-5" 
                  role="alert">
                Empty!
              </div>
         <?php } ?>
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