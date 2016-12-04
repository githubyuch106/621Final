<html>
<style><link rel="stylesheet" type="text/css" href="style1.css">
</style>
<body>
<div class="wrapper">
    

<form action="AdminListPatient.php" >
   <!-- <input type="submit" value="Main Page" />-->
   <button class="button">Back</button>
</form>
</div>
</body>
</html>



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
$query1=mysql_query("select * from patient where PatientID='$PatientID'");
//echo $PatientID;
$_SESSION['PatientID'] = $PatientID;
if(isset($_POST['submit']))
{
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$Address=$_POST['Address'];
$BloodType=$_POST['BloodType'];
$EmpID=$_POST['EmpID'];
$RoomID=$_POST['RoomID'];
$Sex=$_POST['Sex'];
$Weight=$_POST['Weight'];
$Height=$_POST['Height'];
$Vitals=$_POST['Vitals'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$name = addslashes($_FILES['image']['name']);
$query3=mysql_query("update patient set Fname = '$Fname', Lname = '$Lname', Address = '$Address', BloodType='$BloodType',  Sex = '$Sex', Weight='$Weight' , Height='$Height' , EmpID  = '$EmpID' , Vitals='$Vitals' , RoomID = '$RoomID' , image = '$image' , name = '$name' where PatientID='$PatientID'");
$query666=mysql_query("update room set EmpID = '$EmpID', PatientID = '$PatientID' where RoomID='$RoomID'");
if($query3)
{
header('location:AdminListPatient.php');
}
}

$query2=mysql_fetch_array($query1);
?>
<form method="post" action="" enctype="multipart/form-data">
First Name:<input type="text" name="Fname" value="<?php echo $query2['Fname']; ?>" /><br /><br />
Last Name:<input type="text" name="Lname" value="<?php echo $query2['Lname']; ?>" /><br /><br />
Address:<input type="text" name="Address" value="<?php echo $query2['Address']; ?>" /><br /><br />
Blood Type:<input type="text" name="BloodType" value="<?php echo $query2['BloodType']; ?>" /><br /><br />
		<?php

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} ?>

<?php

//this code of show names of Doctor instead  of  EmpID and Room Number instead  of RoomID is adopted from Lefty code a groupe member in our project team  
$q = $connection->prepare('SELECT EmpID, Lname FROM employee WHERE JobTitle = "Doctor"');
$q->execute();
$q->bind_result($id, $lname);
?>  
           <p><label>Doctor: <select name="EmpID">
<?php while ($q->fetch()): ?>
<option value="<?= $id ?>">Dr. <?= $lname ?></option>
<?php endwhile ?>
</select></p>
	
	
		<?php

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} ?>

<?php
$q = $connection->prepare('SELECT RoomID, BuildingNumber, RoomNumber FROM room WHERE PatientID is null');
$q->execute();
$q->bind_result($id, $BuildingNumber, $RoomNumber);
?>  
           <p><label>Room: <select name="RoomID">
<?php while ($q->fetch()): ?>
<option value="<?= $id ?>"><?= $BuildingNumber ?> <?= $RoomNumber ?></option>
<?php endwhile ?>
</select></p>
Sex:<input type="text" name="Sex" value="<?php echo $query2['Sex']; ?>" /><br /><br />
Weight:<input type="text" name="Weight" value="<?php echo $query2['Weight']; ?>" /><br /><br />
Height:<input type="text" name="Height" value="<?php echo $query2['Height']; ?>" /><br /><br />
Vitals:<input type="text" name="Vitals" value="<?php echo $query2['Vitals']; ?>" /><br /><br />
Image:<input type="file" name="image" value="<?php echo $query2['name']; ?>" /><br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>