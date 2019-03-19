<?php

  session_start();
  require_once("Connect.php");


  $dbid = $_POST["std_id"];

  $insert = "SELECT * FROM admin WHERE Admin_ID='$dbid'";

  $run = mysqli_query($connect,$insert);

  if($run==true)
  {
    while($data = mysqli_fetch_array($run))
    {
      $std_id = $data["Admin_ID"];
      $pwd = $data["auth"];
      $_SESSION["admin"] = $std_id;
      $_SESSION["admin_password"] = $pwd;
    }
  }

  $uPwd = $_POST["pass"];

  $pass = md5($uPwd);

  if($pass==$pwd)
  {
    header("location:admin_home.php");
  }
  else {
    header("location:login.php?admnotmatch");
  }
?>
