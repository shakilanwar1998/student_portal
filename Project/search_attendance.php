<?php
  session_start();
  require_once("PDO.php");
  require_once("admin_panel_sidebar.php");
 ?>

 <?php
   if(!isset($_SESSION["admin"]))
   {
     header("location:login.php?login=false");
   }
   $admin = $_SESSION["admin"];
  ?>


  <div class="container">

    <h2 class="mt-4 mb-4">Search Attendance</h2>

    <div class="row">
      <div class="col-sm-4">
        <input id="student_id" type="text" name="student_id" placeholder="Student ID" class="form-control">
      </div>

      <div class="col-sm-3" >
        <select id="month" name="month" class="form-control">
          <option value="">Month</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        </select>
      </div>

      <div class="col-sm-3">
        <select id="year" name="year" class="form-control">
          <option value="2032">2032</option>
          <option value="2031">2031</option>
          <option value="2030">2030</option>
          <option value="2029">2029</option>
          <option value="2028">2028</option>
          <option value="2027">2027</option>
          <option value="2026">2026</option>
          <option value="2025">2025</option>
          <option value="2024">2024</option>
          <option value="2023">2023</option>
          <option value="2022">2022</option>
          <option value="2021">2021</option>
          <option value="2020">2020</option>
          <option value="2019" selected>2019</option>
        </select>
      </div>

      <div class="col-sm-2">
        <button id="search" class="btn btn-primary btn-block" type="submit">Search</button>
      </div>

    </div>

    <div id="attendance">

   </div>
  </div>



<?php require_once("bottom.php"); ?>


<script>
$("#search").click(function(){

  var year = $("#year").val();
  var std = $("#student_id").val();
  var month = $("#month").val();

    $.post("attendance_search_core.php",{year:year,month:month,student:std},function(data){

      $("#attendance").html(data);
    });
     return false;

});
</script>
