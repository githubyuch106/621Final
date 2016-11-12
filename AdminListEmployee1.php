<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>free css template 167</title>
<link href="styles.css" rel="stylesheet" type="text/css" /><!--[if IE 5]>
<style type="text/css"> 
/* place css box model fixes for IE 5* in this conditional comment */
#sidebar1 { width: 230px; }
</style>
<![endif]--><!--[if IE]>
<style type="text/css"> 
/* place css fixes for all versions of IE in this conditional comment */
#sidebar1 { padding-top: 30px; }
#mainContent { zoom: 1; }
/* the above proprietary zoom property gives IE the hasLayout it needs to avoid several bugs */
</style>
<![endif]-->
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
                <div class="si"><input name="" type="text" /></div><div class="searchButtoN"><input name="Search" type="button" value="Search" /></div>
            </div>
      	</div>

        <div class="mainMenu">
        	<ul>
            	<li id="active"><a href="Admin1.html">Admin Home</a></li>
                <li><a href="AdminListEmployee1.php">Employees</a></li>
                <li><a href="AdminListPatient.php">Patients</a></li>
                <li><a href="AdminListRoom.php">Rooms</a></li>
            
            </ul>
        </div>
		</div>
		</div>

  <?php 
session_start();
//$Name = $_SESSION['aEmpID'];
//echo "Welcome to Doctor page";
//echo $Name;

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
echo "<pre>";
if (!$result)
{
	
    die("Query Faile".  mysqli_errno($connection));   
}

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table align='left' width='20%' height='20%'>";
	
	   echo "<tr>";
	   echo "<td>EmpID</td>";
	   echo "<td>SSN</td>";
       echo "<td>First Name</td>";
	   echo "<td>Last Name</td>";
	   echo "<td>Phone Number</td>";
	   echo "<td>Salary</td>";
	   echo "<td>Job Title</td>";

		echo "</tr>";
    while($row = $result->fetch_assoc()) {
	   $EmpID = $row['EmpID'];
	   $SSN = $row['SSN'];
       $Fname =  $row['Fname'];
	   $Lname =  $row['Lname'];
	   $PhoneNumber =  $row['PhoneNumber'];
	   $Salary =  $row['Salary'];
	   $JobTitle =  $row['JobTitle'];
		
		
		
       echo "<tr>";
       echo "<td>$EmpID</td>";
	    echo "<td>$SSN</td>";
       echo "<td>$Fname</td>";
	   echo "<td>$Lname</td>";
	   echo "<td>$PhoneNumber</td>";
	   echo "<td>$Salary</td>";
	   echo "<td>$JobTitle</td>";
	   echo "<td colspan='2'>". "<a href = 'AdminEditEmployee.php?Edit=$row[EmpID]'>Edit</a>".  "</td>";
	  
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



<div id="container">
    <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
    <!-- begin #footer -->
    <div id="footer">
    	<p>
        	Copyright &copy; 2010. Designed by <a href="http://www.facebookpagetemplates.com" title="Facebook Templates">Facebook Templates</a><br />
            <a title="This page validates as XHTML 1.0 Strict" href="http://validator.w3.org/check/referer" class="footerLink"><abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a> | 
            <a title="This page validates as CSS" href="http://jigsaw.w3.org/css-validator/check/referer" class="footerLink"><abbr title="Cascading Style Sheets">CSS</abbr></a>
        </p>
    </div>
    <!-- end #footer -->
</div>
<!-- end #container -->
</body>
</html>
