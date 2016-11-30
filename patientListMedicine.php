<?php
session_start();
?>
<html>
<body>
<form action="patient.php">
    <input type="submit" value="Back" />
</form>

</body>
</html>
<?php
require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$ReportID=$_GET['ReportID'];
$_SESSION['ReportID'] = $ReportID;
	 $quiry = "SELECT  * from medicine where ReportID = '$ReportID'";

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
	   echo "<td>Treatment</td>";
		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $Treatment = $row['Treatment'];
       echo "<tr>";
       echo "<td>$Treatment</td>";
	
	   //echo "<br>";
	   echo "</tr>";
		
    }
} else {
	
		echo "There is no report";
		//header("location:regist.html");

    //echo "0 results";
	echo "</table>";
}

?>