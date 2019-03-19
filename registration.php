<?php
 session_start();
	if(!isset($_SESSION["admin"]))
	{
		header("location:login.php?login=false");
	}
	$admin = $_SESSION["admin"];
 ?>

	<?php require_once("admin_panel_sidebar.php"); ?>

<div class="container">

        <div class="p-5">
					<div class="mt-5"></div>
						<div class="row">

							<div class="col-sm-8">
                <div class="card o-hidden">
                    <div class="card-body p-3 ml-5">
								        <h3 class="mb-5 ml-4">Student Registration</h3>

								            <form id="regform" action="reg_core.php" class="user  pr-5" method="POST" required>

															<div class="form-group row">
															 	<div class="col-sm-6 mb-3 mb-sm-0">
																 	<input type="text" class="form-control" placeholder="First Name" name="fname" required />
															 	</div>

															 	<div class="col-sm-6">
																 	<input type="text" class="form-control" placeholder="Last Name" name="lname" required />
															 	</div>
														  </div>

									               <div class="form-group">
										                   <input type="text" class="form-control" placeholder="Student ID" name="std_id" required />
																	</div>

																	<div class="form-group row">

																		<div class="col-sm-6 mb-3 mb-sm-0">
																			<input type="text" name="father" class="form-control" placeholder="Father's Name" required />
																		</div>

																	 <div class="col-sm-6">
																		 <input type="text" name="mother" class="form-control" placeholder="Mother's Name" required/>
																	 </div>

																	</div>

																		<div class="form-group">
																			<input type="text" class="form-control" placeholder="Gurdian's Mobile" name="mobile" required />
																		</div>

																		<div class="form-group row">

																			<div class="col-sm-6 mb-3 mb-sm-0">
																			  <input type="date" name="birthdate" class="form-control" placeholder="Birth Date" required />
																		  </div>

																		 <div class="col-sm-6">
																			 <input type="text" name="nationality" class="form-control" placeholder="Nationality" required/>
																		 </div>

									                  </div>

                                    <div class="form-group row">

																			<div class="col-sm-6 mb-3 mb-sm-0">
                                          <select name="class" class="form-control" required >
                                            <option><label>Class (select one)</label></option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                            <option value="5">Five</option>
                                            <option value="6">Six</option>
                                            <option value="7">Seven</option>
                                            <option value="8">Eight</option>
                                            <option value="9">Nine</option>
                                            <option value="10">Ten</option>
                                          </select>
																		  </div>

																		 <div class="col-sm-6">
																			 <input type="number" name="roll" class="form-control" placeholder="Roll" required/>
																		 </div>

									                  </div>

																		<div id="error" style="margin-left:20px;color:red;margin-bottom:10px;">
																			<?php if(isset($_REQUEST["alreadyreg"]))
																			{
																				echo "Student already registered";
																			} ?>

																		</div>

                                    <div class="col-md">
									                     <button type="submit" id="submit_button" class="btn btn-primary btn-user btn-block form-control">Registration</button>
                                    </div>

									                  <div class="mb-5"></div>

                                </div>
                            </form>
                     </div>
			           </div>
		         </div>
           </div>
		</div>


		<?php require_once("bottom.php"); ?>
