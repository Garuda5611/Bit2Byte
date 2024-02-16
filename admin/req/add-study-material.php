<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	
    
    include '../../DB_connection.php';

    $class_id = $_POST['classes'];
    $filename = $_FILES['file1']['name'];
  if ($filename == ''){
		$em  = "Title is required";
		header("Location: ../add-study-material.php?error=$em");
		exit;
	}else {
       
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $allowed = ['pdf', 'doc', 'docx'];
            if (in_array($ext, $allowed))
            {
                $path = '../../uploads/';
                $created = @date('Y-m-d H:i:s');
                move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
                $sql = "INSERT INTO study(title,class,date) values(?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$filename, $class_id, $created]);
                $sm = "New study material added successfully";
                header("Location: ../add-study-material.php?success=$sm");
                exit;
            }
            else
            {
                $em = "Select file with .pdf / .doc / .docx extension";
                header("Location: ../add-study-material.php?error=$em");
                exit;
            }
        }
	

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
