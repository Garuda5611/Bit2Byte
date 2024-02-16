<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['section_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/section.php";

     $id = $_GET['section_id'];
     if (removeSection($id, $conn)) {
     	$sm = "Successfully deleted!";
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