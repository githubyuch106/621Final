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

$PatientID = $_POST['patientID'];
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Address = $_POST['Address'];
$BloodType = $_POST['BloodType'];
$Sex = $_POST['Sex'];
$Weight = $_POST['Weight'];
$Height = $_POST['Height'];
$Vitals = $_POST['Vitals'];
$Password = $_POST['Password'];


echo"1";
         $Image= addslashes($_FILES['Image']['tmp_name']);
		//$name= addslashes($_FILES['Image']['name']);
		echo"$Image";
		//echo"name";
		//$Image= file_get_contents($Image);
		//$Image= base64_encode($Image);
		// echo"Image";
		//echo"name";

       $quiry = "INSERT INTO `patient`(`PatientID`, `Fname`, `Lname`, `Address`, `BloodType`,`Sex` , `Weight`, `Height`,`EmpID`, `Vitals`, `Password`,`ReportID`,`RoomID`,`VisitID` ,`Image`,`Image_name` )";
       $quiry.= "VALUES                ('$PatientID','$Fname','$Lname','$Address','$BloodType','$Sex' , '$Weight','$Height', NULL, '$Vitals','$Password',NULL,NULL,NULL , '$Image', '$name')";


$result = mysqli_query($connection, $quiry);

if (!$result)
{
	//echo "1";
    die("Query Faile".  mysqli_errno($connection));   
}

else {
	//header( "location: index.html" );
}

?>