<?php
  require_once("Connect.php");
  $class = $_REQUEST["cls"];
  $subject = $_REQUEST["subject"];

  $query = "SELECT * FROM student_auth INNER JOIN student on student_auth.Student_ID = student.student_id
            INNER JOIN marks on marks.student_id = student_auth.Student_ID
            WHERE student.class=$class AND marks.subject = $subject ORDER BY roll ASC";

  $run = mysqli_query($connect,$query);

  $num_row = mysqli_num_rows($run);

  if($num_row == 0)
  {
    $all_student_query = "SELECT * FROM student_auth INNER JOIN student on student_auth.Student_ID=student.student_id WHERE class = '$class'";
    $run_all_student = mysqli_query($connect,$all_student_query);

    while($data = mysqli_fetch_array($run_all_student))
    {
      $student= $data["Student_ID"];

      $insert_all_student = "INSERT INTO marks(student_id, class, subject) VALUES('$student','$class','$subject')";
      $run_insert = mysqli_query($connect,$insert_all_student);
    }

    $run = mysqli_query($connect,$query);

  }



  while($data = mysqli_fetch_array($run))
  {
    ?>
    <tr>

      <?php $std = $data["Student_ID"];

          $mid = $data["mid_term"];
          $quiz1 = $data["quiz1"];
          $quiz2 = $data["quiz2"];
          $quiz3 = $data["quiz3"];
          $final = $data["final"];
       ?>


   <?php  echo '<td>'.$data["roll"].'</td>';?>
   <?php  echo '<td>'.$data["Name"].'</td>'; ?>
   <?php  echo '<td>'.$data["class"].'</td>'; ?>
   <td><input name="mid[<?php echo $std; ?>]" type="text" class="form-control" value="<?php echo $mid; ?>"/></td>
   <td><input name="quiz1[<?php echo $std; ?>]" type="text" class="form-control" value="<?php echo $quiz1 ?>"/></td>
   <td><input name="quiz2[<?php echo $std; ?>]" type="text" class="form-control" value="<?php echo $quiz2; ?>"/></td>
   <td><input name="quiz3[<?php echo $std; ?>]" type="text" class="form-control" value="<?php echo $quiz3; ?>"/></td>
   <td><input name="final[<?php echo $std; ?>]" type="text" class="form-control" value="<?php echo $final; ?>"/></td>

   <input type="hidden" name="class" value="<?php echo $class; ?>">

 </tr> <?php
 $count++;
  }

 ?>
