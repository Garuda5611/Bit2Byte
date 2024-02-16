<?php 
session_start();
if (isset($_SESSION['dsa_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'DSAAdmin') {
      
       include "../DB_connection.php";


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Problem</title>
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
     <div class="container mt-5">
        <a href="problems.php"
           class="btn btn-dark">Go Back</a>

        <form method="post"
              class="shadow p-3 mt-5 form-w" 
              action="req/problem-add.php"
              name="std">
        <h3>Add New Problem</h3><hr>
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
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" 
                 class="form-control"
                 name="title">
        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea row=4 class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Topic</label>
          <select class="form-control" name="topic" id="topic">
          <option value='0'>Select Topic</option>
          <option value='Basic'>Basic</option>
          <option value='Array'>Array</option>
          <option value='Stack'>Stack</option>
          <option value='Queue'>Queue</option>
          <option value='Linked List'>Linked List</option>
          <option value='Graph'>Graph</option>
          <option value='Tree'>Tree</option>
        </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Difficulty</label>
          <select class="form-control" name="difficulty" id="difficulty">
          <option value='0'>Select Topic</option>
          <option value='Easy'>Easy</option>
          <option value='Medium'>Medium</option>
          <option value='Hard'>Hard</option>
        </select>
        </div>
        <h4>Please enter space for every new input and output</h4>
        <div class="mb-3">
          <h4>Test Case #1</h4>
        </div>
        <div class="mb-3">
          <label class="form-label">Input</label>
          <textarea row=4 class="form-control" name="tcip1"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Expected Output</label>
          <textarea row=4 class="form-control" name="tcop1"></textarea>
        </div>
        
        <div class="mb-3">
          <h4>Test Case #2</h4>
        </div>
        <div class="mb-3">
          <label class="form-label">Input</label>
          <textarea row=4 class="form-control" name="tcip2"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Expected Output</label>
          <textarea row=4 class="form-control" name="tcop2"></textarea>
        </div>
        <div class="mb-3">
          <h4>Test Case #3</h4>
        </div>
        <div class="mb-3">
          <label class="form-label">Input</label>
          <textarea row=4 class="form-control" name="tcip3"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Expected Output</label>
          <textarea row=4 class="form-control" name="tcop3"></textarea>
        </div>
        <div class="mb-3">
          <h4>Test Case #4</h4>
        </div>
        <div class="mb-3">
          <label class="form-label">Input</label>
          <textarea row=4 class="form-control" name="tcip4"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Expected Output</label>
          <textarea row=4 class="form-control" name="tcop4"></textarea>
        </div>
        <div class="mb-3">
          <h4>Test Case #5</h4>
        </div>
        <div class="mb-3">
          <label class="form-label">Input</label>
          <textarea row=4 class="form-control" name="tcip5"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Expected Output</label>
          <textarea row=4 class="form-control" name="tcop5"></textarea>
        </div>

        

      <button type="submit" class="btn btn-primary">Add</button>
     </form>
     </div>
     
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