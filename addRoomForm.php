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
</style><?php


?>

<!DOCTYPE html>
<html>

<body>

<h2>New Patient</h2>

<form  method = "POST" action="addRoom.php">


  <div class="container">
 

    
		
		
    <label><b>Building Number</b></label>
    <input type="text" placeholder="Enter Building Number" name="BuildingNumber" required>
        <br></br>
		
		
    <label><b>Floor Number</b></label>
    <input type="text" placeholder="Enter Floor Number" name="FloorNumber" required>
        <br></br>
		
		<label><b>Room Number</b></label>
    <input type="text" placeholder="Enter Room Number" name="RoomNumber" required>
        <br></br>
		
		
    <button type="submit">Save</button>
	<br></br>
  </div>
  
	
 
</form>


 
</form>


</body>
</html>

