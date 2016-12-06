<?php

	if(!isset($_SESSION['PatientID'])) {
		session_destroy();
		echo "<script  type='text/javascript'>
	                alert('Access Denied. Please Sign in as a Patient.');
	                window.location = 'index.html';
	            </script>";
	    header("Location: newindex.html");

	}

?>
