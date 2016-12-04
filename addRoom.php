<div class="logo">
            	<a href=""><img src="/621Final/images/Saint_Joseph's_University_seal.png" alt="" width="80" height="80" /></a> Team 8<br><span>Hospital Database Management</span>
            	
            </div>
<style>
.logo {
	margin-left: 0px;
	margin-top: 10px;
	padding-left: 5px;
	padding-right:5px;
	border-radius: 10px;
	background-color: #98B8F3;	
	margin-right: 50px;
	}
.body{
margin-left: 50px;
}
</style>

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
