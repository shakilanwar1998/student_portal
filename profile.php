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
    $id = $_SESSION["student"];
    $pass = $_SESSION["password"];

		$insert = "SELECT * FROM student_auth  JOIN student JOIN class WHERE Student_ID='$id'";

		$run = mysqli_query($connect,$insert);

		if($run==true)
		{
			while($data = mysqli_fetch_array($run))
			{
				$name = $data["Name"];
        $nationality = $data["Nationality"];
        $mobile = $data["Phone"];
        $birthdate = $data["Birthdate"];
        $std_id = $data["Student_ID"];
        $dbpass = $data["auth"];
        $class = $data["class_name"];
        $roll = $data["roll"];
        $father = $data["father"];
        $mother = $data["mother"];
			}
		}

		else
		{
			echo "ERRRRRRRRORRRRRRRRRR";
		}

    if($dbpass!=$pass)
    {
      header("location:login.php");
    }

	?>


  <div class="container">
      <h2 class="mt-5">Profile</h2>
      <div class="row">

        <div class="col-sm-12 mt-5">
          <div class="row">
            <div class="col-sm-3 mt-5 mb-5">
              <div class="ml-3" style="width:100px; height:100px; border:2px solid gray;">
                <img src="im.jpg" alt="">
              </div>
                <h3 class="mt-5"><?php echo " ". $name ?></h3>
            </div>

            <div class="col-sm-8">

              <table class="table table-bordered table-hover">
              <thead class="black white-text">
                <tr>
                  <th scope="row">Name:</th>
                  <td> <?php echo " ". $name ?> </td>
                </tr>

                <tr>
                  <th scope="row">Student ID:</th>
                  <td><?php echo " ". $std_id ?></td>
                </tr>

                <tr>
                  <th scope="row">Father's Name:</th>
                  <td><?php echo " ". $father ?></td>
                </tr>

                <tr>
                  <th scope="row">Mother's Name:</th>
                  <td><?php echo " ". $mother ?></td>
                </tr>

                <tr>
                  <th scope="row">Class:</th>
                  <td><?php echo " ". $class ?></td>
                </tr>

                <tr>
                  <th scope="row">Roll:</th>
                  <td><?php echo " ". $roll ?></td>
                </tr>

                <tr>
                  <th scope="row">Birthdate:</th>
                  <td><?php echo " ". $birthdate ?></td>
                </tr>

                <tr>
                  <th scope="row">Gurdian's Mobile:</th>
                  <td><?php echo " ". $mobile ?></td>
                </tr>

                <tr>
                  <th scope="row">Nationality:</th>
                  <td><?php echo " ". $nationality ?></td>
                </tr>

              </thead>
            </table>

            </div>
          </div>
        </div>

      </div>
    </div>


    <?php
      require_once("bottom.php");
    ?>
