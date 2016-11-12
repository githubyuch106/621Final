<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1111.css">
</head>
<body>
<?php
require('common.php');

$table = $_POST['member-type'];
$id = $_POST['id'];
$answer = $_POST['answer'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

if ($table == 'patient') {
	$id_col = 'PatientID';
} else if ($table == 'employee') {
	$id_col = 'EmpID';
} else {
	die("Invalid table $table");
}

@$query = "SELECT SecurityAnswer FROM $table WHERE $id_col = '" . mysql_real_escape_string($id)  . "'";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed: " . mysqli_errno($connection));   
}

if ($row = $result->fetch_assoc()) {
	$expected_answer = $row['SecurityAnswer'];

	if (strtolower($answer) != strtolower($expected_answer)) {
		die("Invalid answer!");
	} else if ($password != $confirm_password) {
		die("Passwords don't match!");
	}

	if (!mysqli_query($connection, "UPDATE $table SET Password = '" . mysql_real_escape_string($password) . "' WHERE $id_col = '" . mysql_real_escape_string($id) . "'")) {
		die("Update failed: " . mysqli_errno($connection));
	}
} else {
	die('There is no user with that ID');
}

echo 'Your password was successfuly reset!  Log back in <a href="/project">here</a>.';
?>
</form>
</body>
</html>
