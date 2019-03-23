<?php
  session_start();
  require_once("PDO.php");
  require_once("sidebar.php");

  $student = $_SESSION["student"];

  $query = $connect->query("SELECT * FROM dashboard WHERE student_id = '$student'");
  $data = $query->fetch(PDO::FETCH_OBJ);

  $payable = $data->total_payable;
  $paid = $data->paid;
  $due = $data->due;
?>


    <div class="container">
      <h3 class="mt-5">Dashboard</h3>
      <div class="row">

        <div class="col-sm-3 mt-5">
          <div style="border-left:4px solid #4e73df;" class="card o-hidden">
              <div class="card-body p-3">
                <p class="pl-2">Total Payable</p>
                <h4 class="pl-2"><?php echo $payable; ?> Taka</h4>
              </div>
          </div>
        </div>

        <div class="col-sm-3 mt-5">
          <div style="border-left:4px solid #1cc88a;" class="card o-hidden">
              <div class="card-body p-3">
                <p class="pl-2">Total Paid</p>
                <h4 class="pl-2"><?php echo $paid; ?> Taka</h4>
              </div>
          </div>
        </div>

        <div class="col-sm-3 mt-5">
          <div style="border-left:4px solid #36b9cc;" class="card o-hidden">
              <div class="card-body p-3">
                <p class="pl-2">Total Due</p>
                <h4 class="pl-2"><?php echo $due; ?> Taka</h4>
              </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      if(isset($_REQUEST["action"]))
      {
        echo $_REQUEST["action"];
      }
     ?>

    <?php
      require_once("bottom.php");
    ?>
