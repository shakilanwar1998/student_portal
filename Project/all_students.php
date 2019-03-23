<?php
  require_once("admin_panel_sidebar.php");
  require_once("PDO.php");
 ?>

<?php
 $insert = $connect->query("SELECT * FROM student_auth inner join student on student_auth.Student_ID=student.student_id");


?>

 <div class="container">
     <h2 class="mt-5 mb-5">Students</h2>
     <table class="table table-bordered table-hover">
       <thead class="black white-text thead-dark">
         <tr>
           <th scope="col">#</th>
           <th scope="col">Name</th>
           <th scope="col">Student ID</th>
           <th scope="col">Class</th>
           <th scope="col">Roll</th>
         </tr>
       </thead>

       <tbody>
         <tr>
           <?php

             $count=1;
             while($data = $insert->fetch(PDO::FETCH_OBJ))
             { ?>
               <tr>

              <?php echo '<th scope="row">'.$count.'</th>'; ?>
              <?php  echo '<td>'.$data->Name.'</td>';?>
              <?php  echo '<td>'.$data->Student_ID.'</td>';?>
              <?php  echo '<td>'.$data->class.'</td>'; ?>
              <?php  echo '<td>'.$data->roll.'</td>'; ?>
              <?php $count++; ?>
             </tr> <?php
             }
           ?>

         </tr>
      </tbody>
    </table>

   </div>

 <?php
   require_once("bottom.php");
  ?>
