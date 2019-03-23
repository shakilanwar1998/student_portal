<?php
  session_start();
  require_once("PDO.php");


  $dbid = $_POST["std_id"];

  $query = $connect->query("SELECT * FROM admin WHERE Admin_ID='$dbid'");

    while($data = $query->fetch(PDO::FETCH_OBJ))
    {
      $std_id = $data->Admin_ID;
      $pwd = $data->auth;
      $_SESSION["admin"] = $std_id;
      $_SESSION["admin_password"] = $pwd;
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
