<?php

  require_once("PDO.php");

  if(isset($_SESSION["teacher"]))
  {
    require_once("teacher_sidebar.php");
  }
  else {
    require_once("admin_panel_sidebar.php");
  }
 ?>

 <div class="container">
     <h2 class="mt-3 mb-3">Attendance</h2>

  <form id="select_form_view" method="POST">
     <div class="row">
       <div class="col-sm-6">
         <select id="class" name="class" class="form-control mb-3" required >
           <option value="0">Class -select-</option>
           <option value="1">One</option>
           <option value="2">Two</option>
           <option value="3">Three</option>
           <option value="4">Four</option>
           <option value="5">Five</option>
           <option value="6">Six</option>
           <option value="7">Seven</option>
           <option value="8">Eight</option>
           <option value="9">Nine</option>
           <option value="10">Ten</option>
         </select>
       </div>

       <div class="col-sm-4">
         <input type="date" name="date" class="form-control" placeholder="Date" required/>
       </div>

       <div class="col-sm-2">
         <button id="select_btn_view" class="btn btn-primary btn-block" type="submit">Select</button>
       </div>

     </div>
  </form>


  <div>
    <?php

        if(isset($_REQUEST["class"])&& !isset($_REQUEST["nochange"]))
        {
          $req_class = $_REQUEST["class"];
          $req_date = $_REQUEST["date"];
          $className = $connect->query("SELECT * FROM class WHERE class='$req_class'");

          while($data = $className->fetch(PDO::FETCH_OBJ))
          {
            $class_name= $data->class_name;
          }
          echo "<b>Class: ".$class_name." "; ?>

          <div class="mb-2">Date: <?php echo $req_date."</b>";?> </div>
      <?php  } ?>


  </div>

     <table class="table table-bordered table-striped table-hover">
         <thead style="background-color:#356da9;color:#ddd" class="white-text">
         <tr>
           <th scope="col">#</th>
           <th scope="col">Name</th>
           <th scope="col">Class</th>
           <th scope="col">Roll</th>
           <th scope="col">Attendance</th>
         </tr>
       </thead>

       <tbody>
         <tr>
           <?php

           if(isset($_REQUEST["class"]))
               {
                 if(isset($_REQUEST["date"]))
                 {
                   $date = $_REQUEST["date"];
                   $class = $_REQUEST["class"];

                   $query = $connect->query("SELECT * FROM attendance inner join student_auth on attendance.student_id=student_auth.Student_ID WHERE class='$class' AND att_date='$date'");
             $count=1;
             while($data =$query->fetch(PDO::FETCH_OBJ))
             { ?>
               <tr>

                 <?php $attendance= $data->attendance;
                 if($attendance=='p')
                 {
                   $attendance = "Present";
                 }
                 else if($attendance=='a')
                 {
                   $attendance ="Absent";
                 }
                 ?>

              <?php echo '<th scope="row">'.$count.'</th>'; ?>
              <?php  echo '<td>'.$data->Name.'</td>';?>
              <?php  echo '<td>'.$data->class.'</td>'; ?>
              <?php  echo '<td>'.$data->class.'</td>'; ?>
              <?php  echo '<td>'.$attendance.'</td>';?>

            </tr> <?php $count++;
             }
         }
       }
    ?>

         </tr>
      </tbody>
    </table>

   </div>

   <script>
   $("#select_form_view").prop("action","view_attendance.php?nochange");

   $("#class").change(function(){

     $("#select_btn_view").click(function(){
       $("#select_form_view").prop("action","att_class_select.php");
     });

   });

   </script>

 <?php
   require_once("bottom.php");
  ?>
