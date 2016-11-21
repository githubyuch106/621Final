<?php 
session_start();
//$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
//echo $Name;
?>
<html>
<style><link rel="stylesheet" type="text/css" href="style1.css">
</style>
<body>
<div class="wrapper">
    

<form action="admin.html" >
   <!-- <input type="submit" value="Main Page" />-->
   <button class="button">Main Page</button>
</form>
</div>
</body>
</html>
<?php
echo '<link href="style1.css" rel="stylesheet">';
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
 
	 $quiry = "SELECT * from employee";

	 $result = mysqli_query($connection, $quiry);
//echo $result;
//echo "<pre>";
if (!$result)
{
	
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table class='zui-table zui-table-zebra zui-table-horizontal' align= 'center'>";
	
	  echo "<thead>";
	   echo "<tr>";
	   echo "<th>EmpID</th>";
	   echo "<th>Image</th>";
	   echo "<th>SSN</th>";
       echo "<th>First Name</th>";
	   echo "<th>Last Name</th>";
	   echo "<th>Phone Number</th>";
	   echo "<th>Salary</th>";
	   echo "<th>Job Title</th>";
	   echo "<th>Edit</th>";
	   echo "<th>Delete</th>";
   echo"</tr>";
        echo"</thead>";
		
		//echo "</th>";
    while($row = $result->fetch_assoc()) {
	   $EmpID = $row['EmpID'];
	   $SSN = $row['SSN'];
       $Fname =  $row['Fname'];
	   $Lname =  $row['Lname'];
	   $PhoneNumber =  $row['PhoneNumber'];
	   $Salary =  $row['Salary'];
	   $JobTitle =  $row['JobTitle'];
	   $image = '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="100" width="100"/>';
		
		echo "<tbody>";
       echo "<tr>";
		echo "<td>$EmpID</td>"; 
       echo "<td><b>$image</td>";
	    echo "<td>$SSN</td>";
       echo "<td>$Fname</td>";
	   echo "<td>$Lname</td>";
	   echo "<td>$PhoneNumber</td>";
	   echo "<td>$Salary</td>";
	   echo "<td>$JobTitle</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminEditEmployee.php?Edit=$row[EmpID]'>Edit</a>".  "</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminDeleteEmployee.php?Delete=$row[EmpID]'>Delete</a>".  "</td>";
	  
	   //echo "<br>";
	   echo "</tr>";
	   echo "</tbody>";
		
    }
} else {
	
		echo "There is no patients";
		//header("location:regist.html");

    //echo "0 results";
	echo "</table>";
}
?>
