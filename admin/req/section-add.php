<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['section'])) {
    
    include '../../DB_connection.php';
    include '../data/section.php';
    $class_id = $_POST['class_id'];
    $section = $_POST['section'];
    
  if (empty($section)) {
		$em  = "Section is required";
		header("Location: ../class.php?error=$em");
		exit;
	}else {
        $uni = getUniqueSection($conn, $class_id, $section);
        if($uni == TRUE)
        {
          $em  = "Section name already exists";
          header("Location: ../class.php?error=$em");
		      exit;
        }
        $sql  = "INSERT INTO
                 section (section,class_id)
                 VALUES(?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$section, $class_id]);
        $sm = "New section created successfully";
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
