<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (
    isset($_POST['title']) && isset($_POST['description'])) {
    
    include '../../DB_connection.php';

    $title = $_POST['title'];
    $description = $_POST['description'];

  if (empty($title)) {
		$em  = "Title is required";
		header("Location: ../notice-add.php?error=$em");
		exit;
	}
    else if (empty($description)) {
		$em  = "Notice is required";
		header("Location: ../notice-add.php?error=$em");
		exit;
	}else {
        $sql  = "INSERT INTO
                 notice(title,description,date)
                 VALUES(?,?,?)";
          $stmt = $conn->prepare($sql);
          $date = date('Y-m-d H:i:s');
          $time = time();
          $stmt->execute([$title, $description, $date.' '.$time]);
          $sm = "New notice added successfully";
          header("Location: ../notice-add.php?success=$sm");
          exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../notice-add.php?error=$em");
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
