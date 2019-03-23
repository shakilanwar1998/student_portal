<?php
  session_start();
  require_once("PDO.php");
  require_once("teacher_sidebar.php");
 ?>

 <?php
   if(!isset($_SESSION["teacher"]))
   {
     header("location:login.php?login=false");
   }
   $teacher = $_SESSION["teacher"];
  ?>



<?php
$query = $connect->query("SELECT * FROM teacher WHERE Teacher_ID='$teacher'");

  while($data = $query->fetch(PDO::FETCH_OBJ))
  {
    $name = $data->teacher_name;
  }

 ?>


 <div class="container">
     <h2 class="mt-5">Welcome <?php echo $name; ?></h2>
     <div class="row">

       <div class="col-sm-4 mt-5">
         <a href="attendance.php"> <div id="Attendance" style="border-radius:4px; background:#660033;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Take Attendance</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo date("Y/m/d"); ?> </h6>
             </div>
         </div> </a>
       </div>

       <div class="col-sm-4 mt-5">
         <a href="mark_upload.php"><div style="border-radius:4px;background:#003366;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Upload Marks</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>"; ?> </h6>
             </div>
         </div></a>
       </div>

       <div class="col-sm-4 mt-5">
         <a href="result.php"><div style="border-radius:4px;background:#003300;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Result</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>"; ?> </h6>
             </div></a>
         </div>
       </div>

     </div>

   </div>

 <?php
   require_once("bottom.php");
  ?>
