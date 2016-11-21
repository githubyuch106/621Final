<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$ReportID = $_SESSION['ReportID'];
echo $ReportID; echo "<pre>";
$findEmpID = mysqli_query($connection,"SELECT ReportID FROM report WHERE ReportID = '$ReportID'");
 $row = mysqli_fetch_array($findEmpID,MYSQLI_ASSOC);
   
   $user = $row['ReportID'];
   
   echo $user;  echo "<pre>";

//echo $user;echo "<pre>";
$Treatment = $_POST['Treatment'];
echo $Treatment; echo "<pre>";

     $query = "INSERT INTO `medicine`(`ReportID`,`Treatment`)";
     $query.= "VALUES                ('$user','$Treatment')";

		 $result = mysqli_query($connection, $query);

if (!$result)
{
	//echo "1";
    die("Query Faile".  mysqli_errno($connection));   
}

else {
	header( "location: Doctor.php" );
}

?>
