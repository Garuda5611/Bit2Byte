<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (
    isset($_POST['class_name'])) {
    
    include '../../DB_connection.php';

    $class_name = $_POST['class_name'];

  if (empty($class_name)) {
		$em  = "class is required";
		header("Location: ../class-add.php?error=$em");
		exit;
	}else {
        // check if the class already exists
        $sql_check = "SELECT * FROM class where class_name=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$class_name]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "The class already exists";
           header("Location: ../class-add.php?error=$em");
           exit;
        }else {
          $sql  = "INSERT INTO
                 class(class_name)
                 VALUES(?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$class_name]);
          $sm = "New class created successfully";
          header("Location: ../class-add.php?success=$sm");
          exit;
        } 
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../class-add.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
