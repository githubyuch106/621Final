
<?php 

$PatientID=$_GET['Report'];
//echo $PatientID; 

$_SESSION['PatientID'] = $PatientID;
//echo $PatientID;
?>
<!DOCTYPE html>
<html>
<body>
<h2>New Report</h2>
<form  method = "POST" action="DoctorAddReport.php">
  <div class="container">
      <label><b>Report</b></label>
    <input type="text" placeholder="Write Description" name="Description" style = "width: 400px" required>
        <br></br>
    <button type="submit">Save</button>
	<br></br>
  </div>
</form>

</body>
</html>

<?php
session_start();
require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$_SESSION['PatientID'] = $PatientID;
	 $quiry = "SELECT  * from report where PatientID = '$PatientID'";

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
	   echo "<td>Description</td>";
		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $Description = $row['Description'];
       echo "<tr>";
       echo "<td>$Description</td>";
	   echo "<td colspan='2'>". "<a href = 'DoctorEditReport.php?Edit=$row[ReportID]'>Edit | </a>".  "</td>";
	   echo "<td colspan='2'>". "<a href = 'DoctorAddMedicine1.php?Medicine=$row[ReportID]'>List Medicine | </a>".  "</td>";
	   echo "<td colspan='2'>". "<a href = 'DoctorDeleteReport.php?Delete=$row[ReportID]'>Delete</a>".  "</td>";
	   echo "</tr>";
		
    }
} else {
	
		echo "There is no report";
		//header("location:regist.html");

    //echo "0 results";
	echo "</table>";
}


?>

