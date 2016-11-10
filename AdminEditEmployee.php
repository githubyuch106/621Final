<html>
<body>
<?php
//include('config.php');
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_GET['Edit']))
{
$EmpID=$_GET['Edit'];
echo $EmpID;
$_SESSION['EmpID'] = $EmpID;
if(isset($_POST['submit']))
{
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$PhoneNumber=$_POST['PhoneNumber'];
$Salary=$_POST['Salary'];
$JobTitle=$_POST['JobTitle'];

$query3=mysql_query("update employee set Fname = '$Fname', Lname = '$Lname', PhoneNumber = '$PhoneNumber', Salary='$Salary',  JobTitle = '$JobTitle' where EmpID='$EmpID'");

if($query3)
{
header('location:AdminListEmployee.php');
}
}
$query1=mysql_query("select * from employee WHERE EmpID = '$EmpID'");
$query2=mysql_fetch_array($query1);
?>
<form method="post" action="">
First Name:<input type="text" name="Fname" value="<?php echo $query2['Fname']; ?>" /><br /><br />
Last Name:<input type="text" name="Lname" value="<?php echo $query2['Lname']; ?>" /><br /><br />
Phone Number:<input type="text" name="PhoneNumber" value="<?php echo $query2['PhoneNumber']; ?>" /><br /><br />
Salary:<input type="text" name="Salary" value="<?php echo $query2['Salary']; ?>" /><br /><br />
JobTitle:<input type="text" name="JobTitle" value="<?php echo $query2['JobTitle']; ?>" /><br /><br />

<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>