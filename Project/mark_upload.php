<?php
  require_once("teacher_sidebar.php");
  require_once("PDO.php");
 ?>

 <?php
   if(!isset($_SESSION["teacher"]))
   {
     header("location:login.php?login=false");
   }
   $teacher = $_SESSION["teacher"];
   $flag=2;
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
      <h2 class="mt-5 mb-2">Upload Marks</h2>


      <form action="mark_upload_core.php" method="POST">
         <div class="row">
           <div class="col-sm-6">
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

           <div class="col-sm-4">
             <select id="subject" name="subject" class="form-control mb-3" required >



             </select>
           </div>

           <div class="col-sm-2">
             <button onsubmit="return false" id="select_btn" class="btn btn-primary btn-block" type="submit" onclick="getpage();">Select</button>
   </div>

         </div>




         <table class="table table-striped table-secondary table-hover mt-2">
           <thead style="background-color:#356da9;color:#ddd" class="white-text">
          <tr>
            <th scope="col">Roll</th>
            <th scope="col">Name</th>
            <th scope="col">Class</th>
            <th scope="col">Mid Term</th>
            <th scope="col">Quiz 1</th>
            <th scope="col">Quiz 2</th>
            <th scope="col">Quiz 3</th>
            <th scope="col">Final</th>
          </tr>
        </thead>

        <tbody id="result">



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
                 <div style="" class="card-body p-3 ml-3">
                     <p>Do you want to upload marks ?</p>
                       <button id="close" onclick="return false" class="btn btn-outline-danger">Cancel</button>
                         <button class="btn btn-outline-primary">Upload</button>
                 </div>
              </div>
          </div>
        </div>

 </div>

 </form>

  </div>


  <script>
  $("#class_mark").change(function(){

    var class_value = $("#class_mark").val();
      $.post("mark_ajax.php",{cls:class_value},function(data){

        $("#subject").html(data);

      });
       return false;

  });


  $("#select_btn").click(function(){

    var class_value = $("#class_mark").val();
    var sub = $("#subject").val();
      $.post("mark_post.php",{cls:class_value,subject:sub},function(data){

        $("#result").html(data);

      });
       return false;

  });

  </script>


  <script>
  $("#mark_upload_select_form").prop("action","mark_upload.php?nochange");

  $("#class_mark").change(function(){

    $("#select_btn").click(function(){
      $("#mark_upload_select_form").prop("action","select_mark_upload.php");
    });

  });

  </script>


 <?php
   require_once("bottom.php");
  ?>
