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
$query1=mysql_query("select * from employee WHERE EmpID = '$EmpID'");
echo $EmpID;
$_SESSION['EmpID'] = $EmpID;
if(isset($_POST['submit']))
{
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$PhoneNumber=$_POST['PhoneNumber'];
$Salary=$_POST['Salary'];
$JobTitle=$_POST['JobTitle'];
        $image= addslashes($_FILES['image']['tmp']);
		$name= addslashes($_FILES['image']['name']);
		$image= file_get_contents($image);
		$image= base64_encode($image);

$query3=mysql_query("update employee set Fname = '$Fname', Lname = '$Lname', PhoneNumber = '$PhoneNumber', Salary='$Salary',  JobTitle = '$JobTitle' , image = '$image' , name = '$name' where EmpID='$EmpID'");
if($query3)
{
header('location:AdminListEmployee.php');
}
}

$query2=mysql_fetch_array($query1);
?>
<form method="post" action="" enctype="multipart/form-data">
First Name:<input type="text" name="Fname" value="<?php echo $query2['Fname']; ?>" /><br /><br />
Last Name:<input type="text" name="Lname" value="<?php echo $query2['Lname']; ?>" /><br /><br />
Phone Number:<input type="text" name="PhoneNumber" value="<?php echo $query2['PhoneNumber']; ?>" /><br /><br />
Salary:<input type="text" name="Salary" value="<?php echo $query2['Salary']; ?>" /><br /><br />
Job Title:<input type="text" name="JobTitle" value="<?php echo $query2['JobTitle']; ?>" /><br /><br />
Image: <input type="file" name="image" value="<?php echo $row['name']; ?>" /><br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>
