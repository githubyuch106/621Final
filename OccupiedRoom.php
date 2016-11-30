<?php 
session_start();
//$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
//echo $Name;
echo "Occupied Rooms";
require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "No Connection to DB";
} 
//echo "Connected successfully";
echo "<pre>";

//$aEmpID = $_SESSION['aEmpID'];
//echo $aEmpID;
echo "<pre>";
 
	 $quiry = "SELECT * from occupiedroom";

	 $result = mysqli_query($connection, $quiry);
//echo $result;
echo "<pre>";
if (!$result)
{
	
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table align='left' width='20%' height='20%'>";
	
	   echo "<tr>";
	   echo "<td>Bulilding-Floor-Room</td>";
	   echo "<td>Doctor Name</td>";
       echo "<td>Patient Name</td>";
	   

		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $Location = $row['Location'];
	   $Doctor = $row['Doctor'];
       $Patient =  $row['Patient'];
		
		
       echo "<tr>";
       echo "<td>$Location</td>";
	    echo "<td>$Doctor</td>";
       echo "<td>$Patient</td>";

	  
	   //echo "<br>";
	   echo "</tr>";
		
    }
} else {
	
		echo "There is no patients";
		//header("location:regist.html");

    //echo "0 results";
	echo "</table>";
}







?>
