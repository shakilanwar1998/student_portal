<?php require_once("PDO.php");

  $class = $_REQUEST["cls"];
  $student = $_REQUEST["student"];

  $result_query = $connect->query("SELECT * FROM student_auth INNER JOIN resultsheet on student_auth.Student_ID = resultsheet.student_id
                    WHERE student_auth.Student_ID = '$student' AND resultsheet.class = $class");

  $data = $result_query->fetch(PDO::FETCH_OBJ);

  $gpa = $data->GPA;
  $total = $data->total_mark;

  $student_query = $connect->query("SELECT * FROM student_auth WHERE Student_ID = '$student'");

  $studentDB = $student_query->fetch(PDO::FETCH_OBJ);
  $name = $studentDB->Name;

  $class_query = $connect->query("SELECT * FROM class WHERE class = $class");

  $classDB = $class_query->fetch(PDO::FETCH_OBJ);
  $class_name = $classDB->class_name;

  $position_query = $connect->query("SELECT * FROM resultsheet WHERE class = $class AND student_id = '$student'");

  $positionData = $position_query->fetch(PDO::FETCH_OBJ);
  $position = $positionData->position;


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
  try {
		$connect = new PDO("mysql:host=127.0.0.1;dbname=student","shakilanwar1998","09shakil1998");
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (\Exception $e) {
		echo $e->getMessage();
	}
  
  $std = $_REQUEST["student"];
  $cls = $_REQUEST["cls"];
  $result_query = $connect->query("SELECT * FROM results WHERE student_id = '$std' AND class = $cls");

  while($marks = $result_query->fetch(PDO::FETCH_OBJ))
  {
    $mark = $marks->mark;
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
