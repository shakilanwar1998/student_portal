<?php
  session_start();
?>


<?php
  require_once("Connect.php");
?>

<?php
  require_once("sidebar.php");
?>


    <div class="container">
      <h3 class="mt-5">Dashboard</h3>
      <div class="row">

        <div class="col-sm-3 mt-5">
          <div style="border-left:4px solid #4e73df;" class="card o-hidden">
              <div class="card-body p-3">
                <p class="pl-2">Total Payable</p>
                <h4 class="pl-2">BDT 2,30,000</h4>
              </div>
          </div>
        </div>

        <div class="col-sm-3 mt-5">
          <div style="border-left:4px solid #1cc88a;" class="card o-hidden">
              <div class="card-body p-3">
                <p class="pl-2">Total Payable</p>
                <h4 class="pl-2">BDT 2,30,000</h4>
              </div>
          </div>
        </div>

        <div class="col-sm-3 mt-5">
          <div style="border-left:4px solid #36b9cc;" class="card o-hidden">
              <div class="card-body p-3">
                <p class="pl-2">Total Payable</p>
                <h4 class="pl-2">BDT 2,30,000</h4>
              </div>
          </div>
        </div>

        <div class="col-sm-3 mt-5">
          <div style="border-left:4px solid #f6c23e;" class="card o-hidden">
              <div class="card-body p-3">
                <p class="pl-2">Total Payable</p>
                <h4 class="pl-2">BDT 2,30,000</h4>
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
