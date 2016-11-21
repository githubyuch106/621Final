<?php 
$ReportID=$_GET['Medicine'];
//echo $PatientID; 
$_SESSION['ReportID'] = $ReportID;
//echo $PatientID;
?>
<!DOCTYPE html>
<html>
<body>
<h2>New Medicine</h2>
<form  method = "POST" action="DoctorAddMedicine.php">
  <div class="container">
      <label><b>Report</b></label>
    <input type="text" placeholder="Write Medicine" name="Treatment" style = "width: 400px" required>
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
	   echo "<td colspan='2'>". "<a href = 'DoctorEditMedicine.php?Edit=$row[MedicineID]'>Edit </a>".  "</td>";
	    echo "<td colspan='2'>". "<a href = 'DoctorDeleteMedicine.php?Delete=$row[MedicineID]'>Delete</a>".  "</td>";
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

