<?php
  session_start();
  require 'adminSession.php';
?>

<!DOCTYPE html>
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

                            document.getElementById("adminTable").innerHTML = xmlhttp.responseText;
                       }

             }   

             function ajaxFunction() {

                  var URL = "http://localhost:8888/621Final-master/AdminSearchTable.php";
                  var queryString = "whoSearch=" + document.getElementById("whoSearch").value;
                  queryString = queryString + "&firstCriteria="+ document.getElementById("firstCriteria").value+"&firstCondition="+ document.getElementById("firstCondition").value+"&firstValue="+ document.getElementById("firstValue").value;
                  queryString = queryString + "&secondCriteria="+ document.getElementById("secondCriteria").value+"&secondCondition="+ document.getElementById("secondCondition").value+"&secondValue="+ document.getElementById("secondValue").value;  

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
              <a href=""><img src="images/Saint_Joseph's_University_seal.png" alt="" width="80" height="80" /></a>Team 8 <span>the best</span>
            </div>
            <div class="search">
                Admin Portal
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
                    <a href="AdminSearch.html">Search For Users</a><br/>
                </div>
            </div>
      
    <li><a href="logout.php" class="arrow">Logout</a>
    
      
       
            
 
      </ul>
        
    </div>

    <!-- end #header -->

        <form name="AdminTableFrom">
           <table> 
            <tr>
                  <select id="whoSearch" >
                        <option value="Employees">Employees</option>
                        <option value="Patients">Patients</option>
                  </select> 
            </tr>
            <tr>
                  <td>
                      For Employees:
                  </td>
                  <td>
                      <select id="firstCriteria" >
                          <option value="Fname">First Name</option>
                          <option value="Lname">Last Name</option>
                          <option value="Salary">Salary</option>
                          <option value="PhoneNumber">Phone Number</option>
                          <option value="JobTitle">Job Title</option>
                          <option value="SSN">SSN</option>
                      </select> 

                      <select id="firstCondition">
                          <option value="=">=</option>
                          <option value=">">></option>
                          <option value="<"><</option>
                          <option value=">=">>=</option>
                          <option value="<="><=</option>
                      </select> 

                      <input type="text" id="firstValue" placeholder="Enter Value" onKeyUp="ajaxFunction()"/>
                  </td>
            </tr>
            <br/>
            <tr>
                  <td>
                      For Patients:
                  </td>
                  <td>
                      <select id="secondCriteria">
                          <option value="Fname">First Name</option>
                          <option value="Lname">Last Name</option>
                          <option value="Bloodtype">Bloodtype</option>
                          <option value="Sex">Sex</option>
                          <option value="Weight">Weight</option>
                          <option value="Height">Height</option>
                          <option value="Vitals">Vitals</option>
                      </select> 

                      <select id="secondCondition">
                          <option value="=">=</option>
                          <option value=">">></option>
                          <option value="<"><</option>
                          <option value=">=">>=</option>
                          <option value="<="><=</option>
                      </select> 

                      <input type="text" id="secondValue" placeholder="Enter Value" onKeyUp="ajaxFunction()"/>
                  </td>
                  
            </tr>

           </table>


            
        </form>

        <div class="table" id="adminTable">
        </div>
          </div>
      <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all   child floats --><br class="clearfloat" />
      <!-- begin #footer -->

      <!-- end #footer -->
      </div>
    </body>

</html>
