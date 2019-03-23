<?php
  session_start();
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

     <div class="row">
       <div class="col-sm-4">
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
       </div>

     <div id="class_students">

    </div>

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

<script>
    $("#class").change(function(){
      var class_val = $("#class").val();
      $.post("att_ajax.php",{cls:class_val},function(data){
        $("#class_students").html(data);
      });
  });
</script>

 <?php
   require_once("bottom.php");
  ?>
