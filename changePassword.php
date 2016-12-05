<?php
    session_start();
	require 'doctorSession.php';

	$empID = $_SESSION['aEmpID'];
	$pword = $_POST['password'];

	$query = "UPDATE employee SET Password = '$pword' WHERE EmpID = '$empID'";

	require 'common.php';
	$connection = new mysqli($localhost , $dusername , $dpassword,$database);
	if ($connection->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		echo "No Connection to DB";
	} 
	
	$_SESSION['PassChanged'] = 1;

	header("Location: settings.php");
?>
