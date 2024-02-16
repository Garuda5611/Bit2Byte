<?php 
session_start();
if (isset($_SESSION['dsa_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'DSAAdmin') {
      include "../../DB_connection.php";

if (
    isset($_POST['title']) && isset($_POST['description'])) {
    
    include '../../DB_connection.php';

    $title = $_POST['title'];
    $description = $_POST['description'];
    $topic = $_POST['topic'];
    $difficulty = $_POST['difficulty'];
    $tcip1 = $_POST['tcip1'];
    $tcip2 = $_POST['tcip2'];
    $tcip3 = $_POST['tcip3'];
    $tcip4 = $_POST['tcip4'];
    $tcip5 = $_POST['tcip5'];

    $tcop1 = $_POST['tcop1'];
    $tcop2 = $_POST['tcop2'];
    $tcop3 = $_POST['tcop3'];
    $tcop4 = $_POST['tcop4'];
    $tcop5 = $_POST['tcop5'];

  if (empty($title)) {
		$em  = "Title is required";
		header("Location: ../problem-add.php?error=$em");
		exit;
	}
    else if (empty($description)) {
		$em  = "Description is required";
		header("Location: ../problem-add.php?error=$em");
		exit;
	}
  else if (empty($tcip1) && empty($tcip2) && empty($tcip3) && empty($tcip4) && empty($tcip5)) {
		$em  = "Please enter all test case inputs";
		header("Location: ../problem-add.php?error=$em");
		exit;
	}
  else if (empty($tcop1) && empty($tcop2) && empty($tcop3) && empty($tcop4) && empty($tcop5)) {
		$em  = "Please enter all test case outputs";
		header("Location: ../problem-add.php?error=$em");
		exit;
	}
  else if($topic == '0')
  {
    $em  = "Please select valid topic";
		header("Location: ../problem-add.php?error=$em");
		exit;
  }
  else if($difficulty == '0')
  {
    $em  = "Please select valid difficulty";
		header("Location: ../problem-add.php?error=$em");
		exit;
  }
  else {
        $test_cases_ip = $tcip1.'|'.$tcip2.'|'.$tcip3.'|'.$tcip4.'|'.$tcip5;
        $test_cases_op = $tcop1.'|'.$tcop2.'|'.$tcop3.'|'.$tcop4.'|'.$tcop5;
        $sql  = "INSERT INTO
                 problems(title,description,test_cases_ip,test_cases_op,topic,difficulty)
                 VALUES(?,?,?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $date = date('d-m-Y');
          $stmt->execute([$title, $description, $test_cases_ip, $test_cases_op, $topic, $difficulty]);

          $sql = "SELECT * FROM problems ORDER BY problem_id DESC LIMIT 1";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $last = $stmt->fetch();

          $tbl_name = "problem".$last['problem_id'];

          $sql = "CREATE TABLE ".$tbl_name." AS (SELECT student_id,roll_no,fname,lname,section_id from students)";
          $stmt = $conn->prepare($sql);
          $stmt->execute();


          $sql = "ALTER TABLE ".$tbl_name." ADD PRIMARY KEY (student_id)";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sql = "ALTER TABLE ".$tbl_name." ADD status INT DEFAULT 0";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sql = "ALTER TABLE ".$tbl_name." ADD submission VARCHAR(700) DEFAULT ''";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sql = "ALTER TABLE ".$tbl_name." ADD recent_submission VARCHAR(700) DEFAULT ''";
          $stmt = $conn->prepare($sql);
          $stmt->execute();

          $sql = "ALTER TABLE ".$tbl_name." ADD language VARCHAR(10) DEFAULT ''";
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $sm = "New problem added successfully";
          header("Location: ../problem-add.php?success=$sm");
          exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../problem-add.php?error=$em");
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
