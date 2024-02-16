<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['section_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/section.php";

     $id = $_GET['section_id'];
    
     $section = getSectionById($id, $conn);
     $teacher_id = $section['teacher'];
     $sql  = "UPDATE section SET teacher=?
                     WHERE section_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute(['0', $id]);
    $sql = "UPDATE teachers SET section=? WHERE teacher_id=?";

    $stmt = $conn->prepare($sql);
    $re2 = $stmt->execute(['',$teacher_id]);
    

     if ($re && $re2) {
     	$sm = "Successfully removed!";
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
?>