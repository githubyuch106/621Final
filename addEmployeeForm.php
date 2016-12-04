<!DOCTYPE html>
<html>
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
<body class = "body">

<h2>New Employee</h2>

<form  method = "POST" action="addEmployee.php" enctype="multipart/form-data">


  <div class="container">


    <label><b>SSN</b></label>
    <input type="text" placeholder="Enter SSN" name="SSN" required>
<br></br>


    <label><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="Fname" required>
        <br></br>
		
		
    <label><b>Last name</b></label>
    <input type="text" placeholder="Enter Last Name" name="Lname" required>
        <br></br>


				
    <label><b>Phone Number</b></label>
    <input type="text" placeholder="Enter Phone Number" name="PhoneNumber" required>
        <br></br>
		
		
    <label><b>Salary </b></label>
    <input type="text" placeholder="Enter Salary" name="Salary" required>
        <br></br>
		
		<?php
		session_start();
require 'common.php';
$connection = new mysqli($localhost , $dusername , $dpassword,$database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} ?>


            <label><b>Job Title</b></label>
            <select name = "JobTitle" id="JobTitle">
                <option>Job Title</option>
                <?php
                if($stmt=$connection->query("select position from jobtitle"))
                {
                    while($r=$stmt->fetch_array(MYSQLI_ASSOC))
                    {
                 ?>      
                <option name = "JobTitle" value="<?php echo $r['position'] ?>"><?php echo $r['position'] ?></option> 
                
                <?php  }  }   ?>
                
            </select>
	
		<br></br>

	<!--	
    <label><b>Job Title</b></label>
    <input type="text" placeholder="Enter Job Title" name="JobTitle" required>
        <br></br>
		-->
		<label><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="Email" required>
        <br></br>
		
			<label><b>Security Question</b></label>
    <input type="text" placeholder="Enter security question" name="SecurityQuestion" required>
        <br></br>

	<label><b>Security Answer</b></label>
    <input type="text" placeholder="Enter security answer" name="SecurityAnswer" required>
        <br></br>
		
			 <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>
        <br></br>
		
		 <label><b>Image</b></label>
    <input type="file"  name="image" required>
	<br></br>
	
	
		
		
    <button type="submit">Save</button>
	<br></br>
  </div>
  
	
 
</form>


 
</form>


</body>
</html>

