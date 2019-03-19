<?php
  require_once("Connect.php");
  require_once("sidebar.php");
 ?>

 <?php
  session_start();
   if(!isset($_SESSION["student"]))
   {
     header("location:login.php?login=false");
   }
   $student = $_SESSION["student"];
  ?>



<?php
  $insert = "SELECT * FROM student_auth WHERE Student_ID='$student'";

  $run = mysqli_query($connect,$insert);

  if($run==true)
  {
    while($data = mysqli_fetch_array($run))
    {
      $name = $data["Name"];
    }
  }

 ?>


 <div class="container">
     <h2 class="mt-5">Welcome <?php echo $name; ?></h2>
     <div class="row">

       <div class="col-sm-4 mt-5">
         <a href="live_result.php"> <div style="border-radius:4px; background:#660033;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Live Result</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>"; ?> </h6>
             </div>
         </div> </a>
       </div>

       <div class="col-sm-4 mt-5">
         <a href="result.php"><div style="border-radius:4px;background:#003366;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Result</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>"; ?> </h6>
             </div>
         </div></a>
       </div>

       <div class="col-sm-4 mt-5">
         <a href="dashboard.php"><div style="border-radius:4px;background:#003300;" class="card o-hidden">
             <div class="card-body p-3 text-white">
               <h4 class="pl-2">Dashboard</h4> </br>
               <h6 class="pl-2 ml-2"> <?php echo "</br>"; ?> </h6>
             </div></a>
         </div>
       </div>

     </div>

   </div>

 <?php
   require_once("bottom.php");
  ?>
