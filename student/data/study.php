<?php
function getAllStudy($conn, $class)
{
    $sql  = "SELECT * from study where class = '0' or class=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$class]);
    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
      }else {
          return 0;
      }
}
function removeStudy($id, $conn){
    $sql  = "DELETE FROM study
            WHERE id=?";
    $stmt = $conn->prepare($sql);
    $re   = $stmt->execute([$id]);
    if ($re) {
      return 1;
    }else {
     return 0;
    }
 }
?>