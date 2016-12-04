<?php 
session_start();
//$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
//echo $Name;
?>

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
<form action="admin.php">
    <input type="submit" value="Main Page" />
</form>
</body>
</html>
<?php
require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "No Connection to DB";
} 
//echo "Connected successfully";
echo "<pre>";

//$aEmpID = $_SESSION['aEmpID'];
//echo $aEmpID;
echo "<pre>";
 
	 $quiry = "SELECT * from room";

	 $result = mysqli_query($connection, $quiry);
//echo $result;
echo "<pre>";
if (!$result)
{
	
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table align='left' width='20%' height='20%'>";
	
	   echo "<tr>";
	   echo "<td>RoomId</td>";
	   echo "<td>Room Number</td>";
       echo "<td>Building Number</td>";
	   echo "<td>Floor Number</td>";

		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $RoomID = $row['RoomID'];
	   $RoomNumber = $row['RoomNumber'];
       $BuildingNumber =  $row['BuildingNumber'];
	   $FloorNumber =  $row['FloorNumber'];	
		
		
       echo "<tr>";
       echo "<td>$RoomID</td>";
	    echo "<td>$RoomNumber</td>";
       echo "<td>$BuildingNumber</td>";
	   echo "<td>$FloorNumber</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminEditRoom.php?Edit=$row[RoomID]'>Edit</a>".  "</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminDeleteRoom.php?Delete=$row[RoomID]'>Delete</a>".  "</td>";
	  
	   //echo "<br>";
	   echo "</tr>";
		
    }
} else {
	
		echo "There is no patients";
		//header("location:regist.html");

    //echo "0 results";
	echo "</table>";
}







?>
