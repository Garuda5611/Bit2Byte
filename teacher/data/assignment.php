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
function getAllAssignmentStudents($tbl_name, $conn)
{
    $sql  = "SELECT * from ".$tbl_name." order by roll_no";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
      }else {
          return 0;
      }
}

function removeAssignment($id, $conn){
    $sql  = "DELETE FROM assignment
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $re   = $stmt->execute([$id]);
    if ($re) {
      return 1;
    }else {
     return 0;
    }
 }

 function deleteAssignment($tbl_name, $conn){
    $sql  = "DROP TABLE ".$tbl_name;
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute();
    if($re)
        return 1;
    else
        return 0;
 }
?>