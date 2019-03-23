<?php
  require_once("PDO.php");

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

    $connect->query("INSERT INTO results(student_id,class,subject,mark,grade) VALUES('$student',$class,$subjects[$i],$marks[$i],$grade)");

  }

  $final_query = $connect->query("SELECT * FROM student_auth INNER JOIN student on student_auth.Student_ID = student.student_id WHERE class = $class");

  while($data = $final_query->fetch(PDO::FETCH_OBJ))
  {
    $std_id = $data->Student_ID;

    $mark_select_query = $connect->query("SELECT * FROM results WHERE class = $class AND student_id = '$std_id'");

    $total_GPA = 0;
    $count = 0;
    $total_mark=0;
    while($result_data = $mark_select_query->fetch(PDO::FETCH_OBJ))
    {
      $Grade = $result_data->grade;
      $marks = $result_data->mark;
      $total_mark = $total_mark+$marks;

      $total_GPA = $total_GPA + $Grade;
      $count++;
    }

    $GPA = $total_GPA/$count;
    $connect->query("INSERT INTO resultsheet(student_id,class,total_mark,GPA) VALUES('$std_id',$class,$total_mark,$GPA)");
  }



  $check_query = $connect->query("SELECT * FROM resultsheet WHERE class = $class ORDER BY total_mark DESC");

  $roll = 1;
  while($check = $check_query->fetch(PDO::FETCH_OBJ))
  {
    $std = $check->student_id;

    // $upgrade_class = "UPDATE student SET class = $class+1 WHERE student_id = '$std'";
    // $run_upgrade_class = mysqli_query($connect,$upgrade_class);

    $connect->query("UPDATE resultsheet SET position = $roll WHERE student_id = '$std'");
    $roll = $roll + 1;
  }

  header("location:admin_home.php");

?>
