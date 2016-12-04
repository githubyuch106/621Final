<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1111.css">
</head>
<body>
<form method="POST" action="forgot-password3.php">
<?php
require('common.php');

@$table = $_POST['member-type'];
$id = $_POST['id'];

if ($table == 'patient') {
	$id_col = 'PatientID';
} else if ($table == 'employee') {
	$id_col = 'EmpID';
} else {
	die("You must choose employee or patient");
}

@$query = "SELECT SecurityQuestion FROM $table WHERE $id_col = $id";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("Query failed: " . mysqli_errno($connection));   
}

if ($row = $result->fetch_assoc()) {
	$question = $row['SecurityQuestion'];

	if (!$question) {
		die("Sorry, you don't have a security question.  Please contact the admin.");
	} else {
		echo "<p>Security question: $question</p>";
	}
} else {
	die('There is no user with that ID');
} ?>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="member-type" value="<?php echo $table; ?>">
<p>Answer: <input type="text" name="answer"></p>
<p>Desired password: <input type="password" name="password"></p>
<p>Repeat desired password: <input type="password" name="confirm-password"></p>
<p><input type="submit" value="Reset password"></p>
</form>
</body>
</html>
