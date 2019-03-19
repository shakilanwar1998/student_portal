<?php
	session_start();
	require_once("Connect.php");

	$name = $_REQUEST["fname"]." ".$_REQUEST["lname"];
	$mobile = $_REQUEST["mobile"];
	$std_id = $_REQUEST["std_id"];
	$pass = $std_id;
	$nationality = $_REQUEST["nationality"];
	$birthdate = $_REQUEST["birthdate"];
	$father = $_REQUEST["father"];
	$mother = $_REQUEST["mother"];

	$class = $_REQUEST["class"];
	$roll = $_REQUEST["roll"];

	$password = md5($pass);

	$check= "SELECT * FROM student_auth inner join student on student_auth.Student_ID=student.student_id ";

	$check_run = mysqli_query($connect,$check);

	$flag = 0;
	while($data = mysqli_fetch_array($check_run))
	{
		if($data["Student_ID"]==$std_id)
		{
			header("location:registration.php?alreadyreg");
			$flag =1;
		}
	}

	if($flag==0)
	{
		$insert = "INSERT INTO student_auth(Name, Student_ID,father,mother, Phone, Nationality, Birthdate, auth) VALUES ('$name', '$std_id','$father','$mother','$mobile', '$nationality', '$birthdate', '$password')";
		$run = mysqli_query($connect,$insert);

		header("location:reg_class.php?id=$std_id&class=$class&roll=$roll");
	}

?>
