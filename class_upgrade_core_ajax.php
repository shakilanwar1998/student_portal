<?php
  require_once("Connect.php");

  $class = $_REQUEST["cls"];
  $std = $_REQUEST["student"];
  $roll = $_REQUEST["position"];



  $upgrade_class = "UPDATE student SET class = $class+1 WHERE student_id = '$std'";
  $run_upgrade_class = mysqli_query($connect,$upgrade_class);

  $set_roll = "UPDATE student SET roll = $roll WHERE student_id = '$std'";
  $run_set_roll = mysqli_query($connect,$set_roll);


  echo "Promoted";


?>
