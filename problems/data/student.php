<?php 

// All Students 
function getAllStudents($conn){
   $sql = "SELECT * FROM students order by roll_no";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
   	return 0;
   }
}
function getAllSectionStudents($conn,$section_id, $class_id){
  $sql = "SELECT * FROM students where section_id=? and class_id=? order by roll_no";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$section_id, $class_id]);

  if ($stmt->rowCount() >= 1) {
    $students = $stmt->fetchAll();
    return $students;
  }else {
    return 0;
  }
}

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


// Get Student By Id 
function getStudentById($id, $conn){
   $sql = "SELECT * FROM students
           WHERE student_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   }else {
    return 0;
   }
}


function getClassById($class_id, $conn){
  $sql = "SELECT * FROM class
          WHERE class_id=?";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$class_id]);
  if ($stmt->rowCount() == 1) {
    $class = $stmt->fetch();
    return $class;
  }else {
   return 0;
  }
}


// Search 
function searchStudents($key, $conn){
   $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
   $sql = "SELECT * FROM students
           WHERE student_id LIKE ? 
           OR fname LIKE ?
           OR address LIKE ?
           OR email_address LIKE ?
           OR lname LIKE ?
           OR username LIKE ? order by roll_no";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key, $key, $key, $key, $key]);

   if ($stmt->rowCount() == 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
    return 0;
   }
}