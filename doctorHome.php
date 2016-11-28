<?php

    session_start();

    //Make sure page cant be accessed without logging in
    if(!isset($_SESSION['EmpID'])) {
        header("Location: home.html");
    }
    else{
        $empName = $_SESSION['aEmpName'];
        echo "Welcome, ".$empName;
    }

?>

<html>

    <head>
        <script  type="text/javascript" >

            var xmlhttp = new XMLHttpRequest();
            
            xmlhttp.onreadystatechange=function() {

                       //*** response is ready
                       if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200)) {

                            document.getElementById("patientTable").innerHTML = xmlhttp.responseText;
                       }

             }   

             function ajaxFunction() {

                  var URL = "http://localhost:8888/DatabaseProjecy/doctorTable.php";
                  var queryString = "searchBy=" + document.getElementById("searchBy").value +"&search="+ document.getElementById("search").value;

                  xmlhttp.open("POST", URL, true);
                  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                  xmlhttp.send(queryString);

              }

        </script>

    </head>

    <body>


        <h2>Doctors Page</h2>
        
        <form action="settings.php">
            <input type="submit" value= "Settings"/>
        </form>

        <form action="logout.php">
            <input type="submit" value= "Logout"/>
        </form>


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
    </body>

</html>
