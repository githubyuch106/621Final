<?php

	if(!isset($_SESSION['aEmpID'])) {
		session_destroy();
		echo "<script  type='text/javascript'>
	                alert('Access Denied. Please Sign in as a Doctor.');
	                window.location = 'index.html';
	            </script>";
	    header("Location: newindex.html");

	}

?>
