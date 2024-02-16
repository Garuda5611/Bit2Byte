<?php 

function getAdminById($id, $conn){
   $sql = "SELECT * FROM dsa_admin
           WHERE dsa_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   }else {
    return 0;
   }
}

?>