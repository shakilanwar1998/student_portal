<?php

	$host ="localhost";
	$dbUser="shakilanwar1998";
	$dbPwd="09shakil1998";
	$dbName="student";

	$connect = mysqli_connect($host,$dbUser,$dbPwd,$dbName);


	if($connect==false)
	{
		echo "Database Connection Error !!";
	}

?>
