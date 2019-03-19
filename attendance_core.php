<?php

require_once("Connect.php");
$date = date("d/m/Y");
$class = $_REQUEST["class"];

$found = 0;

$all_attendance = "SELECT * FROM attendance WHERE class='$class'";

$run_all_attendance = mysqli_query($connect,$all_attendance);

while($data = mysqli_fetch_array($run_all_attendance))
{
  $check= $data["att_date"];

  if($check==$date)
  {
    $found = 1;
    break;
  }
}

if($found==0)
{
  $all_student_query = "SELECT * FROM student_auth inner join student on student_auth.Student_ID=student.student_id WHERE class='$class'";

  $run_all_student = mysqli_query($connect,$all_student_query);


  while($std = mysqli_fetch_array($run_all_student))
  {
      $student = $std["Student_ID"];

        $insert_attendance_absent = "INSERT INTO attendance(class,student_id,att_date,attendance) VALUES('$class','$student','$date','a')";
        $save_att_absent = mysqli_query($connect,$insert_attendance_absent);

  }

    foreach ($_REQUEST["attn"] as $key => $value)
    {
        $insert_attendance_present = "UPDATE attendance SET attendance = 'p' WHERE student_id='$key' AND att_date='$date'";

        $save_att = mysqli_query($connect,$insert_attendance_present);
    }

}
header("location:teacher_home.php");
?>
