<?php
  require_once("PDO.php");
  session_start();

  $subject = $_REQUEST["subject"];
  $class = $_REQUEST["cls"];

  $student = $_SESSION["student"];

  $query = $connect->query("SELECT * FROM marks WHERE class= $class AND subject = $subject AND student_id = '$student'");

  $data = $query->fetch(PDO::FETCH_OBJ);

    $quiz1 = $data->quiz1;

    $quiz2 = $data->quiz2;

    $quiz3 = $data->quiz3;

    $avg = ($quiz1+$quiz2+$quiz3)/3;

?>

    <tr>
      <th colspan="2">Quiz 1 :<span style="font-weight:normal"><?php echo " ". $quiz1; ?></span></th>

    </tr>
    <tr>
      <th colspan="2">Quiz 2 :<span style="font-weight:normal"><?php echo " ". $quiz2;?></span></th>

    </tr>
    <tr>
      <th colspan="2">Quiz 3 :<span style="font-weight:normal"><?php echo " ". $quiz3;?></span></th>

    </tr>
    <tr>
      <th colspan="2">Quiz Average :<span style="font-weight:normal"><?php echo " ".number_format($avg, 2); ?></span></th>

    </tr>
    <tr>
      <th colspan="2">Mid Term :<span style="font-weight:normal"><?php echo " ". $data["mid_term"];?></span></th>

    </tr>
    <tr>
      <th colspan="2">Final :<span style="font-weight:normal"><?php echo " ". $data["final"];?></span></th>

    </tr>
