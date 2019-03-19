<?php

  session_start();
  require_once("Connect.php");


  $dbid = $_POST["std_id"];

  $insert = "SELECT * FROM teacher WHERE Teacher_ID='$dbid'";

  $run = mysqli_query($connect,$insert);

  if($run==true)
  {
    while($data = mysqli_fetch_array($run))
    {
      $std_id = $data["Teacher_ID"];
      $pwd = $data["auth"];
      $name = $data["Name"];
      $_SESSION["teacher"] = $std_id;
      $_SESSION["teacher_name"] = $name;
      $_SESSION["teacher_password"] = $pwd;
    }
  }

  $uPwd = $_POST["pass"];

  $pass = md5($uPwd);

  if($pass==$pwd)
  {
    header("location:teacher_home.php");
  }
  else {
    header("location:login.php?tcrnotmatch");
  }
?>
