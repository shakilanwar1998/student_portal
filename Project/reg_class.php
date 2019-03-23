<?php
  require_once("PDO.php");

  $std_id = $_REQUEST["id"];
  $class = $_REQUEST["class"];
  $roll = $_REQUEST["roll"];
  $check_id = $connect->query("SELECT * FROM student_auth WHERE Student_ID ='$std_id'");

  while($id = $check_id->fetch(PDO::FETCH_OBJ))
  {
    $student_id = $id->id;
  }

  $insert = $connect->query("INSERT INTO student(roll,class,student_id) VALUES ($roll,$class,$student_id)");
  if($insert==true)
  {
    header("location:reg_confirm.php?reg_done?Registration Successfull.");
  }

?>
