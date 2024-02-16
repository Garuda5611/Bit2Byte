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
function getAllProblemStudents($tbl_name, $conn)
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

function getAllProblemStudentsSection($tbl_name, $section, $conn)
{
    $sql  = "SELECT * from ".$tbl_name." where section_id=? order by roll_no";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$section]);
    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
      }else {
          return 0;
      }
}

function removeProblem($id, $conn){
    $sql  = "DELETE FROM problems
            WHERE problem_id=?";
    $stmt = $conn->prepare($sql);
    $re   = $stmt->execute([$id]);
    if ($re) {
      return 1;
    }else {
     return 0;
    }
 }

 function deleteProblem($tbl_name, $conn){
    $sql  = "DROP TABLE ".$tbl_name;
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute();
    if($re)
        return 1;
    else
        return 0;
 }
?>