<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['student_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/student.php";

     $id = $_GET['student_id'];

     $student = getStudentById($id, $conn);
     if (removeStudent($id, $conn)) {
     	$sm = "Student Successfully deleted!";
        header("Location: class.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: class.php?error=$em");
        exit;
     }


  }else {
    header("Location: class.php");
    exit;
  } 
}else {
	header("Location: class.php");
	exit;
} 