<?php
session_start();
$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
echo $Name;

$localhost = 'localhost';
$dusername = 'root';
$dpassword = 'root';
$database = 'hospital';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "No Connection to DB";
} 
//echo "Connected successfully";
echo "<pre>";

$aEmpID = $_SESSION['aEmpID'];
//echo $aEmpID;
echo "<pre>";
 
	 $quiry = "SELECT  PatientID , Fname , Lname , BloodType , Sex , Weight , Height , Vitals  from patient where EmpID = '$aEmpID'";

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
       echo "<td>First Name</td>";
	   echo "<td>Last Name</td>";
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
	   $BloodType =  $row['BloodType'];
	   $Sex =  $row['Sex'];
	   $Weight =  $row['Weight'];
	   $Height =  $row['Height'];
	   $Vitals =  $row['Vitals'];

		
       echo "<tr>";
       echo "<td>$PatientID</td>";
       echo "<td>$Fname</td>";
	   echo "<td>$Lname</td>";
	   echo "<td>$BloodType</td>";
	   echo "<td>$Sex</td>";
	   echo "<td>$Weight</td>";
	   echo "<td>$Height</td>";
	   echo "<td>$Vitals</td>";
	   echo "<td colspan='2'>". "<a href = 'DoctorEditPatient.php?Edit=$row[PatientID]'>Edit</a>".  "</td>";
	   echo "<td colspan='2'>". "<a href = 'DoctorAddReport1.php?Report=$row[PatientID]'>Add Report</a>".  "</td>";
	  // echo "<td colspan='2'>". "<a href = 'DoctorAddReport1.php?Report=$row[PatientID]'>List Reports</a>".  "</td>";
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