<?php
session_start();
//$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
//echo $Name;

?>
<html>
<body>
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
<br />
<form action="admin.php">
    <input type = "image" value="Main Page" src = "images/Home.png" width="66" height="66"/>
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

//$aEmpID = $_SESSION['aEmpID'];
//echo $aEmpID;
echo "<pre>";
 
	 $quiry = "SELECT * from patient";

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
	   $image = '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="100" width="100"/>';

		
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
	   echo "<td colspan='2'>". "<a href = 'AdminEditPatient.php?Edit=$row[PatientID]'>Edit</a>".  "</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminDeletePatient.php?Delete=$row[PatientID]'>Delete</a>".  "</td>";
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
