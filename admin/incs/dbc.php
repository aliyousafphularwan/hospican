<?php

	$conn = mysqli_connect("localhost", "root", "", "tools");

	if (!$conn) {
		echo "error connection. " or die(mysql_error());	}

?>