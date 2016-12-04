<html>
<body>
<div class="logo">
            	<a href=""><img src="/621Final/images/Saint_Joseph's_University_seal.png" alt="" width="80" height="80" /></a> Team 8<br><span>Hospital Database Management</span>
            	
            </div>
<style>
.logo {
	margin-left: 0px;
	margin-top: 10px;
	padding-left: 5px;
	padding-right:5px;
	border-radius: 10px;
	background-color: #98B8F3;	
	margin-right: 50px;
	}
.body{
margin-left: 50px;
}
</style>
<?php
//include('config.php');
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_GET['Edit']))
{
$RoomID=$_GET['Edit'];
//echo $RoomID;
$_SESSION['RoomID'] = $RoomID;
if(isset($_POST['submit']))
{
//$RoomID=$_POST['RoomID'];
$RoomNumber=$_POST['RoomNumber'];
$BuildingNumber=$_POST['BuildingNumber'];
$FloorNumber=$_POST['FloorNumber'];

$query3=mysql_query("update room set RoomNumber = '$RoomNumber', BuildingNumber = '$BuildingNumber', FloorNumber = '$FloorNumber' where RoomID='$RoomID'");

if($query3)
{
header('location:AdminListRoom.php');
}
}
$query1=mysql_query("select * from room WHERE RoomID = '$RoomID'");
$query2=mysql_fetch_array($query1);
?>
<form method="post" action="">
Room Number:<input type="text" name="RoomNumber" value="<?php echo $query2['RoomNumber']; ?>" /><br /><br />
Building Number:<input type="text" name="BuildingNumber" value="<?php echo $query2['BuildingNumber']; ?>" /><br /><br />
Floor Number:<input type="text" name="FloorNumber" value="<?php echo $query2['FloorNumber']; ?>" /><br /><br />

<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>