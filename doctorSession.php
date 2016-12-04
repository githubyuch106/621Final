<?php
	//Make sure page cant be accessed without logging in
	if(!isset($_SESSION['aEmpID'])) {
		echo "<script  type='text/javascript'>
	                alert('Access Denied. Please Sign in as a doctor');
	                window.location = 'index.html';
	            </script>";
	    header("Location: index.html");

	}
?>