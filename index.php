<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
  	<link rel="stylesheet" href="style1.css" />

    <style>

      .h4, h4
      {
        margin-top: 15px !important;
      }

      body{
        background:#54269fd9;
      }

      .class2
      {
        margin-left:150px !important;
      }

      #btn_ad{width:170px; height:80px;}
      </style>
  </head>
  <body>
    <div class="container">

      <div class="wraper class2 m-5 p-5">
      <div class="row">
        <div id="student" class="col-sm-4 mb-5">
          <form action="student_home.php">
          <div class="btn-group">
              <label style="padding:20px;font-size:20px;" class="btn btn-danger">
              <button style="display:none;" ></button> <i class="fas fa-user-graduate"></i>
              </label>
              <label class="btn btn-outline-danger">
              <button style="display:none;"></button><h4>Student</h4>
            </label>
          </div>
          </form>
        </div>


        <div id="teacher" class="col-sm-4 mb-5">
          <form action="teacher_home.php">
          <div class="btn-group">
              <label style="padding:20px;font-size:20px;" class="btn btn-warning">
              <button style="display:none;" ></button> <i class="fas fa-user-tie"></i>
              </label>
              <label class="btn btn-outline-warning">
              <button style="display:none;"></button><h4>Teacher</h4>
            </label>
          </div>
          </form>
        </div>


        <div id="admin" class="col-sm-4 mb-5">
          <form action="admin_home.php">
          <div class="btn-group" id="btn_ad">
              <label style="padding:20px;font-size:20px;" class="btn btn-info">
              <button style="display:none;" ></button> <i class="fas fa-globe"></i>
              </label>
              <label class="btn btn-outline-info btn-block">
              <button style="display:none;"></button><h4>Admin</h4>
            </label>
          </div>
          </form>
        </div>

      </div>
      </div>


      <div style="color:#9edd8e;" class="content text-center">

        <div><h1>Welcome to</h1></div> </br>
        <div style="color:#f8b289;"><h1><b>Smart Student Portal</b></h1></div>

      </div>
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <script>

  $(document).ready(function(){
    if(screen.width<1000)
    {
      $(".wraper").removeClass(".class2");
    }

  });


</script>


</html>
