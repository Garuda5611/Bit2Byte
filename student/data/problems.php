<?php
function getProblems($conn)
{
    $sql  = "SELECT * from problems order by problem_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() >= 1) {
        $problems = $stmt->fetchAll();
        return $problems;
      }else {
          return 0;
      }
}
function getProblemById($problem_id, $conn)
{
    $sql  = "SELECT * from problems where problem_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$problem_id]);
    if ($stmt->rowCount() >= 1) {
        $problems = $stmt->fetch();
        return $problems;
      }else {
          return 0;
      }
}
function getStudentByProblem($tbl_name, $student_id, $conn)
{
    $sql  = "SELECT * from ".$tbl_name." where student_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$student_id]);
    if ($stmt->rowCount() >= 1) {
        $problems = $stmt->fetch();
        return $problems;
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
        $problems = $stmt->fetchAll();
        return $problems;
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