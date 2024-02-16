<nav class="navbar navbar-expand-lg" style="background-color: #4d7985;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"
          id="navLinks">
        <li class="nav-item">
          <a class="nav-link" 
             aria-current="page" 
             href="index.php" style="color: #fff;">Dashboard</a>
        </li>  
        <?php
          include "../DB_connection.php";
          $teacher_id = $_SESSION['teacher_id'];
          $sql = "SELECT * FROM teachers
                        WHERE teacher_id=?";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$teacher_id]);
          $teacher = $stmt->fetch();
          if($teacher['section'] != '')
          {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="student.php" style="color: #fff;">View Students</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="problems.php" style="color: #fff;">Problem Status</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="assignment.php" style="color: #fff;">Assignment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="study-material.php" style="color: #fff;">Study Material</a>
        </li>
        
        <?php
          }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="notice.php" style="color: #fff;">Notice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="teacher-view.php" style="color: #fff;">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="change-password.php" style="color: #fff;">Change Password</a>
        </li>
      </ul>
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="../logout.php" style="color: #fff;">Logout</a>
        </li>
      </ul>
  </div>
    </div>
</nav>
