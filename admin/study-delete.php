<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/study.php";

     $id = $_GET['id'];
     $title = $_GET['file'];
     if (removeStudy($id, $conn) && unlink('../uploads/'.$title)) {
     	$sm = "Successfully deleted!";
        header("Location: study-material.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: study-material.php?error=$em");
        exit;
     }


  }else {
    header("Location: study-material.php");
    exit;
  } 
}else {
	header("Location: study-material.php");
	exit;
} 