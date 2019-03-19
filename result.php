<?php

  session_start();
  require_once("Connect.php");

  if(!isset($_SESSION["student"]))
  {
    header("location:login.php?login=false");
  }
  $student = $_SESSION["student"];
 ?>

 <?php if(isset($_REQUEST["student"]))
 {
   require_once("sidebar.php");
 }

 if(isset($_REQUEST["teacher"]))
 {
   require_once("teacher_sidebar.php");
 }

 if(isset($_REQUEST["admin"]))
 {
   require_once("admin_panel_sidebar.php");
 }

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

    <h2 class="mt-4 mb-4">Result</h2>

    <div class="row">
      <div class="col-sm-4">
        <input id="student_id" type="text" name="student_id" placeholder="Student ID" class="form-control">
      </div>

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
        <button onsubmit="return false" id="result_btn" class="btn btn-primary btn-block" type="submit">Result</button>
      </div>

    </div>


    <div class="card mt-3" style="background:#c8d7e7;">

        <table class="table table-striped  mt-3">
          <thead style="background-color:#38477eb3;color:#ddd" class="text-center">
            <tr><th colspan="2">Student Information</th></tr>
          </thead>

          <tbody id = "student_info">



          </tbody>

       </table>
   </div>

   <div class="card mt-5 mb-3" style="background:#c8d7e7;">

       <table class="table table-striped  mt-2">
         <thead style="background-color:#38477eb3;color:#ddd" class="text-center">
           <tr><th id="subject_header" colspan="2">Academic Result</th></tr>
         </thead>
      </table>



      <table class="table table-striped table-secondary table-hover mt-2">
        <thead style="background-color:#356da9;color:#ddd" class="white-text">
          <tr>
            <th scope="col">Subject</th>
            <th scope="col">Marks</th>
            <th scope="col">Grade Point</th>
            <th scope="col">Grade</th>
          </tr>
        </thead>

        <tbody id="result">

       </tbody>

     </table>
  </div>

  </div>

 <?php
   require_once("bottom.php");
  ?>


  <script type="text/javascript">
    $("#result_btn").click(function(){

    var class_val = $("#class_mark").val();

    var std = $("#student_id").val();

      $.post("result_ajax.php",{cls:class_val,student:std},function(data){

        $("#student_info").html(data);

      });


      $.post("marksheet_ajax.php",{cls:class_val,student:std},function(data2){

        $("#result").html(data2);

      });

  });
  </script>
