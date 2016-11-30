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
//echo $EmpID;
$_SESSION['EmpID'] = $EmpID;
if(isset($_POST['submit']))
{
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$PhoneNumber=$_POST['PhoneNumber'];
$Salary=$_POST['Salary'];
$JobTitle=$_POST['JobTitle'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$name = addslashes($_FILES['image']['name']);

$query3 = "update employee set Fname = '$Fname', Lname = '$Lname', PhoneNumber = '$PhoneNumber', Salary='$Salary',  JobTitle = '$JobTitle' , image = '$image' , name = '$name' where EmpID='$EmpID'";
$record = mysql_query($query3) or print(mysql_error());
	echo "<meta http-equiv='refresh' content = '0;url=AdminListEmployee.php'>";
}

$query2=mysql_fetch_array($query1);
?>
<form method="post" action="" enctype="multipart/form-data">
First Name:<input type="text" name="Fname" value="<?php echo $query2['Fname']; ?>" /><br /><br />
Last Name:<input type="text" name="Lname" value="<?php echo $query2['Lname']; ?>" /><br /><br />
Phone Number:<input type="text" name="PhoneNumber" value="<?php echo $query2['PhoneNumber']; ?>" /><br /><br />
Salary:<input type="text" name="Salary" value="<?php echo $query2['Salary']; ?>" /><br /><br />
		
		<?php

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} ?>


            <label>Job Title</label>
            <select name = "JobTitle" id="JobTitle">
                <option>Job Title</option>
                <?php
                if($stmt=$connection->query("select position from jobtitle"))
                {
                    while($r=$stmt->fetch_array(MYSQLI_ASSOC))
                    {
                 ?>      
                <option name = "JobTitle" value="<?php echo $r['position'] ?>"><?php echo $r['position'] ?></option> 
                
                <?php  }  }   ?>
                
            </select>
	
		<br></br>
Image: <input type="file" name="image" value="<?php echo $row['name']; ?>" /><br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>