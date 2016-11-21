<?php
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);

if (isset($_GET['Delete']))
{
	
	$ReportID = $_GET['Delete'];
	
	$que1 = " DELETE FROM medicine WHERE ReportID = '$ReportID'";
	$que =  " DELETE FROM `report` WHERE ReportID = '$ReportID'";
    $record = mysql_query($que)  or print(mysql_error());
	echo "<meta http-equiv='refresh' content = '0;url=doctor.php'>"; 

}

//iterate over all the rows
if($record === FALSE){

echo $record;

}



?>