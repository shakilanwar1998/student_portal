<?php
  require_once("Connect.php");

  $marksArray = $_REQUEST["mark"];

  $subjectArray = $_REQUEST["subject"];

  $studentArray = $_REQUEST["std"];

  $class = $_REQUEST["class"];


  $marks = array();
  $students = array();
  $subjects = array();

  foreach ($marksArray as $keyM => $value)
  {
    $mark = $marksArray[$keyM];
    array_push($marks,$mark);
  }

  foreach ($subjectArray as $keyS => $value)
  {
    $subject = $subjectArray[$keyS];
    array_push($subjects,$subject);
  }

  foreach ($studentArray as $keyST => $value)
  {
    $student = $studentArray[$keyST];
    array_push($students,$student);
  }

  for($i=0;$i<sizeof($marks);$i++)
  {

    if($marks[$i]<33)
    {
      $grade = 0;
    }

    if($marks[$i]>=33 && $marks[$i]<40)
    {
      $grade = 1;
    }

    if($marks[$i]>=40 && $marks[$i]<50)
    {
      $grade = 2;
    }

    if($marks[$i]>=50 && $marks[$i]<60)
    {
      $grade = 3;
    }

    if($marks[$i]>=60 && $marks[$i]<70)
    {
      $grade = 3.5;
    }

    if($marks[$i]>=70 && $marks[$i]<80)
    {
      $grade = 4;
    }

    if($marks[$i]>=80)
    {
      $grade = 5;
    }

    $student = $students[$i];

    $query = "INSERT INTO results(student_id,class,subject,mark,grade) VALUES('$student',$class,$subjects[$i],$marks[$i],$grade)";

    $run = mysqli_query($connect,$query);

  }


  $final_query = "SELECT * FROM student_auth INNER JOIN student on student_auth.Student_ID = student.student_id WHERE class = $class";

  $run_final_query = mysqli_query($connect,$final_query);

  while($data = mysqli_fetch_array($run_final_query))
  {
    $std_id = $data["Student_ID"];

    $mark_select_query = "SELECT * FROM results WHERE class = $class AND student_id = '$std_id'";
    $run_mark_select_query = mysqli_query($connect,$mark_select_query);

    $total_GPA = 0;
    $count = 0;
    $total_mark=0;
    while($result_data = mysqli_fetch_array($run_mark_select_query))
    {
      $Grade = $result_data["grade"];
      $marks = $result_data["mark"];
      $total_mark = $total_mark+$marks;

      $total_GPA = $total_GPA + $Grade;
      $count++;
    }

    $GPA = $total_GPA/$count;
    $upload = "INSERT INTO resultsheet(student_id,class,total_mark,GPA) VALUES('$std_id',$class,$total_mark,$GPA)";
    $run_upload = mysqli_query($connect,$upload);
  }



  $check_query = "SELECT * FROM resultsheet WHERE class = $class ORDER BY total_mark DESC";
  $run_check_query = mysqli_query($connect,$check_query);

  $roll = 1;
  while($check = mysqli_fetch_array($run_check_query))
  {
    $std = $check["student_id"];

    // $upgrade_class = "UPDATE student SET class = $class+1 WHERE student_id = '$std'";
    // $run_upgrade_class = mysqli_query($connect,$upgrade_class);

    $set_roll = "UPDATE resultsheet SET position = $roll WHERE student_id = '$std'";
    $run_set_roll = mysqli_query($connect,$set_roll);

    $roll = $roll + 1;
  }

  header("location:teacher_home.php");

?>
