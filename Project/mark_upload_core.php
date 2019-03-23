<?php

  require_once("PDO.php");

  $arrayMid = $_REQUEST["mid"];
  $arrayQuiz1 = $_REQUEST["quiz1"];
  $arrayQuiz2 = $_REQUEST["quiz2"];
  $arrayQuiz3 = $_REQUEST["quiz3"];
  $arrayFinal = $_REQUEST["final"];
  $class = $_REQUEST["class"];
  $subject = $_REQUEST["subject"];

  foreach ($arrayMid as $keyM => $value)
  {
    $mid = $arrayMid["$keyM"];
    $connect->query("UPDATE marks SET mid_term= '$mid' WHERE student_id = '$keyM' AND class = '$class' AND subject = '$subject'");
  }

  foreach ($arrayQuiz1 as $keyQ1 => $value)
  {
    $quiz1 = $arrayQuiz1["$keyQ1"];
    $connect->query("UPDATE marks SET quiz1='$quiz1' WHERE student_id='$keyQ1' AND class = '$class' AND subject = '$subject'");
  }


  foreach ($arrayQuiz2 as $keyQ2 => $value)
  {
    $quiz2 = $arrayQuiz2["$keyQ2"];
    $connect->query("UPDATE marks SET quiz2='$quiz2' WHERE student_id='$keyQ2' AND class = '$class' AND subject = '$subject'");
  }

  foreach ($arrayQuiz3 as $keyQ3 => $value)
  {
    $quiz3 = $arrayQuiz3["$keyQ3"];
    $connect->query("UPDATE marks SET quiz3='$quiz3' WHERE student_id='$keyQ3' AND class = '$class' AND subject = '$subject'");
  }

  foreach ($arrayFinal as $keyF => $value)
  {
    $final = $arrayFinal["$keyF"];
    $connect->query("UPDATE marks SET final='$final' WHERE student_id='$keyF' AND class = '$class' AND subject = '$subject'");
  }

  header("location:teacher_home.php");

?>
