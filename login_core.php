<?php

  session_start();
  require_once("Connect.php");


  $dbid = $_POST["std_id"];

  $insert = "SELECT * FROM student_auth WHERE Student_ID='$dbid'";

  $run = mysqli_query($connect,$insert);

  if($run==true)
  {
    while($data = mysqli_fetch_array($run))
    {
      $std_id = $data["Student_ID"];
      $pwd = $data["auth"];
      $_SESSION["student"] = $std_id;
      $_SESSION["student_password"] = $pwd;
    }
  }

  $uPwd = $_POST["pass"];

  $pass = md5($uPwd);

  if($pass==$pwd)
  {
    header("location:student_home.php");
  }
  else {
    header("location:login.php?stdnotmatch");
  }
?>
