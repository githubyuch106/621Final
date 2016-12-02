<?php

$localhost = 'localhost';
$dusername = 'root';
$dpassword = '';
$database = 'hospital';
$connection = new mysqli($localhost, $dusername, $dpassword, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

