
<?php
session_start();
?>

<html>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="drop.css" rel="stylesheet" type="text/css" />
<body>
<div id="container">
	<!-- begin #header -->
    <div id="header">
		<div class="headerTop">
        	<div class="logo">
            	<a href=""><img src="images/Saint_Joseph's_University_seal.png" alt="" width="80" height="80" /></a>Team 8 <span>Hospital Management System</span>
            	
            </div>
            
            <div class="search">
            Patient Portal
             </div>
            </div>
      	</div>
      	<div class="mainMenu">
        <ul class="menuTemplate1 decor1_1" license="mylicense">
    <li class="separator"></li>
    <li><a href="patientProfile.php" class="arrow">Profile</a>
       <li><a href = "patientReport.php" class = "arrow">Report</a>
		<li><a href="logout.php" class="arrow">Logout</a>
    
			
			 
            
 
</ul>
        </div>
        <div class="headerPic">
        	<div class="pics">
           	  <div class="pic1">
                	&nbsp;<span>New</span><br />&nbsp;&nbsp;&nbsp;&nbsp;Technology<br /><br /><br /><br /><a href=""></a>
                </div>
              <div class="pic2">
                	&nbsp;<span>New</span><br />&nbsp;&nbsp;&nbsp;&nbsp;Environment<br /><br /><br /><br /><a href=""></a>
                </div>
                <div class="pic3">
                	&nbsp;<span>New</span><br />&nbsp;&nbsp;&nbsp;&nbsp;Equioment<br /><br /><br /><br /><a href=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- end #header -->
	<form  method = "POST" action="direct.php">
    <div class="allContent">
        <!-- begin #sidebar1 -->

        <!-- end #sidebar1 -->
        <!-- begin #mainContent -->
  
<!-- 
<form action="logout.php">
    <input type="submit" value="LogOut" />
</form>

<form action="patientProfile.php">
    <input type="submit" value="Profile" />
</form>
 -->
</body>
</html>
<!-- 
<?php

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo "No Connection to DB";
} 
//echo "Connected successfully";
echo "<pre>";
$PatientID = $_SESSION['PatientID'];
//echo $PatientID;
echo "<pre>";

//==============================================================================================================
	 $quiry1 = "SELECT * from report WHERE PatientID = '$PatientID'";

	 $result1 = mysqli_query($connection, $quiry1);
//echo $result;
echo "<pre>";
if (!$result1)
{
	
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result1->num_rows > 0) {
    // output data of each row
	echo "<table align='left' width='20%' height='20%'>";
	
	   echo "<tr>";
	   echo "<td>Report</td>";
	 
		echo "</tr>";
    while($row = $result1->fetch_assoc()) {
	   $Description = $row['Description'];
       echo "<tr>";
       echo "<td>$Description</td>";

	
      echo "<td colspan='2'>". "<a href = 'patientListMedicine.php?ReportID=$row[ReportID]'>Medicine</a>".  "</td>";
	   //echo "<br>";
	   echo "</tr>";
		
    }
} else {
	
		echo "There is no Report";
		//header("location:regist.html");

    //echo "0 results";
	echo "</table>";
}

?>
 -->
