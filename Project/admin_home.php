<?php
  require_once("PDO.php");
  require_once("admin_panel_sidebar.php");
 ?>

 <?php
  session_start();
   if(!isset($_SESSION["admin"]))
   {
     header("location:login.php?login=false");
   }
   $admin = $_SESSION["admin"];
  ?>



<?php
  $insert = $connect->query("SELECT * FROM admin WHERE Admin_ID='$admin'");


    while($data = $insert->fetch(PDO::FETCH_OBJ))
    {
      $name = $data->Name;
    }


 ?>


 <div class="container">
     <h2 class="mt-5">Welcome <?php echo $name; ?></h2>
     <div class="row">

       <div class="col-sm-4 mt-5">
         <a href="registration.php"> <div style="border-radius:4px; background:#660033;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Register Student</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>"; ?> </h6>
             </div>
         </div> </a>
       </div>

       <div class="col-sm-4 mt-5">
         <a href="view_attendance.php"><div style="border-radius:4px;background:#003366;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Check Attendance</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>" ?> </h6>
             </div>
         </div></a>
       </div>

       <div class="col-sm-4 mt-5">
         <a href="Publish_result.php"><div style="border-radius:4px;background:#003300;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Publish Result</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>" ?> </h6>
             </div></a>
         </div>
       </div>

     </div>


     <div class="row">
       <div class="col-sm-4 mt-5">
         <a href="student_class_upgrade.php"><div style="border-radius:4px;background:#006666;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Promote Student</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>" ?> </h6>
             </div>
         </div>
       </div></a>
       <div class="col-sm-4 mt-5">
         <a href="all_students.php"><div style="border-radius:4px;background:#006666;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">All Students</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>" ?> </h6>
             </div>
         </div>
       </div></a>

       <div class="col-sm-4 mt-5">
         <a href="result.php"><div style="border-radius:4px;background:#006666;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Result</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>" ?> </h6>
             </div>
         </div>
       </div></a>

     </div>

   </div>

 <?php
   require_once("bottom.php");
  ?>
