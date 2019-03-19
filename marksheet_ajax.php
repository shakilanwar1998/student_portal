<?php require_once("Connect.php");

  $class = $_REQUEST["cls"];
  $student = $_REQUEST["student"];

  $result_query = "SELECT * FROM results WHERE student_id = '$student' AND class = $class";
  $run_result_query = mysqli_query($connect,$result_query);

  while($data = mysqli_fetch_assoc($run_result_query))
  {
    $subject = $data["subject"];
    $mark = $data["mark"];
    $point = $data["grade"];

    $subject_query = "SELECT * FROM subject WHERE subject_id = $subject";
    $run_subject_query = mysqli_query($connect,$subject_query);
    $data_subject = mysqli_fetch_assoc($run_subject_query);
    $subject = $data_subject["subject_name"];
    ?>
    <tr>
      <td><?php echo $subject; ?></td>
      <td><?php echo number_format($mark,2); ?></td>
      <td><?php echo number_format($point,2); ?></td>
      <td><?php

      if($mark<33)
      {
        echo "F";
      }

      if($mark>=33 && $mark<40)
      {
        echo "D";
      }

      if($mark>=40 && $mark<50)
      {
        echo "C";
      }

      if($mark>=50 && $mark<60)
      {
        echo "B";
      }

      if($mark>=60 && $mark<70)
      {
        echo "A-";
      }

      if($mark>=70 && $mark<80)
      {
        echo "A";
      }

      if($mark>=80)
      {
        echo "A+";
      }


      ?></td>
   </tr>
<?php  }

?>
