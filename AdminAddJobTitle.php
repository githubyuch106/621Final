<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
echo "<pre>";

$JobTitle = $_POST['JobTitle'];

       $quiry = "INSERT INTO `jobtitle`(`Position`)";
       $quiry.= "VALUES                ('$JobTitle')";


$result = mysqli_query($connection, $quiry);

if (!$result)
{
	//echo "1";
    die("Query Faile".  mysqli_errno($connection));   
}

else {
	header( "location: AdminListJobTitle.php" );
}

?>
