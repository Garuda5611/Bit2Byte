<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['notice_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/notice.php";

     $id = $_GET['notice_id'];
     if (removeNotice($id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: notice.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: notice.php?error=$em");
        exit;
     }


  }else {
    header("Location: notice.php");
    exit;
  } 
}else {
	header("Location: notice.php");
	exit;
} 