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
    <h2 class="mt-3 mb-3">Publish Result</h2>

    <form action="result_publish_class.php" method="POST">
       <div class="row">
         <div class="col-sm-4">
           <select id="class_select" name="class" class="form-control mb-3" required >
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


<!--
    <div class="row">
      <div class="col-sm-8">
        <table class="table table-striped table-bordered table-secondary table-hover mt-2"> -->

          <?php

            if(isset($_REQUEST["class"]))
            {
              if($_REQUEST["class"]!=0)
              {
                $class = $_REQUEST["class"];

                    $select_query = $connect->query("SELECT * FROM marks WHERE class = $class");
                    $count = 0;

                    while($data = $select_query->fetch(PDO::FETCH_OBJ))
                    {
                        $student = $data->student_id;
                        $quiz1 = $data->quiz1;
                        $quiz2 = $data->quiz2;
                        $quiz3 = $data->quiz3;
                        $mid_term = $data->mid_term;
                        $final = $data->final;
                        $subject_id = $data->subject;

                        $final_6T = $final*0.6;
                        $mid_25 = $mid_term*0.25;

                        $quiz = ($quiz1+$quiz2+$quiz3)/3;

                        $total = $quiz+$mid_25+$final_6T;

                        // if($total<40)
                        // {
                        //   $fail = $fail + 1;
                        // }
                        // else {
                        //   $pass = $pass + 1;
                        // }
                        //
                        // if($total>=80)
                        // {
                        //   $GPA5 = $GPA5+1;
                        // }

                        ?>

                       <form action="result_publish_core.php" method="POST">
                        <input type="hidden" name="mark[<?php echo $count;?>]" value="<?php echo $total; ?>">
                        <input type="hidden" name="subject[<?php echo $count;?>]" value="<?php echo $subject_id; ?>" >
                        <input type="hidden" name="std[<?php echo $count;?>]" value="<?php echo $student; ?>">
                        <input type="hidden" name="class" value="<?php echo $class; ?>">

                  <?php $count++;
                  }

              ?>

              <!--
              <thead style="background-color:#38477eb3;color:#ddd" class="text-center">
                <tr><th id="Result_header" colspan="2"> Result Overview </th></tr>
              </thead>

              <tbody id="result">

              <tr>
                  <th style="width:360px">Class :</th>
                  <td> <b><?php //echo $class; ?></b></td>
              </tr>

              <tr>
                  <th style="width:360px">Total Students :</th>
                  <td><?php //echo $count; ?></td>
              </tr>

              <tr>
                  <th style="width:360px">Passed : </th>
                  <td><?php //echo $pass; ?></td>
              </tr>

              <tr>
                  <th style="width:360px">Failed : </th>
                  <td><?php //echo $fail; ?></td>
              </tr>

              <tr>
                  <th style="width:360px">GPA 5 : </th>
                  <td><?php //echo $GPA5; ?></td>
              </tr>


         </tbody>

       </table> -->

       <div class="col-sm-5 m-auto">
         <button id="publish_btn" class="btn btn-info btn-block" type="submit">Publish</button>
       </div>
     </form>
     <?php  }
          }
      ?>

      </div>
    </div>

  </div>

<?php require_once("bottom.php"); ?>
