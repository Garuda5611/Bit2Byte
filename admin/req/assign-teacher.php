<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['teacher_id'])) {
    
    include '../../DB_connection.php';
    include '../data/section.php';
    $section_id = $_POST['section_id'];
    $teacher_id = $_POST['teacher_id'];
    
    $section = getSectionById($section_id, $conn);
  if (empty($section_id) || empty($teacher_id) || $teacher_id == 0) {
		$em  = "Teacher is required";
		header("Location: ../class.php?error=$em");
		exit;
	}
    else if($section['teacher'] != 0)
    {
        $em  = "Teacher is already assigned please update";
        header("Location: ../class.php?error=$em");
        exit;
    }
        else {
        $sql  = "UPDATE teachers SET section=? where teacher_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$section_id, $teacher_id]);
        $sql  = "UPDATE section SET teacher=? where section_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$teacher_id, $section_id]);
        $sm = "Class Teacher Assigned Successfully";
        header("Location: ../class.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../class.php?error=$em");
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
