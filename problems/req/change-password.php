<?php 
session_start();
if (isset($_SESSION['dsa_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'DSAAdmin') {
    	

if (isset($_POST['new_pass'])   &&
    isset($_POST['c_new_pass']) &&
    isset($_POST['dsa_id'])) {
    
    include '../../DB_connection.php';
    include "../data/dsaadmin.php";

    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];

    $dsa_id = $_POST['dsa_id'];
    
    $data = 'dsa_id='.$dsa__id.'#change_password';

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

        $sql = "UPDATE dsa_admin SET
                password = ?
                WHERE dsa_id=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_pass, $dsa_id]);
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
