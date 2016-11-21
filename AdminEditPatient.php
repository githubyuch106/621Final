<html>
<body>
<?php
//include('config.php');
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_GET['Edit']))
{
$PatientID=$_GET['Edit'];
echo $PatientID;
$_SESSION['PatientID'] = $PatientID;
if(isset($_POST['submit']))
{
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$Address=$_POST['Address'];
$BloodType=$_POST['BloodType'];
$EmpID=$_POST['EmpID'];
$Sex=$_POST['Sex'];
$Weight=$_POST['Weight'];
$Height=$_POST['Height'];
$Vitals=$_POST['Vitals'];
$query3=mysql_query("update patient set Fname = '$Fname', Lname = '$Lname', Address = '$Address', BloodType='$BloodType',  Sex = '$Sex', Weight='$Weight' , Height='$Height' , EmpID  = '$EmpID' , Vitals='$Vitals'  where PatientID='$PatientID'");

if($query3)
{
header('location:AdminListPatient.php');
}
}
$query1=mysql_query("select * from patient where PatientID='$PatientID'");
$query2=mysql_fetch_array($query1);
?>
<form method="post" action="">
First Name:<input type="text" name="Fname" value="<?php echo $query2['Fname']; ?>" /><br /><br />
Last Name:<input type="text" name="Lname" value="<?php echo $query2['Lname']; ?>" /><br /><br />
Address:<input type="text" name="Address" value="<?php echo $query2['Address']; ?>" /><br /><br />
Blood Type:<input type="text" name="BloodType" value="<?php echo $query2['BloodType']; ?>" /><br /><br />
Employee ID:<input type="text" name="EmpID" value="<?php echo $query2['EmpID']; ?>" /><br /><br />
Sex:<input type="text" name="Sex" value="<?php echo $query2['Sex']; ?>" /><br /><br />
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
