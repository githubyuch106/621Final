<?php
session_start();
?>
<html>
<body>
<form action="patient.php">
    <input type="submit" value="Main Page" />
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
 
	 $quiry = "SELECT * from patient WHERE PatientID = '$PatientID'";

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
	   echo "<td>PatientID</td>";
	   echo "<td>Image</td>";
       echo "<td>First Name</td>";
	   echo "<td>Last Name</td>";
	   echo "<td>Address</td>";
	   echo "<td>BloodType</td>";
	   echo "<td>Sex</td>";
	   echo "<td>Weight</td>";
	   echo "<td>Height</td>";
	   echo "<td>Vitals</td>";
		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $PatientID = $row['PatientID'];
       $Fname =  $row['Fname'];
	   $Lname =  $row['Lname'];
	   $Address =  $row['Address'];
	   $BloodType =  $row['BloodType'];
	   $Sex =  $row['Sex'];
	   $Weight =  $row['Weight'];
	   $Height =  $row['Height'];
	   $Vitals =  $row['Vitals'];
	   $image = '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200"/>';

		
       echo "<tr>";
       echo "<td>$PatientID</td>";
	   echo "<td>$image</td>";
       echo "<td>$Fname</td>";
	   echo "<td>$Lname</td>";
	   echo "<td>$Address</td>";
	   echo "<td>$BloodType</td>";
	   echo "<td>$Sex</td>";
	   echo "<td>$Weight</td>";
	   echo "<td>$Height</td>";
	   echo "<td>$Vitals</td>";
       echo "<td colspan='2'>". "<a href = 'patientEditSelf.php?Edit=$row[PatientID]'>Edit</a>".  "</td>";
	   //echo "<br>";
	   echo "</tr>";
		
    }
} else {
	
		
    //echo "0 results";
	echo "</table>";
}
?>