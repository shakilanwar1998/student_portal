<?php
  require_once("Connect.php");

  $std_id = $_REQUEST["id"];
  $class = $_REQUEST["class"];
  $roll = $_REQUEST["roll"];
  $check_id = "SELECT * FROM student_auth WHERE Student_ID ='$std_id'";

  $run_check_id = mysqli_query($connect,$check_id);

  while($id = mysqli_fetch_array($run_check_id))
  {
    $student_id = $id["id"];
  }

  $insert = "INSERT INTO student(roll,class,student_id) VALUES ($roll,$class,$student_id)";
  $run2 = mysqli_query($connect,$insert);

  if($run2==true)
  {
    header("location:reg_confirm.php?reg_done?Registration Successfull.");
  }

?>
