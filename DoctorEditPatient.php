<html>
<body>
<?php
//include('config.php');
session_start();
require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_GET['Edit']))
{
$PatientID=$_GET['Edit'];
//echo $PatientID;

$FinedPatientName = mysqli_query($connection,"SELECT * FROM patient WHERE PatientID = '$PatientID'");
 $row = mysqli_fetch_array($FinedPatientName,MYSQLI_ASSOC);
   
 $PatientFname = $row['Fname'];
 $PatientLname = $row['Lname'];

$_SESSION['PatientID'] = $PatientID;
if(isset($_POST['submit']))
{
$BloodType=$_POST['BloodType'];
$Weight=$_POST['Weight'];
$Height=$_POST['Height'];
$Vitals=$_POST['Vitals'];
$query3=mysql_query("update patient set BloodType='$BloodType', Weight='$Weight' , Height='$Height'  , Vitals='$Vitals'  where PatientID='$PatientID'");
if($query3)
{
header('location:doctor.php');
}
}
$query1=mysql_query("select * from patient where PatientID='$PatientID'");
$query2=mysql_fetch_array($query1);
?>
<form method="post" action="">
Blood Type:<input type="text" name="BloodType" value="<?php echo $query2['BloodType']; ?>" /><br /><br />
Weight:<input type="text" name="Weight" value="<?php echo $query2['Weight']; ?>" /><br /><br />
Height:<input type="text" name="Height" value="<?php echo $query2['Height']; ?>" /><br /><br />
Vitals:<input type="text" name="Vitals" value="<?php echo $query2['Vitals']; ?>" /><br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>