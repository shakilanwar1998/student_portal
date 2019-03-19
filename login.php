<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>

	<style>
	body
	{
		background:#322348;
	}

	.form-control
	{
		border-radius:20px;
	}

	</style>

	<title>Document</title>
</head>
<body>

<div class="container">

        <div class="p-5">
					<div class="mt-5"></div>
						<div class="row">

							<div class="col-sm-6 m-auto">
                <div class="card o-hidden">
                    <div class="card-body p-3 ml-5">
												<div class="row">
													<div class="col-sm-4">
														<h3 class="mb-5 ml-4">Log in</h3>
													</div>
													<div class="col-sm-2">
														<select id="select_user" style="margin-left:100px; padding:5px; margin-top:5px; border:2px solid #ddd;" name="login_as">
															<option style="padding:5px;background:#ddd;" value="0">Select User</option>
															<option style="padding:5px;background:#ddd;" value="1">Student</option>
															<option style="padding:5px;background:#ddd;" value="2">Admin</option>
															<option style="padding:5px;background:#ddd;" value="3">Teacher</option>
														</select>
													</div>
												</div>

												<div id="error" style="margin-left:20px;color:red;margin-bottom:10px;">

													<?php
															if(isset($_REQUEST["login"])=="false")
															{
																echo "You must log in first";
															}
													?>

												</div>

								            <form method="POST" id="login" class="user pr-5">

									               <div class="form-group">
                                    <div class="col-md mb-3">
										                   <input type="text" id="std_id" name="std_id" class="form-control" placeholder="Enter ID"/>
									                  </div>

									                  <div class="form-group">
										                   <div class="col-md">
											                      <input type="password" id="password" name="pass" class="form-control" placeholder="Enter Password"/>
										                   </div>
									                  </div>

																		<div id="error" style="margin-left:20px;color:red;margin-bottom:10px;">

																			<?php
																					if(isset($_REQUEST["stdnotmatch"]))
																					{
																						echo "Student ID or password not matched";
																					}
																					if(isset($_REQUEST["admnotmatch"]))
																					{
																						echo "Admin ID or password not matched";
																					}
																					if(isset($_REQUEST["nochange"]))
																					{
																						echo "Please select a user";
																					}
																			?>

																		</div>

                                    <div class="col-md">
									                     <button id="login_btn" type="submit" class="btn btn-primary btn-user btn-block form-control">Log in</button>
                                    </div>

									                  <div class="mb-5"></div>

                                </div>
                            </form>
                     </div>
			           </div>
		         </div>
           </div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script>

			$(document).ready(function () {
				$("#login").prop("action","login.php?nochange");
        $("#select_user").change(function () {
            var usr = $(this);
            var user = usr.val();

						$("#login_btn").click(function(){
							if(user==1)
							{
								$("#login").prop("action","login_core.php");
							}

							if(user==2) {
								$("#login").prop("action","admin_login_core.php");
							}
							if(user==3) {
								$("#login").prop("action","teacher_login_core.php");
							}
						});
        });
    });
	</script>

</body>
</html>
