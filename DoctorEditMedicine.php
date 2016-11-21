<html>
<body>
<?php
//include('config.php');
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_GET['Edit']))
{
$MedicineID=$_GET['Edit'];
echo $MedicineID;
$_SESSION['MedicineID'] = $MedicineID;
if(isset($_POST['submit']))
{
$Treatment=$_POST['Treatment'];
$query3=mysql_query("update medicine set Treatment='$Treatment' where MedicineID='$MedicineID'");
if($query3)
{
header('location:doctor.php');
}
}
$query1=mysql_query("select * from medicine where MedicineID='$MedicineID'");
$query2=mysql_fetch_array($query1);
?>
<form method="post" action="">
Treatment:<input type="text" name="Treatment" value="<?php echo $query2['Treatment']; ?>" /><br /><br />

<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>