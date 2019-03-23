<?php

	try {
		$connect = new PDO("mysql:host=127.0.0.1;dbname=student","shakilanwar1998","09shakil1998");
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (\Exception $e) {
		echo $e->getMessage();
	}
?>
