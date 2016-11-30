<?php
session_start();
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);

if (isset($_GET['Delete']))
{
	
	$RoomID = $_GET['Delete'];
	
	
	$que =  " DELETE FROM `room` WHERE RoomID = '$RoomID'";
    $record = mysql_query($que) or print(mysql_error());
	echo "<meta http-equiv='refresh' content = '0;url=AdminListRoom.php'>"; 

}

//iterate over all the rows
if($record === FALSE){

echo $record;

}



?>