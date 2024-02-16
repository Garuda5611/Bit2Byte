<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['assignment_id'])) {

  if ($_SESSION['role'] == 'Teacher') {
     include "../DB_connection.php";
      include "data/assignment.php"; 
      include "data/teacher.php";

     $id = $_GET['assignment_id'];
     $teacher = getTeacherById($_SESSION['teacher_id'],$conn);
     $section_id = $teacher['section'];
     $tbl_name = "assignment".$section_id.'_'.$id;
     if (removeAssignment($id, $conn) && deleteAssignment($tbl_name,$conn)) {
     	  $sm = "Successfully deleted!";
        header("Location: assignment.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: assignment.php?error=$em");
        exit;
     }


  }else {
    header("Location: assignment.php");
    exit;
  } 
}else {
	header("Location: assignment.php");
	exit;
} 