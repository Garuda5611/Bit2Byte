<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['teacher_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/teacher.php";

     $id = $_GET['teacher_id'];
     $teacher = getTeacherById($id, $conn);
     if (removeTeacher($id, $conn)) {
      $sql ="UPDATE section set teacher=? where section_id=?";
      $stmt = $conn->prepare($sql);
      $stmt->execute(['0',$teacher['section']]);
     	$sm = "Successfully deleted!";
        header("Location: teacher.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: teacher.php?error=$em");
        exit;
     }


  }else {
    header("Location: teacher.php");
    exit;
  } 
}else {
	header("Location: teacher.php");
	exit;
} 