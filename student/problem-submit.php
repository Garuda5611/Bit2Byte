<html>
<head>
<meta charset="UTF-8">
    <title>Practice</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.0/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.0/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.0/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.0/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.0/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.0/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.0/mode/php/php.min.js"></script>
    <style>
        .CodeMirror {
            height: 100% fixed;
            border: 1px solid #ccc;
        }
        .container {
        display: flex;
        flex-direction: row;
    }
    
    .box1 {
        width: 50%;
    }
    
    .box2 {
        width: 50%;
    }
    
    @media screen and (max-width: 800px) {
        .container {
            flex-direction: column;
        }
        
        .box1, .box2 {
            width: 100%;
        }
        .CodeMirror {
            height: 290px fixed;
            border: 1px solid #ccc;
        }
    }
    </style>
</head>
<body>
<?php 
session_start();
if (isset($_SESSION['student_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Student') {
      
       include "../DB_connection.php";
        include "data/problems.php";
        include "data/student.php";

        $student_id = $_SESSION['student_id'];
        $student = getStudentById($student_id,$conn);
        $problem_id = $_GET['problem_id'];
        $problem = getProblemById($problem_id, $conn);
        $tbl_name = "problem".$problem['problem_id'];
        $std_submission = getStudentByProblem($tbl_name, $student_id, $conn);
        $test_case_ip = $problem['test_cases_ip'];
        $test_case_op = $problem['test_cases_op'];
        $tst_ip_arr = explode("|",$test_case_ip);
        $tst_op_arr = explode("|",$test_case_op);

        $sol = '';
        if (isset($_GET['sol'])) $sol = $_GET['sol'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Submit problem</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php   
        include "header.php";
        include "inc/navbar.php";
     ?>
     <br/>
      <div class="container">
     <div class="mb-3">
     <a href="problems.php"
           class="btn btn-dark">Go Back</a>
    </div>
    </div>
        <div class="container" style="min-height:70vh;">
          
                <div class="box1">

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/problem-submit.php"
              name="std">
        <h3><?= $problem['title']?></h3><hr>
        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger" role="alert">
           <?=$_GET['error']?>
          </div>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success" role="alert">
           <?=$_GET['success']?>
          </div>
        <?php } ?>
                    <p><?=$problem['description']?></p>
                    <h4 style="font-size : 17px;">Difficulty: </h4><p><?=$problem['difficulty']?></p>
                    <h4 style="font-size : 17px;">Sample Test Cases</h4>
                    <h4 style="font-size : 14px;">Test Case #1</h4>
                    <p>Input : <?=$tst_ip_arr[0]?></p>
                    <p>Output : <?=$tst_op_arr[0]?></p>
                    <h4 style="font-size : 14px;">Test Case #2</h4>
                    <p>Input : <?=$tst_ip_arr[1]?></p>
                    <p>Output : <?=$tst_op_arr[1]?></p>
                <hr/>

                <h4 style="font-size : 14px;">Note : </h4>
                <p>For java class name should be Main</p>
                  
        <input type="hidden" value="<?=$tbl_name?>" name="tbl_name">
        <input type="hidden" value="<?=$problem_id?>" name="problem_id">
        <input type="hidden" value="<?=$student_id?>" name="student_id">

     </div>
          <div class="box2 shadow p-3 mt-5">
                <div class="mb-3">
                    <select class="form-control" name="language" id="language">
                    <option value='0'>Select Language</option>
                    <option value='1'>C++</option>
                    <option value='2'>Java</option>
                    <option value='3'>Python</option>
                  </select>
              </div>
                  <textarea id="code" name="code"><?=$std_submission['recent_submission']?></textarea>

                  <script>
                      var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
                          mode: "application/x-httpd-php",
                          lineNumbers: true,
                          tabSize: 4,
                          indentWithTabs: true,
                          matchBrackets: true,
                          autoCloseBrackets: true
                      });
                  </script><br/>
              <button type="submit" class="btn btn-primary">Submit</button>
        
        
              </form><br/><br/>    
        <?php
                    if($std_submission['status'] == '1')
                    {
                        ?>
                        <form action="problem-submission-view.php" method="POST" target="_blank">
                        <input type="hidden" value="<?=$problem_id?>" name="problem_id">
                        <input type="submit" value="Accepted Solution" class="btn btn-success" >
                        </form>
                        <?php
                    }
                    else
                    {
                    ?>
                        <form action="problem-submission-view.php" method="POST">
                        <input type="submit" value="Accepted Solution" class="btn btn-success" disabled>
                        </form>
                    <?php
                    }
                  ?>
        </div>
        </div>
        <br/>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });

        var gBtn = document.getElementById('gBtn');
        gBtn.addEventListener('click', function(e){
          e.preventDefault();
          makePass(4);
        });
        </script>
<br/><br/>
    <?php
    include "footer.php"
    ?>
</body>
</html>
<?php 

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>
</body>
</html>