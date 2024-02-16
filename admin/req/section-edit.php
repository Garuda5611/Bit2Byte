<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['section']) &&
    isset($_POST['section_id'])) {
    
    include '../../DB_connection.php';
    include '../data/section.php';
    $section = $_POST['section'];
    $section_id = $_POST['section_id'];
    $tmpsession = getSectionById($section_id, $conn);
    $class_id = $tmpsession['class_id'];
    $data = 'section_id='.$section_id;

    if (empty($section)) {
        $em  = "Section is required";
        header("Location: ../section-edit.php?error=$em&$data");
        exit;
    }else {
        $uni = getUniqueSection($conn, $class_id, $section);
        if($uni == TRUE)
        {
          $em  = "Section name already exists";
          header("Location: ../class.php?error=$em");
		      exit;
        }

        $sql  = "UPDATE section SET section=?
                 WHERE section_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$section, $section_id]);
        $sm = "Section updated successfully";
        header("Location: ../section-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../section.php?error=$em");
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
