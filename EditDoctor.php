<?php
    session_start();
    require 'doctorSession.php';  
?>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hospital</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <link href="drop.css" rel="stylesheet" type="text/css" />
</head>
<body>
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
          
        <li><a href="doctor.php" class="arrow">Back</a>

            </ul>
            
        </div>
<?php
//include('config.php');
$query=mysql_connect("localhost","root","root");
mysql_select_db("hospital",$query);
if(isset($_SESSION['aEmpID']))
{
$EmpID=$_SESSION['aEmpID'];
$query1=mysql_query("select * from employee WHERE EmpID = '$EmpID'");

if(isset($_POST['submit']))
{
$Fname=$_POST['Fname'];
$Lname=$_POST['Lname'];
$PhoneNumber=$_POST['PhoneNumber'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$name = addslashes($_FILES['image']['name']);

$query3 = "update employee set Fname = '$Fname', Lname = '$Lname', PhoneNumber = '$PhoneNumber', image = '$image', name = '$name' where EmpID='$EmpID'";
$record = mysql_query($query3) or print(mysql_error());
	echo "<meta http-equiv='refresh' content = '0;url=AdminListEmployee.php'>";
}

$query2=mysql_fetch_array($query1);
?>

<h3>Edit Info</h3>

<br>

<form method="post" action="" enctype="multipart/form-data">
First Name:<input type="text" name="Fname" value="<?php echo $query2['Fname']; ?>" /><br /><br />
Last Name:<input type="text" name="Lname" value="<?php echo $query2['Lname']; ?>" /><br /><br />
Phone Number:<input type="text" name="PhoneNumber" value="<?php echo $query2['PhoneNumber']; ?>" /><br /><br />
<?php

require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} ?>
Image: <input type="file" name="image" value="<?php echo $row['name']; ?>" /><br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
     </div>

      <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all   child floats --><br class="clearfloat" />
      <!-- begin #footer -->

      <!-- end #footer -->
      </div>
</body>
</html>