<?php
session_start();

$localhost = 'localhost';
$dusername = 'root';
$dpassword = 'root';
$database = 'hospital';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
echo "<pre>";

$RoomID = $_POST['RoomID'];
$RoomNumber = $_POST['RoomNumber'];
$BuildingNumber = $_POST['BuildingNumber'];
$FloorNumber = $_POST['FloorNumber'];


       $quiry = "INSERT INTO `room`(`RoomID`, `RoomNumber`, `BuildingNumber`, `FloorNumber`,`EmpID`, `PatientID`  )";
       $quiry.= "VALUES                ('$RoomID','$RoomNumber','$BuildingNumber','$FloorNumber',NULL,NULL)";


$result = mysqli_query($connection, $quiry);

if (!$result)
{
	//echo "1";
    die("Query Faile".  mysqli_errno($connection));   
}

else {
	header( "location: index.html" );
}

?>