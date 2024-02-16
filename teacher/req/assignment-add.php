<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
    	include "../data/teacher.php";
      include "../../DB_connection.php";
      $teacher = getTeacherById($_SESSION['teacher_id'], $conn);

if (
    isset($_POST['title']) && isset($_POST['description'])) {
    
    include '../../DB_connection.php';

    $title = $_POST['title'];
    $description = $_POST['description'];

  if (empty($title)) {
		$em  = "Title is required";
		header("Location: ../assignment-add.php?error=$em");
		exit;
	}
    else if (empty($description)) {
		$em  = "Description is required";
		header("Location: ../assignment-add.php?error=$em");
		exit;
	}else {
        $sql  = "INSERT INTO
                 assignment(title,description,section_id,date)
                 VALUES(?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $date = date('d-m-Y');
          $stmt->execute([$title, $description, $teacher['section'], $date]);


          $sql = "SELECT * FROM assignment ORDER BY id DESC LIMIT 1";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $last = $stmt->fetch();

          $tbl_name = "assignment".$teacher['section'].'_'.$last['id'];

          $sql = "CREATE TABLE ".$tbl_name." AS (SELECT student_id, roll_no, fname, lname from students where section_id=?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$teacher['section']]);


          $sql = "ALTER TABLE ".$tbl_name." ADD PRIMARY KEY (student_id)";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sql = "ALTER TABLE ".$tbl_name." ADD status INT DEFAULT 0";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sql = "ALTER TABLE ".$tbl_name." ADD submission VARCHAR(500) DEFAULT ''";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sql = "ALTER TABLE ".$tbl_name." ADD marks INT DEFAULT -1";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sm = "New assignment added successfully";
          header("Location: ../assignment-add.php?success=$sm");
          exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../assignment-add.php?error=$em");
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
