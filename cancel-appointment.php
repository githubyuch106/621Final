<?php
require 'common.php';
session_start();
$id = $_SESSION['PatientID'];
$appt_id = $_POST['appt_id'];

var_dump($id);
var_dump($appt_id);

$q = $connection->prepare('DELETE FROM appointment WHERE VisitID = ? AND PatientID = ?');
$q->bind_param('dd', $appt_id, $id);
$q->execute();

header('Location: patient.php');

