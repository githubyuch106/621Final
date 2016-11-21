<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$SSN = $_POST['SSN'];
$Fname = $_POST['Fname'];
$Lname = $_POST['Lname'];
$PhoneNumber = $_POST['PhoneNumber'];
$Salary = $_POST['Salary'];
$JobTitle = $_POST['JobTitle'];
$Password = $_POST['Password'];
$SecurityQuestion = $_POST['SecurityQuestion'];
$SecurityAnswer = $_POST['SecurityAnswer'];

        $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$name = addslashes($_FILES['image']['name']);	
 
  $quiry = "INSERT INTO `employee`( `SSN`, `Fname`, `Lname`, `PhoneNumber`, `Salary`, `Password`, `JobTitle`,`SecurityQuestion` , `SecurityAnswer`, `Email` , `image` , `name`)";
 $quiry.=                 "VALUES('$SSN','$Fname','$Lname','$PhoneNumber','$Salary','$Password','$JobTitle' ,      NULL,                NULL,        '$Email' ,'$image' ,'$name')";


$result = mysqli_query($connection, $quiry);

if (!$result)
{
	echo "1";
    die("Query Faile".  mysqli_errno($connection));   
}

else {
		header( "location: AdminListEmployee.php" );
}

?>
