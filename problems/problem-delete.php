<?php 
session_start();
if (isset($_SESSION['dsa_id']) && 
    isset($_SESSION['role'])) {

  if ($_SESSION['role'] == 'DSAAdmin') {
     include "../DB_connection.php";
      include "data/problems.php";

     $id = $_GET['problem_id'];
     $tbl_name = "problem".$id;
     if (removeProblem($id, $conn) && deleteProblem($tbl_name,$conn)) {
     	  $sm = "Successfully deleted!";
        header("Location: problems.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: problems.php?error=$em");
        exit;
     }


  }else {
    header("Location: problems.php");
    exit;
  } 
}else {
	header("Location: problems.php");
	exit;
} 