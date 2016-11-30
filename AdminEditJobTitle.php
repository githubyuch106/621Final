<html>
<body>
<?php
//include('config.php');
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_GET['Edit']))
{
$ID=$_GET['Edit'];
$_SESSION['ID'] = $ID;
if(isset($_POST['submit']))
{
//$RoomID=$_POST['RoomID'];
$Position=$_POST['Position'];


$query3=mysql_query("update jobtitle set Position = '$Position'where ID='$ID'");

if($query3)
{
header('location:AdminListJobTitle.php');
}
}
$query1=mysql_query("select * from jobtitle WHERE ID = '$ID'");
$query2=mysql_fetch_array($query1);
?>
<form method="post" action="">
Job Title:<input type="text" name="Position" value="<?php echo $query2['Position']; ?>" /><br /><br />

<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>