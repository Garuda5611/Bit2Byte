<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
    	

if (
    isset($_POST['marks'])) {
    
    include '../../DB_connection.php';

    $marks = $_POST['marks'];
    $student_id = $_POST['student_id'];
    $tbl_name = $_POST['tbl_name'];
  if (empty($marks)) {
		$em  = "Marks are required";
		header("Location: ../notice-add.php?error=$em");
		exit;
	}else {
        $sql  = "UPDATE ".$tbl_name." SET marks=? where student_id=?";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$marks, $student_id]);
          $sm = "Marks assigned successfully";
          header("Location: ../assignment.php?success=$sm");
          exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../assignment.php?error=$em");
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
