<?php

  $class = $_REQUEST["class"];

  if(isset($_REQUEST["date"]))
  {
    $date = $_REQUEST["date"];

    $newDate = date("d/m/Y", strtotime($date));
    header("location:view_attendance.php?class=$class&date=$newDate");
  }

  else {
    header("location:attendance.php?class=$class");
  }

?>
