<?php

  session_start();
  require_once("sidebar.php");
  require_once("Connect.php");

  if(!isset($_SESSION["student"]))
  {
    header("location:login.php?login=false");
  }
  $student = $_SESSION["student"];
 ?>

  <style>
  .card:hover
  {
    transform: none;
    transition:0.5s;
  }

  .confirm_card
  {
    display:none;
  }

  </style>


  <div class="container">
      <h2 class="mt-4 mb-2">Live Result</h2>


      <form id="mark_upload_select_form" action="live_result_ajax_subject.php" method="POST">
         <div class="row">
           <div class="col-sm-4">
             <select id="class_mark" name="class" class="form-control mb-3" required >
               <option value="0">Class -Select-</option>
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

           <div class="col-sm-2">
             <button id="select_btn" class="btn btn-primary btn-block" type="submit" onclick="getpage();">Select</button>
           </div>

         </div>
      </form>

      <table class="table table-striped table-secondary table-hover mt-2">
        <thead style="background-color:#356da9;color:#ddd" class="white-text">
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Teacher</th>
            <th scope="col">Full Marks</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody id="result">

          <?php
            if(isset($_REQUEST["cls"]))
            {

            $class = $_REQUEST["cls"];

            $query = "SELECT * FROM subject INNER JOIN teacher on subject.teacher = teacher.Teacher_ID WHERE class='$class'";

            $run = mysqli_query($connect,$query);
            while($data = mysqli_fetch_array($run))
            {
              $sub_id = $data["subject_id"];
              $subject = $data["subject_name"];
              $teacher = $data["teacher_name"];
              $full_mark = $data["full_marks"]; ?>

              <tr>
                <td><?php echo $subject; ?></td>
                <td><?php echo $teacher; ?></td>
                <td><?php echo $full_mark; ?></td>
                <td><button class = "btn btn-outline-danger view_marks" data-subject="<?php echo $sub_id;  ?>" data-sub_name="<?php echo $subject; ?>">View Marks</button></td>

             </tr>

           <?php }

              }
            ?>

       </tbody>

     </table>

     <div class="card" style="background:#c8d7e7;">

         <table class="table table-striped  mt-3">
           <thead style="background-color:#38477eb3;color:#ddd" class="text-center">
             <tr><th id="subject_header" colspan="2">Live Result </th></tr>
           </thead>

           <tbody id = "marks_table">

           </tbody>

        </table>
    </div>

  </div>


  <script>

  $(".view_marks").click(function(){

    var class_val = <?php echo $class; ?>

    var sub = $(this).data("subject");
    var std = <?php echo $student; ?>

    var subject_name = $(this).data("sub_name");

    $("#subject_header").html("Live Result: "+subject_name);


      $.post("live_result_ajax.php",{cls:class_val,subject:sub},function(data){

        $("#marks_table").html(data);

      });
       return false;

  });
  </script>


 <?php
   require_once("bottom.php");
  ?>
