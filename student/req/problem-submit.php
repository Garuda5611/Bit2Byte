<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
    	

if (isset($_POST['code'])) {
    
    include '../../DB_connection.php';
    include "../data/problems.php";
    $code = $_POST['code'];
    $problem_id=$_POST['problem_id'];
    $tbl_name = $_POST['tbl_name'];
    $student_id = $_POST['student_id'];
    $language = $_POST['language'];
    $sql  = "select * from students where student_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$student_id]);
    $student = $stmt->fetch();
    $student_pro = getStudentByProblem($tbl_name, $student_id, $conn);
  if (empty($code)) {
		$em  = "Please write code";
		header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
		exit;
	}
  else if ($language=='0') {
    $sql  = "UPDATE ".$tbl_name." SET recent_submission=? where student_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$code, $student_id]);
		$em  = "Please select language";
		header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
		exit;
	}
  else {
          $language_id = '';
          if($language == '1')
          {
            $language_id = 'cpp';
          }
          else if($language == '2')
          {
            $language_id = 'java';
          }
          else
          {
            $language_id = 'python3';
          }
          include "../data/codeexecution.php";
          $problem = getProblemById($problem_id, $conn);
          $test_case_ip = $problem['test_cases_ip'];
          $test_case_op = $problem['test_cases_op'];
          $tst_ip_arr = explode("|",$test_case_ip);
          $tst_op_arr = explode("|",$test_case_op);
          $cnt = 0;
          for($x=0; $x<5;$x++)
          {
            $ip = $tst_ip_arr[$x];
            $op = $tst_op_arr[$x];
            $response = executeCodeJ($code, $language_id, $ip);
            $result = json_decode($response, true);
            //var_dump($response);
            $ori_out=trim($result['output']);
            //echo $ori_out[0];
            if($result['cpuTime'] > 2)
            {
              $sql  = "UPDATE ".$tbl_name." SET recent_submission=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$code, $student_id]);
              $sql  = "UPDATE students SET total_submissions=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$student['total_submissions']+1, $student_id]);
                $em = "Time Limit Exceeded";
                header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
                exit;
            }
            else if($ori_out == '')
            {
              $sql  = "UPDATE ".$tbl_name." SET recent_submission=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$code, $student_id]);
              $sql  = "UPDATE students SET total_submissions=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$student['total_submissions']+1, $student_id]);
              $em = '0/5 test cases passed';
              header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
              exit;
            }
            else if($language_id=='java' && $ori_out[0] == 'M')
            {
              $sql  = "UPDATE ".$tbl_name." SET recent_submission=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$code, $student_id]);
              $sql  = "UPDATE students SET total_submissions=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$student['total_submissions']+1, $student_id]);
              $ori_out = trim(preg_replace('/\s+/', ' ', $ori_out));
              $em = 'Error: '.$ori_out;
              header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
              exit;
            }
            else if(($language_id=='python3' && $ori_out[0] == 'F') || ($language_id=='python3' && $ori_out[0] == 'T'))
            {
              $sql  = "UPDATE ".$tbl_name." SET recent_submission=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$code, $student_id]);
              $sql  = "UPDATE students SET total_submissions=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$student['total_submissions']+1, $student_id]);
              $ori_out = trim(preg_replace('/\s+/', ' ', $ori_out));
              $em = 'Error: '.$ori_out;
              header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
              exit;
            }
            else if($language_id=='cpp' && $ori_out[0] == 'j')
            {
              $sql  = "UPDATE ".$tbl_name." SET recent_submission=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$code, $student_id]);
              $ori_out = trim(preg_replace('/\s+/', ' ', $ori_out));
              $sql  = "UPDATE students SET total_submissions=? where student_id=?";
              $stmt = $conn->prepare($sql);
              $stmt->execute([$student['total_submissions']+1, $student_id]);
              $em = 'Error: '.$ori_out;
              header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
              exit;
            }
            else if ($ori_out != $op) {
              //continue;
            }
            else{
                $cnt++;
            }
          }
          echo $cnt;
          if($cnt == 5)
          {
            $sql  = "UPDATE ".$tbl_name." SET status = 1, submission=?, recent_submission=?, language=? where student_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$code, $code, $language_id, $student_id]);
            if($student_pro['status'] == '1')
            {
                $sql  = "UPDATE students SET total_submissions=?, successful_submissions=? where student_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$student['total_submissions']+1,$student['successful_submissions']+1, $student_id]);
            }
            else
            {
                $sql  = "UPDATE students SET problems_solved=?, total_submissions=?, successful_submissions=? where student_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$student['problems_solved']+1, $student['total_submissions']+1,$student['successful_submissions']+1, $student_id]);
            }
            $sm = "Solution submitted successfully";
            header("Location: ../problem-submit.php?problem_id=$problem_id&success=$sm");
          }
          else
          {
            $sql  = "UPDATE ".$tbl_name." SET recent_submission=? where student_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$code, $student_id]);
            $sql  = "UPDATE students SET total_submissions=? where student_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$student['total_submission']+1, $student_id]);
            $em = $cnt."/5 Test Cases Passed";
            header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
          }
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../problem-submit.php?problem_id=$problem_id&error=$em");
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
