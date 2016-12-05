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
        <script  type="text/javascript" >

            var xmlhttp = new XMLHttpRequest();
            
            xmlhttp.onreadystatechange=function() {

                       //*** response is ready
                       if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {

                            document.getElementById("patientTable").innerHTML = xmlhttp.responseText;
                       }

             }   

             function ajaxFunction() {

                  var URL = "http://localhost:8888/621Final-master//doctorTable.php";
                  var queryString = "searchBy=" + document.getElementById("searchBy").value +"&search="+ document.getElementById("search").value;

                  xmlhttp.open("POST", URL, true);
                  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xmlhttp.send(queryString);

              }

        </script>

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

			    <li><a href="#Horizontal-Menus" class="arrow">Settings</a>
			        <div class="drop decor1_2" style="width: 150px;">
			            <div class='left'>
			                <div>
			                    <a href="settings.php">Change Password</a><br/>
			                    <a href="EditDoctor.php">Edit Doctor Info</a><br/>
			                </div>
			            </div>
			      
			    <li><a href="logout.php" class="arrow">Logout</a>
			    

	     	 </ul>
	        
	    </div>

	    <!-- end #header -->

	<h2>Doctor Page</h2>
	<br>
        <form name="PaitentTableFrom">

            <input type="text" id="search" placeholder="Search for Patients" onKeyUp="ajaxFunction()"/>
            
            <select id="searchBy">
                <option value="Fname">First Name</option>
                <option value="Lname">Last Name</option>
                <option value="Bloodtype">Bloodtype</option>
                <option value="Sex">Sex</option>
                <option value="Weight">Weight</option>
                <option value="Height">Height</option>
                <option value="Vitals">Vitals</option>
            </select> 
            
        </form>

        <div class="table" id="patientTable">
        </div>

           </div>
      <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all   child floats --><br class="clearfloat" />
      <!-- begin #footer -->

      <!-- end #footer -->
      </div>
    </body>

</html>
