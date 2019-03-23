<?php require_once("PDO.php");
$class= $_REQUEST["cls"];?>



<form action="attendance_core.php" method="POST">

<div class="row">
  <div class="col-sm-2">
    <select class="form-control" name="day">
     <option value="">Day</option>
     <option value="1">1</option>
     <option value="2">2</option>
     <option value="3">3</option>
     <option value="4">4</option>
     <option value="5">5</option>
     <option value="6">6</option>
     <option value="7">7</option>
     <option value="8">8</option>
     <option value="9">9</option>
     <option value="10">10</option>
     <option value="11">11</option>
     <option value="12">12</option>
     <option value="13">13</option>
     <option value="14">14</option>
     <option value="15">15</option>
     <option value="16">16</option>
     <option value="17">17</option>
     <option value="18">18</option>
     <option value="19">19</option>
     <option value="20">20</option>
     <option value="21">21</option>
     <option value="22">22</option>
     <option value="23">23</option>
     <option value="24">24</option>
     <option value="25">25</option>
     <option value="26">26</option>
     <option value="27">27</option>
     <option value="28">28</option>
     <option value="29">29</option>
     <option value="30">30</option>
     <option value="31">31</option>
   </select>
  </div>

  <div class="col-sm-2" >
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

  <div class="col-sm-2">
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
</div>

  <table style="background:#d9f0fc;" class="table table-striped mt-3">
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
      <tr>
           <?php

             $insert = $connect->query("SELECT * FROM student_auth inner join student on student_auth.Student_ID=student.student_id WHERE class=$class");

             $count=1;
             $count2 = $count+1;
             $str = "$count";
             $str2 = "$count2";
             $array_id = array();
             $array_att = array();
              while($data = $insert->fetch(PDO::FETCH_OBJ))
             {
               $att_id = $data->Student_ID;
               $class = $data->class;
               ?>
               <tr>

              <?php echo '<th scope="row">'.$count.'</th>'; ?>
              <?php  echo '<td>'.$data->Name.'</td>';?>
              <?php  echo '<td>'.$data->Student_ID.'</td>';?>
              <?php  echo '<td>'.$data->roll.'</td>'; ?>
              <td>
                <div class="input-group">
                  <label class="container_ch">
    			           <input id="<?php echo "att".$data->Student_ID; ?>" class="check_box" type="checkbox" name="attn[<?php echo $data->Student_ID; ?>]" checked>
                     <span class="checkmark"></span>
                     <input name="class" type="hidden" value=<?php echo $class; ?>>
                  </label>

    			     </div>
              </td>
              <?php $count++; ?>
             </tr> <?php
             }
         ?>

         </tr>
   </tbody>
 </table>

<div class="col-sm-2 m-auto">
  <button id="save_btn" class="btn btn-block btn-outline-info">Save </button>
</div>

</form>


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
