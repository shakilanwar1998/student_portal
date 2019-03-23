<?php

  session_start();
  require_once("PDO.php");


  $dbid = $_POST["std_id"];

  $query = $connect->query("SELECT * FROM teacher WHERE Teacher_ID='$dbid'");

    while($data = $query->fetch(PDO::FETCH_OBJ))
    {
      $std_id = $data->Teacher_ID;
      $pwd = $data->auth;
      $name = $data->teacher_name;
      $_SESSION["teacher"] = $std_id;
      $_SESSION["teacher_name"] = $name;
      $_SESSION["teacher_password"] = $pwd;
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
