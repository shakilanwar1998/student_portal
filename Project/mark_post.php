<?php
  require_once("PDO.php");
  $class = $_REQUEST["cls"];
  $subject = $_REQUEST["subject"];

  $query = $connect->query("SELECT * FROM student_auth INNER JOIN student on student_auth.Student_ID = student.student_id
            INNER JOIN marks on marks.student_id = student_auth.Student_ID
            WHERE student.class=$class AND marks.subject = $subject ORDER BY roll ASC");

  if($query->rowCount() == 0)
  {
    $all_student_query = $connect->query("SELECT * FROM student_auth INNER JOIN student on student_auth.Student_ID=student.student_id WHERE class = '$class'");

    while($data = $all_student_query->fetch(PDO::FETCH_OBJ))
    {
      $student= $data->Student_ID;
      $insert_all_student = $connect->query("INSERT INTO marks(student_id, class, subject) VALUES('$student','$class','$subject')");
    }

    $query = $connect->query("SELECT * FROM student_auth INNER JOIN student on student_auth.Student_ID = student.student_id
              INNER JOIN marks on marks.student_id = student_auth.Student_ID
              WHERE student.class=$class AND marks.subject = $subject ORDER BY roll ASC");
  }



  while($data = $query->fetch(PDO::FETCH_OBJ))
  {
    ?>
    <tr>

      <?php $std = $data->Student_ID;

          $mid = $data->mid_term;
          $quiz1 = $data->quiz1;
          $quiz2 = $data->quiz2;
          $quiz3 = $data->quiz3;
          $final = $data->final;
       ?>


   <?php  echo '<td>'.$data->roll.'</td>';?>
   <?php  echo '<td>'.$data->Name.'</td>'; ?>
   <?php  echo '<td>'.$data->class.'</td>'; ?>
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
