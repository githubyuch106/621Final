<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$Address = $_POST['Address'];
$BloodType = $_POST['BloodType'];
$Sex = $_POST['Sex'];
$Weight = $_POST['Weight'];
$Height = $_POST['Height'];
$Vitals = $_POST['Vitals'];
$Password = $_POST['Password'];
$SecurityQuestion = $_POST['SecurityQuestion'];
$SecurityAnswer = $_POST['SecurityAnswer'];
$Email = $_POST['Email'];

 $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
 $name = addslashes($_FILES['image']['name']);

         $quiry = "INSERT INTO `patient`(`Fname`, `Lname`, `Address`, `BloodType`,`Sex` , `Weight`, `Height`,`EmpID`, `Vitals`, `Password`,`ReportID`,`RoomID`,`VisitID`,`SecurityQuestion` , `SecurityAnswer`, `Email`, `image` ,`name`)";
          $quiry.= "VALUES              ('$Fname','$Lname','$Address','$BloodType','$Sex' , '$Weight','$Height', NULL, '$Vitals','$Password',NULL,     NULL,      NULL ,      NULL,               NULL,       '$Email','$image' ,'$name' )";


$result = mysqli_query($connection, $quiry);

if (!$result)
{
	//echo "1";
    die("Query Faile".  mysqli_error($connection));   
}

else {
	header( "location: AdminListPatient.php" );
}

?>
