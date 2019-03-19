<?php
  require_once("teacher_sidebar.php");
  require_once("Connect.php");
 ?>

 <?php
   if(!isset($_SESSION["teacher"]))
   {
     header("location:login.php?login=false");
   }
   $teacher = $_SESSION["teacher"];
   $flag=2;
  ?>

 <style type="text/css">
     .notActive
     {
       color: #3276b1;
       background-color: #fff;
     }

     .notActive:hover
     {
       color: #3276b1;
       background-color: #fff;
     }

     .btn:focus, .btn:active:focus, .btn.active:focus
     {
       box-shadow: none !important;

       border:none;
     }

     .container_ch {
  display: block;
  position: relative;
  padding-left: 35px;
  cursor: pointer;
}

.container_ch input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

.container_ch:hover input ~ .checkmark {
  background-color: #ccc;
}

.container_ch input:checked ~ .checkmark {
  background-color: #2196F3;
}

.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

.container_ch input:checked ~ .checkmark:after {
  display: block;
}

.container_ch .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

#check_all
{
  margin-left:10px;
}

     .nothing
     {
       display:none;
     }

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
     <h2 class="mt-5 mb-2">Attendance (<?php echo date("d/m/Y") ?>)</h2>

     <form id="select_form" method="POST">
     <div class="row">
       <div class="col-sm-10">
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

       <div class="col-sm-2">
         <button id="select_btn" class="btn btn-primary btn-block" type="submit">Select</button>
       </div>
     </div>
     </form>
     <div>
       <?php

           if(isset($_REQUEST["class"])&& !isset($_REQUEST["nochange"]))
           {
             $req_class = $_REQUEST["class"];
             $className = "SELECT * FROM class WHERE class='$req_class'";
             $classNameRun = mysqli_query($connect,$className);

             $all_attendance = "SELECT * FROM attendance WHERE class='$req_class'";

             $run_all_attendance = mysqli_query($connect,$all_attendance);

             while($data = mysqli_fetch_array($classNameRun))
             {
               $class_name= $data["class_name"];
             }
             echo "<b>Class: ".$class_name."</b>";

       ?>
     </div>
     <div id="error" style="margin-left:20px;color:red;margin-bottom:10px;">

       <?php
           if(isset($_REQUEST["nochange"]))
           {
             echo "Select a class *";
           }

           $date = date("d/m/Y");
           while($data = mysqli_fetch_array($run_all_attendance))
           {
             $check= $data["att_date"];

             if($check==$date)
             {
               echo "Attendance already taken. [Attendance will not save after submission]";
               break;
             }
             else {
               $flag = 0;
             }
           }
          }
       ?>

     </div>

     <table style="background:#d9f0fc;" class="table table-striped">
       <thead style="background-color:#233268e0;color:#ddd">
         <tr>
           <th scope="col">#</th>
           <th scope="col">Name</th>
           <th scope="col">Student ID</th>
           <th scope="col">Roll</th>
           <th scope="col">Check All<input id="check_all" type="checkbox" value="0" checked></th>
         </tr>
       </thead>

       <tbody>

         <form action="attendance_core.php" method="POST">

         <tr>
           <?php
           if(isset($_REQUEST["class"]))
           {
             $class= $_REQUEST["class"];
             $insert = "SELECT * FROM student_auth inner join student on student_auth.Student_ID=student.student_id WHERE class=$class";

           $run = mysqli_query($connect,$insert);

           if($run==true)
           {
             $count=1;
             $count2 = $count+1;
             $str = "$count";
             $str2 = "$count2";
             $array_id = array();
             $array_att = array();
              while($data = mysqli_fetch_array($run))
             {
               $att_id = $data["Student_ID"];
               $class = $data["class"];
               ?>
               <tr>

              <?php echo '<th scope="row">'.$count.'</th>'; ?>
              <?php  echo '<td>'.$data["Name"].'</td>';?>
              <?php  echo '<td>'.$data["Student_ID"].'</td>';?>
              <?php  echo '<td>'.$data["roll"].'</td>'; ?>
              <td>
                <div class="input-group">
                  <label class="container_ch">
    			           <input id="<?php echo "att".$data["Student_ID"]; ?>" class="check_box" type="checkbox" name="attn[<?php echo $data["Student_ID"]; ?>]" checked>
                     <span class="checkmark"></span>
                     <input name="class" type="hidden" value=<?php echo $class; ?>>
                  </label>

    			     </div>
              </td>
              <?php $count++; ?>
             </tr> <?php
             }
           }
         } ?>

         </tr>
      </tbody>
    </table>

          <div class="col-sm-2 m-auto">
            <button id="save_btn" onclick="return false" class="btn btn-block btn-outline-info">Save </button>
          </div>

          <div class="p-5">
  					<div class="mt-2"></div>
  						<div class="row">

  							<div id="popup" class="col-sm-4 m-auto confirm_card">
                  <div class="card bg-dark o-hidden">
                      <div style="" class="card-body p-3 ml-5">
  								        <p>Do you want to submit this attendance ? <a style="text-decoration: none" href="attendance.php"></p>
                            <button id="close" onclick="return false" class="btn btn-outline-danger">Cancel</button> </a> <a style="text-decoration: none" href="attendance_core.php">
  	                          <button class="btn btn-outline-primary">Submit</button> </a>
                      </div>
  			           </div>
  		         </div>
             </div>

      </div>

    </form>
</div>


<script>
$("#select_form").prop("action","attendance.php?nochange");

$("#class").change(function(){

  $("#select_btn").click(function(){
    $("#select_form").prop("action","att_class_select.php");
  });

});

</script>

<script type="text/javascript">

$("#check_all").change(function(){
$(".check_box").prop('checked', $(this).prop("checked"));
});

$('.check_box').change(function(){

if(false == $(this).prop("checked")){
    $("#check_all").prop('checked', false);
}

if ($('.check_box:checked').length == $('.check_box').length ){
$("#check_all").prop('checked', true);

 $(".check_box").val("1");
}
});

</script>

 <?php
   require_once("bottom.php");
  ?>
