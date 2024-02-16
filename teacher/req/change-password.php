<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
    	

if (isset($_POST['new_pass'])   &&
    isset($_POST['c_new_pass']) &&
    isset($_POST['teacher_id'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";
    include "../data/admin.php";

    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];

    $teacher_id = $_POST['teacher_id'];
    
    $data = 'teacher_id='.$teacher_id.'#change_password';

    if (empty($new_pass)) {
		$em  = "New password is required";
		header("Location: ../change-password.php?perror=$em&$data");
		exit;
	}else if (empty($c_new_pass)) {
		$em  = "Confirmation password is required";
		header("Location: ../change-password.php?perror=$em&$data");
		exit;
	}else if ($new_pass !== $c_new_pass) {
        $em  = "New password and confirm password does not match";
        header("Location: ../change-password.php?perror=$em&$data");
        exit;
    }else {
        // hashing the password
        $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = "UPDATE teachers SET
                password = ?
                WHERE teacher_id=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_pass, $teacher_id]);
        $sm = "The password has been changed successfully!";
        header("Location: ../change-password.php?psuccess=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../change-password.php?error=$em&$data");
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
