<?php
require 'common.php';
session_start();
$id = $_SESSION['PatientID'];
$date = $_POST['Date'];
$time = $_POST['Time'];
$empid = $_POST['EmpID'];
$timestamp = strtotime($date) + (int)$time;

$q = $connection->prepare('INSERT INTO appointment (PatientID, Time, EmpID) VALUES (?, FROM_UNIXTIME(?), ?)');
$q->bind_param('sds', $id, $timestamp, $empid);
$q->execute();

header('Location: patient.php');

