<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hospital</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="drop.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
</head>
<body>
<!-- begin #container -->
<div id="container">
	<!-- begin #header -->
    <div id="header">
		<div class="headerTop">
        	<div class="logo">
            	<a href=""><img src="images/logo.png" alt="" width="179" height="77" /></a>AMS <span>the best technologies</span>
            </div>
            <div class="search">
                Product search:<br />
                <div class="si"><input name="" type="text" /></div><div><a href=""><img src="images/searchButton.jpg" alt="" width="66" height="26" /></a></div>
            </div>
      	</div>
        <div class="mainMenu">
        <ul class="menuTemplate1 decor1_1" license="mylicense">
    <li class="separator"></li>
    <li><a href="#Horizontal-Menus" class="arrow">Employee</a>
        <div class="drop decor1_2" style="width: 150px;">
            <div class='left'>
                <div>
                    <a href="AdminListEmployee.php">List Employees</a><br />
                    <a href="addEmployeeForm.php">Add Employee</a><br />
                </div>
            </div>
			
			
			
			
			    <li><a href="#Horizontal-Menus" class="arrow">Patient</a>
        <div class="drop decor1_2" style="width: 150px;">
            <div class='left'>
                <div>
                    <a href="AdminListPatient.php">List Patients</a><br />
                    <a href="addPatient.html">Add Patient</a><br />
                </div>
            </div>
			
			
			
			
				    <li><a href="#Horizontal-Menus" class="arrow">Room</a>
        <div class="drop decor1_2" style="width: 150px;">
            <div class='left'>
                <div>
                    <a href="AdminListRoom.php">List Rooms</a><br />
                    <a href="addRoomForm.php">Add Room</a><br />
					<a href="OccupiedRoom.php">Room Occupied</a><br />
					<a href="RoomsStatus.php">Room Status</a><br />
                </div>
            </div>
			
			
			
			
						    <li><a href="#Horizontal-Menus" class="arrow">Job Title</a>
        <div class="drop decor1_2" style="width: 150px;">
            <div class='left'>
                <div>
                    <a href="AdminListJobTitle.php">List Job Title</a><br />
					<a href="AdminAddJobTitleForm.php">Add Job Title </a><br />
                </div>
            </div>
			
			
			
			
		<li><a href="logout.php" class="arrow">Logout</a>
    
			
			 
            
 
</ul>
        
    </div>
    <!-- end #header -->
	<form  method = "POST" action="direct.php">
    <div class="allContent">
        <!-- begin #sidebar1 -->

        <!-- end #sidebar1 -->
        <!-- BODY -->


<?php
session_start();
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
	   if ($JobTitle !== "Admin"){
		   echo "<td colspan='2'>". "<a onclick='return checkDelete()' href='AdminDeleteEmployee.php?Delete=$row[EmpID]' >Delete</a>";
	   }
	   
	   echo "</td>";
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

        <!-- end BODY -->
    </div>
    <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
    <!-- begin #footer -->

    <!-- end #footer -->
</div>
<!-- end #container -->
</body>
</html>
