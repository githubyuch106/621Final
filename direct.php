<?php
session_start();

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
echo "<pre>";

//$a = $_POST['ID'];
//$b = $_POST['Password'];

$N = $_POST['id'];
$P = $_POST['password'];

//echo $N;
//echo $P;

$query = "SELECT * FROM employee WHERE EmpID = " . mysql_real_escape_string($N) . " AND Password = '" . mysql_real_escape_string($P) . "'";

$result = mysqli_query($connection, $query);
if (!$result)
{
	echo "1";
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
			echo $EmpID;
			$_SESSION['aEmpID'] = $EmpID;
			
			header("location:doctor.php");
			
		}
		
		if ($row['JobTitle'] == 'nurse'){
			$_SESSION['Name'] = $Name;
			header("location:nurse.php");	
			}
			
		if ($row['JobTitle'] == 'admin'){
			$_SESSION['Name'] = $Name;
			header("location:admin.html");		
			}

		die("Invalid job title");
			
			
		
		//else{
		//	header("location:patient.php");
		//}
		
		
		
    }
}
/* else {
	
		echo '<script language="javascript">';
		echo 'alert("You need to sign up with us")';
		echo '</script>';
		//header("location:regist.html");

    //echo "0 results";
       }// end else with javascrept
*/
	   
	   
	   
	 
	   
$query1 = "SELECT * FROM patient WHERE PatientID = " . mysql_real_escape_string($N) . " AND Password = '" . mysql_real_escape_string($P) . "'";

$result1 = mysqli_query($connection, $query1);
if (!$result1)
{
	echo "2";
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result1->num_rows > 0) {
	$_SESSION['Name'] = $Name;
    header("location:patient.php");
   
} else {
	
		echo '<script language="javascript">';
		echo 'alert("You need to sign up with us")';
		echo '</script>';
		//header("location:regist.html");

    //echo "0 results";
       }// end else with javascrept






?>
