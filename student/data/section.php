<?php  

// All Sections
function getAllSections($conn){
   $sql = "SELECT * FROM section order by section";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $sections = $stmt->fetchAll();
     return $sections;
   }else {
    return 0;
   }
}

function getUniqueSection($conn, $class_id, $section)
{
  $sql = "select * from section where class_id = ? and section=?";
  $stmt = $conn->prepare($sql);
   $stmt->execute([$class_id, $section]);
   if($stmt->rowCount()>=1)
    return True;
    else
    return False;
}
// Get Section by ID
function getSectionById($section_id, $conn){
   $sql = "SELECT * FROM section
           WHERE section_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$section_id]);

   if ($stmt->rowCount() == 1) {
     $section = $stmt->fetch();
     return $section;
   }else {
    return 0;
   }
}

// DELETE
function removeSection($id, $conn){
   $sql  = "DELETE FROM section
           WHERE section_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}