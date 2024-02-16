<?php
function getAllNotice($conn)
{
    $sql  = "SELECT * from notice";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
      }else {
          return 0;
      }
}
function removeNotice($id, $conn){
    $sql  = "DELETE FROM notice
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