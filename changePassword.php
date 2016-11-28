<?php
	session_start();

	//Make sure page cant be accessed without logging in
    if(!isset($_SESSION['EmpID'])) {
        header("Location: home.html");
    }

	$empID = $_SESSION['EmpID'];
	$pword = $_POST['password'];

	
	$localhost = 'localhost';
    $username = 'root';
	$password = 'root';
	$database = 'hospital';

	$query = "UPDATE employee SET Password = '$pword' WHERE EmpID = '$empID'";

	//*** create a connection object
	$connection = mysql_connect($localhost, $username, $password)
			or die (mysql_error());

	mysql_select_db($database)
			or die (mysql_error());

	//*** execute the query
	$result = mysql_query($query);
	$_SESSION['PassChanged'] = 1;

	header("Location: settings.php");
?>