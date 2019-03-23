<?php
require_once("PDO.php");
$class = $_REQUEST["class"];
$day = $_REQUEST["day"];
$month = $_REQUEST["month"];
$year = $_REQUEST["year"];

$found = 0;
  $all_attendance = $connect->query("SELECT * FROM attendance WHERE class='$class' AND day = $day AND month = $month AND year = $year");

  $row_count = $all_attendance->rowCount();

  if($row_count==0)
  {
    $all_student_query = $connect->query("SELECT * FROM student_auth inner join student on student_auth.Student_ID=student.student_id WHERE class='$class'");

    while($std = $all_student_query->fetch(PDO::FETCH_OBJ))
    {
        $student = $std->Student_ID;
        $connect->query("INSERT INTO attendance(class,student_id,day,month,year,attendance) VALUES('$class','$student',$day,$month,$year,'a')") ;
    }

    foreach ($_REQUEST["attn"] as $key => $value)
    {
       $connect->query("UPDATE attendance SET attendance = 'p' WHERE student_id='$key' AND day = $day AND month = $month AND year = $year");
    }

  }

header("location:teacher_home.php");
?>
