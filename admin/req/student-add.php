<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['fname']) &&
isset($_POST['rno']) &&
    isset($_POST['lname']) &&
    isset($_POST['username']) &&
    isset($_POST['pass'])     &&
    isset($_POST['address'])  &&
    isset($_POST['gender'])   &&
    isset($_POST['email_address']) &&
    isset($_POST['date_of_birth']) &&
    isset($_POST['classes']) ) {
    
    include '../../DB_connection.php';
    include "../data/student.php";
    include "../data/section.php";

    $fname = $_POST['fname'];
    $rno = $_POST['rno'];
    $lname = $_POST['lname'];
    $uname = $_POST['username'];
    $pass = $_POST['pass'];

    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email_address = $_POST['email_address'];
    $date_of_birth = $_POST['date_of_birth'];
    $section = $_POST['classes'];
    

    $data = 'uname='.$uname.'&fname='.$fname.'&lname='.$lname.'&address='.$address.'&gender='.$gender;

    if (empty($fname)) {
		$em  = "First name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($lname)) {
		$em  = "Last name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn)) {
		$em  = "Username is taken! try another";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($address)) {
        $em  = "Address is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($gender)) {
        $em  = "Gender is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($email_address)) {
        $em  = "Email address is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($date_of_birth)) {
        $em  = "Date of birth is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($section)) {
        $em  = "Section is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else {
        // hashing the password
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql  = "INSERT INTO
                 students(username, password, roll_no, fname, lname, class_id, section_id, address, gender, email_address, date_of_birth)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $sectionobj = getSectionById($section, $conn);
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $rno, $fname, $lname, $sectionobj["class_id"], $section, $address, $gender, $email_address, $date_of_birth]);
        
        include '../data/assignment.php';

        $sql = "SELECT * FROM students ORDER BY student_id DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $last = $stmt->fetch();


        $assignments = getAssignments($section,$conn);
        foreach($assignments as $assignment)
        {
          $tbl_name = 'assignment'.$section.'_'.$assignment['id'];
          $sql  = "INSERT INTO ".$tbl_name." (student_id,roll_no,fname,lname) values(?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$last['student_id'],$rno, $fname,$lname]);
        }
        include '../data/problems.php';

        $problems = getProblems($conn);
        foreach($problems as $problem)
        {
          $tbl_name = 'problem'.$problem['problem_id'];
          $sql  = "INSERT INTO ".$tbl_name." (student_id,roll_no,fname,lname,section_id) values(?,?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$last['student_id'],$rno,$fname,$lname,$section]);
        }
        $sm = "New student registered successfully";
        header("Location: ../student-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../student-add.php?error=$em");
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
