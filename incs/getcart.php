<?php 
	session_start();
	if (!isset($_SESSION['shop'])) {
		echo "0";
		/// print_r($_SESSION['shop']);
	}else{
		echo count($_SESSION['shop']);
	}

?>