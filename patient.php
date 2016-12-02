<?php session_start(); ?>
<html>
<body>
<form action="logout.php">
    <input type="submit" value="LogOut" />
</form>

<form action="patientProfile.php">
    <input type="submit" value="Profile" />
</form>
</body>
</html>
<?php

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "No Connection to DB";
} 
//echo "Connected successfully";
//echo "<pre>";
$PatientID = $_SESSION['PatientID'];
//echo $PatientID;

//==============================================================================================================
	 $quiry1 = "SELECT * from report WHERE PatientID = '$PatientID'";

	 $result1 = mysqli_query($connection, $quiry1);
//echo $result;
if (!$result1)
{
	
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result1->num_rows > 0) {
	// output data of each row
	echo "<table width='20%' height='20%'>";

	echo "<tr>";
	echo "<td>Report</td>";

	echo "</tr>";
	while($row = $result1->fetch_assoc()) {
	$Description = $row['Description'];
	echo "<tr>";
	echo "<td>$Description</td>";


	echo "<td colspan='2'>". "<a href = 'patientListMedicine.php?ReportID=$row[ReportID]'>Medicine</a>".  "</td>";
	//echo "<br>";
	echo "</tr>";

	}
} else {
	echo "There is no Report";
	//header("location:regist.html");

	//echo "0 results";
}
echo "</table>";
//echo "</pre>";

function minute_to_time($min) {
	$hour = floor($min / 60);
	$postmark = $hour >= 12 ? 'PM' : 'AM';
	$hour = $hour % 12;
	if ($hour == 0) {
		$hour = 12;
	}

	return sprintf("%d:%02d %s", $hour, $min % 60, $postmark);
}

$id = $_SESSION['PatientID'];
?>
<h2>Appointments</h2>
<?php
$q = $connection->prepare('SELECT VisitID, UNIX_TIMESTAMP(Time), Lname FROM appointment JOIN employee USING (EmpID) WHERE PatientID = ?');
$q->bind_param('s', $id);
$q->execute();
$q->bind_result($appt_id, $time, $dr_name);
?>
<form method="POST" action="cancel-appointment.php">
<table>
<thead>
<tr><th></th><th>Date/Time</th><th>Doctor</th></tr>
</thead>
<tbody>
<?php while ($q->fetch()): ?>
<tr><td><input type="radio" name="appt_id" value="<?= $appt_id ?>"></td><td><?= date('j F Y g:i a', $time) ?></td><td>Dr. <?= $dr_name ?></td></tr>
<?php endwhile ?>
</tbody>
</table>
<p><input type="submit" name="submit" value="Cancel"></p>
</form>

<h2>Create Appointment</h2>
<?php
$q = $connection->prepare('SELECT EmpID, Lname FROM employee WHERE JobTitle = \'Doctor\'');
$q->execute();
$q->bind_result($id, $lname);
?>
<form method="POST" action="create-appointment.php">
<p><label>Date:</label> <input type="text" name="Date"></p>
<p><label>Time:</label> <select name="Time">
<?php for ($minute = 60*8; $minute <= 60*19; $minute += 30): ?>
	<option value="<?= $minute*60 ?>"><?= minute_to_time($minute) ?></option>
<?php endfor ?>
</select></p>
<p><label>Doctor: <select name="EmpID">
<?php while ($q->fetch()): ?>
<option value="<?= $id ?>">Dr. <?= $lname ?></option>
<?php endwhile ?>
</select></p>
<p><input type="submit" value="Create appointment"></p>
</form>
