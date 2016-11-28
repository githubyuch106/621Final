<?php require 'common.php'; ?>
<h1>Patient</h1>

<h2>Your information</h2>
<?php
session_start();

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

$q = $connection->prepare('SELECT Fname, Lname, Address, BloodType, Sex, Weight, Height, Vitals FROM patient WHERE PatientID = ?');
$q->bind_param('s', $id);
$q->execute();
$q->bind_result($fname, $lname, $address, $blood_type, $sex, $weight, $height, $vitals);
$q->fetch();
?>
<p>First name: <?= $fname ?></p>
<p>Last name: <?= $lname ?></p>
<p>Address: <?= $address ?></p>
<p>Blood type: <?= $blood_type ?></p>
<p>Sex: <?= $sex ?></p>
<p>Weight: <?= $weight ?></p>
<p>Height: <?= $height ?></p>
<p>Vitals: <?= $vitals ?></p>
<?php $q->close(); ?>

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
