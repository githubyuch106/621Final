<?php

	session_destroy();

	if(!isset($_SESSION['aEmpID'])) {
		echo "<script  type='text/javascript'>
	                alert('Access Denied. Please Sign in as a Doctor.');
	                window.location = 'index.html';
	            </script>";
	    header("Location: index.html");

	}

?>
