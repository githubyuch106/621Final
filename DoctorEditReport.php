<html>
<body>
<?php
//include('config.php');
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_GET['Edit']))
{
$ReportID=$_GET['Edit'];
//echo $ReportID;
$_SESSION['ReportID'] = $ReportID;
if(isset($_POST['submit']))
{
$Description=$_POST['Description'];
$query3=mysql_query("update report set Description='$Description' where ReportID='$ReportID'");
if($query3)
{
header('location:doctor.php');
}
}
$query1=mysql_query("select * from report where ReportID='$ReportID'");
$query2=mysql_fetch_array($query1);
?>
<form method="post" action="">
Description:<input type="text" name="Description" value="<?php echo $query2['Description']; ?>" /><br /><br />

<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>