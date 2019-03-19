<?php require_once("Connect.php");

  $class = $_REQUEST["cls"];
  $student = $_REQUEST["student"];

  $result_query = "SELECT * FROM student_auth INNER JOIN resultsheet on student_auth.Student_ID = resultsheet.student_id
                    WHERE student_auth.Student_ID = '$student' AND resultsheet.class = $class";
  $run_result_query = mysqli_query($connect,$result_query);

  $data = mysqli_fetch_assoc($run_result_query);

  $gpa = $data["GPA"];
  $total = $data["total_mark"];



  $student_query = "SELECT * FROM student_auth WHERE Student_ID = '$student'";
  $run_student_query = mysqli_query($connect,$student_query);

  $studentDB = mysqli_fetch_assoc($run_student_query);
  $name = $studentDB["Name"];

  $class_query = "SELECT * FROM class WHERE class = $class";
  $run_class_query = mysqli_query($connect,$class_query);
  $classDB = mysqli_fetch_assoc($run_class_query);
  $class_name = $classDB["class_name"];



  $position_query = "SELECT * FROM resultsheet WHERE class = $class AND student_id = '$student'";
  $run_position_query = mysqli_query($connect,$position_query);

  $positionData = mysqli_fetch_array($run_position_query);
  $position = $positionData["position"];


?>


<tr>
    <th style="width:300px">Student Name :</th>
    <td> <b><?php echo $name; ?></b></td>
</tr>

<tr>
    <th style="width:300px">Class :</th>
    <td><?php echo $class_name; ?></td>
</tr>

<tr>
    <th style="width:300px">Student ID : </th>
    <td><?php echo $student; ?></td>
</tr>

<tr>
    <th style="width:300px">Status : </th>
    <td><?php echo check_pass(); ?></td>
</tr>

<tr>
    <th style="width:300px">Result: </th>
    <td><?php echo number_format($gpa,2); ?></td>
</tr>

<tr>
    <th style="width:300px">Total Marks: </th>
    <td><?php echo number_format($total,2); ?></td>
</tr>

<tr>
    <th style="width:300px">Position: </th>
    <td><?php echo $position; ?></td>
</tr>






<?php

function check_pass()
{
  $connect = mysqli_connect("localhost","shakilanwar1998","09shakil1998","student");

  $std = $_REQUEST["student"];
  $cls = $_REQUEST["cls"];
  $result_query = "SELECT * FROM results WHERE student_id = '$std' AND class = $cls";
  $run_result_query = mysqli_query($connect,$result_query);

  while($data = mysqli_fetch_assoc($run_result_query))
  {
    $mark = $data["mark"];
      if($mark<33)
      {
        return "<span style='color:red'>FAILED</span>";
        break;
      }
      else {
        return "<span style='color:green'>PASSED</span>";
      }
  }

}

?>
