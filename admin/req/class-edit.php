<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (
    isset($_POST['class_id']) && isset($_POST['class_name'])) {
    
    include '../../DB_connection.php';

    $class_id = $_POST['class_id'];
    $class_name = $_POST['class_name'];
    $data = 'class_id='.$class_id;

    if (empty($class_id)) {
        $em  = "Class id is required";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else if (empty($class_name)) {
        $em  = "Class name is required";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else {
        // check if the class already exists
        $sql_check = "SELECT * FROM class WHERE class_name = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$class_name]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "The class already exists";
           header("Location: ../class-edit.php?error=$em&$data");
           exit;
        }else {

            $sql  = "UPDATE class SET class_name=?
                     WHERE class_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$class_name, $class_id]);
            $sm = "Class updated successfully";
            header("Location: ../class-edit.php?success=$sm&$data");
            exit;
       }
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../class.php?error=$em");
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
