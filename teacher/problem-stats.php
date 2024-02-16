<?php
 
 include "../DB_connection.php";
 include "data/student.php";
 $student_id = $_POST['student_id'];
 $student = getStudentById($student_id, $conn);
 $sql = "select * from problems";
 $stmt = $conn->prepare($sql);
 $res = $stmt->execute();
 $cnt = $stmt->rowCount();
 $dis = 0;
 if($cnt - $student['problems_solved']<=0)
 {
    $dis = 0;
 }
 else
 {
    $dis = $cnt - $student['problems_solved'];
 }
 $solved = array(
	array("label"=> "Solved", "y"=> $student['problems_solved'])
);
 
$unsolved = array(
	array("label"=> "Solved", "y"=> $dis)
);
$dataPoints = array( 
	array("label"=>"Unsuccessful submissions", "y"=>$student['total_submissions'] - $student['successful_submissions']),
	array("label"=>"Successful submissions", "y"=>$student['successful_submissions'])
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Students - Stats</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.jpeg">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
window.onload = function () {
 
    var chart = new CanvasJS.Chart("chartContainer", {
     exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Total Submissions: <?=$student['total_submissions']?>"
	},
	data: [{
		type: "pie",
		yValueFormatString: "#",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

 var chart1 = new CanvasJS.Chart("chartContainer1", {
     animationEnabled: true,
     exportEnabled: true,
     theme: "light2", // "light1", "light2", "dark1", "dark2"
     axisX:{
         reversed: true
     },
     axisY:{
         includeZero: true
     },
     toolTip:{
         shared: true
     },
     data: [{
         type: "stackedBar",
         name: "Solved Problems",
         dataPoints: <?php echo json_encode($solved, JSON_NUMERIC_CHECK); ?>
     },{
         type: "stackedBar",
         name: "Unsolved Problems",
         dataPoints: <?php echo json_encode($unsolved, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart1.render();
  
 }
</script>
</head>
<body>

<?php 
session_start();
if (isset($_SESSION['teacher_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
 ?>
    <?php 
    include "header.php";
        include "inc/navbar.php";
        
      ?>
      
     <div class="container mt-5" style="min-height:70vh;">
        
     <a href="student-problem-stats.php"
           class="btn btn-dark">Go Back</a>
           
     <br/><br/><h3>Student report</h3>
     <div class="box2 shadow p-3 mt-5">
                <div class="mb-3">
                <strong>Roll No : </strong><span><?=$student['roll_no']?></span><br/>
                <strong>Name : </strong><?=$student['fname'].' '.$student['lname']?><br/>
                <strong>Total Problems Solved : </strong><?=$student['problems_solved']?><br/>
                <strong>Total Submissions : </strong><?=$student['total_submissions']?><br/>
                <strong>Total Successful Submissions : </strong><?=$student['successful_submissions']?><br/>
                <?php
                if($student['total_submissions'] == 0)
                {
                    echo "<strong>Accuracy</strong> : 0";
                }
                else
                {
                ?>
                <strong>Accuracy</strong> : <?= ($student['successful_submissions'] / $student['total_submissions']) * 100;?>%
                <?php

                }?>
    </div>
    </div>
    <div class="box2 shadow p-3 mt-5">
                <div class="mb-3">
                <h4>Problem stats</h4>
                
                <div id="chartContainer1" style="height: 370px; width: 70%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </div>
    </div>
    <div class="box2 shadow p-3 mt-5">
                <div class="mb-3">
                <h4>Submission stats</h4>
                <div id="chartContainer" style="height: 370px; width: 70%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </div>
    </div>
     </div><br/>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
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