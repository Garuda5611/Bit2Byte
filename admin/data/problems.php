<?php
function getProblems($conn)
{
    $sql  = "SELECT * from problems order by problem_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
      }else {
          return 0;
      }
}

?>