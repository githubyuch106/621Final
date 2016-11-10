<?php 
session_start();
//$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
//echo $Name;

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

//$aEmpID = $_SESSION['aEmpID'];
//echo $aEmpID;
echo "<pre>";
 
	 $quiry = "SELECT * from employee";

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
	   echo "<td>EmpID</td>";
	   echo "<td>SSN</td>";
       echo "<td>First Name</td>";
	   echo "<td>Last Name</td>";
	   echo "<td>Phone Number</td>";
	   echo "<td>Salary</td>";
	   echo "<td>Job Title</td>";

		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $EmpID = $row['EmpID'];
	   $SSN = $row['SSN'];
       $Fname =  $row['Fname'];
	   $Lname =  $row['Lname'];
	   $PhoneNumber =  $row['PhoneNumber'];
	   $Salary =  $row['Salary'];
	   $JobTitle =  $row['JobTitle'];
		
		
		
       echo "<tr>";
       echo "<td>$EmpID</td>";
	    echo "<td>$SSN</td>";
       echo "<td>$Fname</td>";
	   echo "<td>$Lname</td>";
	   echo "<td>$PhoneNumber</td>";
	   echo "<td>$Salary</td>";
	   echo "<td>$JobTitle</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminEditEmployee.php?Edit=$row[EmpID]'>Edit</a>".  "</td>";
	  
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