<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/study.php";
       include "data/section.php";
       include "data/class.php";
       $studies = getAllStudy($conn);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Study Material</title>
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
      <a href="add-study-material.php"
           class="btn btn-dark">Add New Study Material</a>
      <?php
        if ($studies != 0) {
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
                    <th scope="col">Date</th>
                    <th scope="col">Class</th>
                    <th scope="col">View</th>
                    <th scope="col">Download</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 0; foreach ($studies as $study ) { 
                    $i++;  ?>
                  <tr>
                    <td><?=$i?></td>
                    <td>
                        <?=$study['title']?>
                      </a>
                    </td>
                    <td><?=$study['date']?></td>
                    <td><?php
                    
                        $class_id = $study['class'];
                        if($class_id == 0)
                        {
                            echo "All classes";
                        }
                        else
                        {
                            $class = getClassById($class_id, $conn);
                            echo $class['class_name'];
                        }
                    ?></td>
                    <td><a href="../uploads/<?php echo $study['title']; ?>" class="btn btn-primary" target="_blank">View</a></td>
                    <td><a href="../uploads/<?php echo $study['title']; ?>" class="btn btn-success" download>Download</td>
                    <td><a href="study-delete.php?id=<?=$study['id']?>&file=<?=$study['title']?>"
                           class="btn btn-danger">Delete</a>
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