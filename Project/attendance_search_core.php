<?php
  require_once("PDO.php");

  $student = $_REQUEST["student"];
  $month = $_REQUEST["month"];
  $year = $_REQUEST["year"];

  $all_attendance = $connect->query("SELECT * FROM student_auth INNER JOIN attendance ON student_auth.Student_ID=attendance.student_id WHERE attendance.student_id='$student' AND month = $month AND year = $year");

?>

<table class="table table-striped table-secondary table-hover mt-5">
    <thead style="background-color:#356da9;color:#ddd" class="white-text text-center">
    <tr>
      <th scope="col">Sl</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Attendance</th>
    </tr>
    </thead>
      <tbody class="text-center">

          <?php
            $count=1;
            while($data =$all_attendance->fetch(PDO::FETCH_OBJ))
            { ?>
                <?php $attendance= $data->attendance;
                // if($attendance=='p')
                // {
                //   $attendance = "Present";
                // }
                // else if($attendance=='a')
                // {
                //   $attendance ="Absent";
                // }
                ?>
                <tr>
                  <?php echo '<th scope="row">'.$count.'</th>'; ?>
                  <?php  echo '<td>'.$data->Name.'</td>';?>
                  <?php  echo '<td>'.$data->day."/".$data->month."/".$data->year.'</td>'; ?>
                  <?php
                    if($attendance=='a')
                      {
                        echo '<td style="color:red">Absent</td>';
                      }
                      else {
                        echo '<td style="color:green">Present</td>';
                      }
                      ?>
                </tr>
           <?php $count++; } ?>
      </tbody>

</table>
