<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
echo "<pre>";

//$RoomID = $_POST['RoomID'];
$RoomNumber = $_POST['RoomNumber'];
$BuildingNumber = $_POST['BuildingNumber'];
$FloorNumber = $_POST['FloorNumber'];


       $quiry = "INSERT INTO `room`(`RoomNumber`, `BuildingNumber`, `FloorNumber`,`EmpID`, `PatientID`  )";
       $quiry.= "VALUES                ('$RoomNumber','$BuildingNumber','$FloorNumber',NULL,NULL)";


$result = mysqli_query($connection, $quiry);

if (!$result)
{
	//echo "1";
    die("Query Faile".  mysqli_errno($connection));   
}

else {
	header( "location: AdminListRoom.php" );
}

?>
