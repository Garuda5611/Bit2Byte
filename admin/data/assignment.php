<?php
function getAssignments($section, $conn)
{
    $sql  = "SELECT * from assignment where section_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$section]);
    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
      }else {
          return 0;
      }
}

?>