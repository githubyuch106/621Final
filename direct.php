<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$N = $_POST['email'];
$P = $_POST['password'];

 $query = "SELECT  * FROM employee WHERE Email = '$N' AND Password = '$P'";
$result = mysqli_query($connection, $query);
if (!$result)
{

    die("Query Faile".  mysqli_errno($connection));   
}

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo  $row['JobTitle']; //job title of who loged in 
		 echo "<pre>";
	     echo $row['Fname'];
		echo "<pre>";
		
		if ($row['JobTitle'] == 'Doctor'){
			$EmpID = $row['EmpID'];
			//echo $EmpID;
			$_SESSION['aEmpID'] = $EmpID;
			
			header("location:doctor.php");
			
		}

			echo "1";
		if ($row['JobTitle'] == 'Admin'){
			$_SESSION['Name'] = $Name;
			header("location:admin.html");		
			}

		die("Invalid job title");
	

		
    }
}

$query1 = "SELECT  * FROM patient WHERE Email = '$N' AND Password = '$P'";
var_dump($query1);
$result1 = mysqli_query($connection, $query1);
if (!$result1)
{
	echo "2";
    die("Query Faile".  mysqli_errno($connection));   
}
var_dump($result1);

if ($result1->num_rows > 0) {
	  while($row = $result1->fetch_assoc()) {
	        $PatientID = $row['PatientID'];
			$_SESSION['PatientID'] = $PatientID;
   header("location:patient.php");
	    }
	  }else {
	
		echo '<script language="javascript">';
		echo 'alert("You need to sign up with us")';
		echo '</script>';
		//header( "refresh:1;url=index.html" );
}

?>
