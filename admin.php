<?php ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hospital</title>
<link href="styles.css" rel="stylesheet" type="text/css" />
<link href="drop.css" rel="stylesheet" type="text/css" />
<!--[if IE 5]>
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
            	<a href=""><img src="images/Saint_Joseph's_University_seal.png" alt="" width="80" height="80" /></a>Team 8 <span>Hospital Management System</span>
            </div>
            <div class="search">
            Admin Portal
             </div>
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
		
	<li><a href="#Horizontal-Menus" class="arrow">Search</a>
        <div class="drop decor1_2" style="width: 150px;">
            <div class='left'>
                <div>
                    <a href="AdminSearch.php">Search For Users</a><br/>
                </div>
        </div>	
			
			
			
			
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
        <div id="mainContent">
        	<h1>We developed a hospital management system that helps stakholders across the company</h1>
            <p> We have three major users: employee, administrator and patient.<br />
				<li>Employee contains doctors and nurses.</li>
				<li>Administrator can log in and add employees, see patient info and perform administrative tasks.</li>
				<li>Patients can see their reports, appintment and other related information.</li>
            </p>
        </div>
        <!-- end #mainContent -->
    </div>
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
