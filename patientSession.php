<?php
	//Make sure page cant be accessed without logging in
	if(!isset($_SESSION['PatientID'])) {
		echo "<script  type='text/javascript'>
	                alert('Access Denied. Please Sign in as a Patient.');
	                window.location = 'index.html';
	            </script>";
	    header("Location: index.html");

	}
?>
