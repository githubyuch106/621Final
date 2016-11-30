<?php
session_start();
//$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
//echo $Name;

?>
<html>
<body>
<form action="admin.php">
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

echo "<pre>";
 
	 $quiry = "SELECT * from jobtitle";

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
	   echo "<td>Job Title</td>";

		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $Position = $row['Position'];

	
       echo "<tr>";
       echo "<td>$Position</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminEditJobTitle.php?Edit=$row[ID]'>Edit</a>".  "</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminDeleteJobTitle.php?Delete=$row[ID]'>Delete</a>".  "</td>";
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
