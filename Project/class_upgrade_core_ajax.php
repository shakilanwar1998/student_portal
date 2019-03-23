<?php
  require_once("Connect.php");

  $class = $_REQUEST["cls"];
  $std = $_REQUEST["student"];
  $roll = $_REQUEST["position"];

  $connect->query ("UPDATE student SET class = $class+1 WHERE student_id = '$std'");

  $connect->query("UPDATE student SET roll = $roll WHERE student_id = '$std'");

  echo "Promoted";


?>
