
<?php
session_start();
?>
<html>
<body>
<form action="logout.php">
    <input type="submit" value="LogOut" />
</form>

<form action="patientProfile.php">
    <input type="submit" value="Profile" />
</form>
</body>
</html>
<?php

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "No Connection to DB";
} 
//echo "Connected successfully";
echo "<pre>";
$PatientID = $_SESSION['PatientID'];
//echo $PatientID;
echo "<pre>";

//==============================================================================================================
	 $quiry1 = "SELECT * from report WHERE PatientID = '$PatientID'";

	 $result1 = mysqli_query($connection, $quiry1);
//echo $result;
echo "<pre>";
if (!$result1)
{
	
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result1->num_rows > 0) {
    // output data of each row
	echo "<table align='left' width='20%' height='20%'>";
	
	   echo "<tr>";
	   echo "<td>Report</td>";
	 
		echo "</tr>";
    while($row = $result1->fetch_assoc()) {
	   $Description = $row['Description'];
       echo "<tr>";
       echo "<td>$Description</td>";

	
      echo "<td colspan='2'>". "<a href = 'patientListMedicine.php?ReportID=$row[ReportID]'>Medicine</a>".  "</td>";
	   //echo "<br>";
	   echo "</tr>";
		
    }
} else {
	
		echo "There is no Report";
		//header("location:regist.html");

    //echo "0 results";
	echo "</table>";
}

?>
