<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

$PatientID = $_SESSION['PatientID'];
echo $PatientID; echo "<pre>";
$findEmpID = mysqli_query($connection,"SELECT EmpID FROM patient WHERE PatientID = '$PatientID'");
 $row = mysqli_fetch_array($findEmpID,MYSQLI_ASSOC);
   
   $user = $row['EmpID'];
   
   echo $user;  echo "<pre>";

//echo $user;echo "<pre>";
$Description = $_POST['Description'];
echo $Description; echo "<pre>";

     $query = "INSERT INTO `report`(`ReportID`, `EmpID`,     `Description`,  `MedicineID`,`PatientID`)";
     $query.= "VALUES                (4 ,  '$user','$Description' , NULL ,      $PatientID)";

		 $result = mysqli_query($connection, $query);

if (!$result)
{
	//echo "1";
    die("Query Faile".  mysqli_errno($connection));   
}

else {
	header( "location: doctor.php" );
}

?>
