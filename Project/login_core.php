<?php

  session_start();
  require_once("PDO.php");


  $dbid = $_POST["std_id"];

  $insert = $connect->query("SELECT * FROM student_auth WHERE Student_ID='$dbid'");

    while($data = $insert->fetch(PDO::FETCH_OBJ))
    {
      $std_id = $data->Student_ID;
      $pwd = $data->auth;
      $_SESSION["student"] = $std_id;
      $_SESSION["student_password"] = $pwd;
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
