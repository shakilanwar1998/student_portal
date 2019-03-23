<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="style1.css" />

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="popper.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="bootstrap-confirmation.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <style>
  #sidebar, #sidebarCollapse
  {
    background:#0f1d3fc9;
  }

  #content {
      width: 100%;
      min-height: 100vh;
      transition: all 0.3s;
  }

  #navbar_top{
    padding:21.5px;
  }
  </style>

</head>
<body>

  <div class="wrapper">
    <nav id="sidebar" class="active">
        <div style="background:#0f1d3f00;border-bottom:1px solid #57568f" class="sidebar-header">
          <h3>LOGO</h3>
        </div>

        <ul class="list-unstyled components">
          <li>
              <a href="student_home.php">Home</a>
          </li>

          <li>
              <a href="dashboard.php">Dashboard</a>
          </li>

            <li>
                <a href="profile.php">Profile</a>
            </li>

            <li>
                <a href="result.php">Result</a>
            </li>

            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>

            <li>
                <a href="logout_core.php">Logout</a>
            </li>

        </ul>
    </nav>


    <div id="content">
        <nav id="navbar_top" class="navbar bg-dark">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>

            </div>
        </nav>
