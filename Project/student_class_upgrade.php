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
    <h2 class="mt-3 mb-3">Class Upgrade</h2>

    <form action="upgrade_select.php" method="POST">
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

    <style>

      .disable
      {
        display:none;
      }

    </style>


        <table class="table table-striped table-bordered table-secondary table-hover mt-2">

          <table class="table table-striped table-secondary table-hover mt-2">
            <thead style="background-color:#356da9;color:#ddd" class="white-text">
              <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Class</th>
                <th scope="col">Result</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody id="result">

          <?php

            if(isset($_REQUEST["class"]))
            {
              if($_REQUEST["class"]!=0)
              {
                $class = $_REQUEST["class"];

                    $select_query = $connect->query("SELECT * FROM resultsheet INNER JOIN student_auth on student_auth.Student_ID = resultsheet.student_id
                                    INNER JOIN student on student_auth.Student_ID = student.student_id WHERE student.class = $class AND resultsheet.class = $class");

                    while($data = $select_query->fetch(PDO::FETCH_OBJ))
                    {
                        $student_id = $data->student_id;
                        $student_name = $data->Name;
                        $result = $data->GPA;
                        $roll = $data->position; ?>

                        <tr>
                          <td><?php echo $student_name; ?></td>
                          <td><?php echo $class; ?></td>
                          <td><?php echo number_format($result,2); ?></td>
                          <td><a href="#" class = "btn btn-info promote" data-student="<?php echo $student_id; ?>" data-roll="<?php echo $roll; ?>" >Promote</a></td>

                       </tr>

                     <?php

                    }

              }
          }

      ?>

        </tbody>


  </div>

<?php require_once("bottom.php"); ?>


<script>

  $(document).ready(function(){

    $(".promote").on("click",function(){

      var id = $(this).data("student");
      var roll = $(this).data("roll");

      var class_val = <?php echo $class; ?> ;

      $.post("class_upgrade_core_ajax.php",{cls:class_val,student:id,position:roll},function(data){

      });

      $(this).html("Promoted");

      $(this).removeClass("btn");
      $(this).removeClass("btn-info");

    });

  });

</script>
