<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
    	

if (isset($_POST['description'])) {
    
    include '../../DB_connection.php';
    $description = $_POST['description'];
    $tbl_name = $_POST['tbl_name'];
    $student_id = $_POST['student_id'];
    $assignment_id = $_POST['assignment_id'];
  if (empty($description)) {
		$em  = "Please write solution is required";
		header("Location: ../assignment-submit.php?assignment_id=$assignment_id&error=$em");
		exit;
	}
  else if(strlen($description)>500)
  {
    $em  = "Solution length should be 500 characters";
		header("Location: ../assignment-submit.php?assignment_id=$assignment_id&error=$em");
		exit;
  }
  else {
          $sql = "SELECT * from ".$tbl_name;
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          if($stmt->rowCount()>=1)
          {
            $submissions = $stmt->fetchAll();
            foreach($submissions as $submission)
            {
              if($submission['status'] != 0)
              {
                similar_text($description, $submission['submission'], $per);
                if($per > 60)
                {
                  $em = "Copied solution";
                  header("Location: ../assignment-submit.php?assignment_id=$assignment_id&error=$em");
                  exit;
                }
              }
            }
          }
          $sql  = "UPDATE ".$tbl_name." SET status = 1, submission=? where student_id=?";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$description, $student_id]);
          $sm = "Solution submitted successfully";
          header("Location: ../assignment.php?success=$sm");
          exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../assignment-submit.php?assignment_id=$assignment_id&error=$em");
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
