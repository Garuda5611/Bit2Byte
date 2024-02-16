<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['student_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/student.php";
     include "data/assignment.php";
     include "data/problems.php";
     $id = $_GET['student_id'];
     $student = getStudentById($id, $conn);
     if (removeStudent($id, $conn)) {
      $assignments = getAssignments($student['section_id'],$conn);
      foreach($assignments as $assignment)
      {
         $tbl_name = "assignment".$student['section_id'].'_'.$assignment['id'];
         $sql = "delete from ".$tbl_name." where student_id=?";
         $stmt = $conn->prepare($sql);
         $stmt->execute([$id]);
      }
      $problems = getProblems($conn);
      foreach($problems as $problem)
      {
         $tbl_name = "problem".$problem['problem_id'];
         $sql = "delete from ".$tbl_name." where student_id=?";
         $stmt = $conn->prepare($sql);
         $stmt->execute([$id]);
      }
     	$sm = "Successfully deleted!";
      header("Location: student.php?success=$sm");
      exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: student.php?error=$em");
        exit;
     }


  }else {
    header("Location: student.php");
    exit;
  } 
}else {
	header("Location: student.php");
	exit;
} 