<?php
	session_start();
	
	//Make sure page cant be accessed without logging in
	if(!isset($_SESSION['EmpID'])) {
        header("Location: home.html");
    }

	$EmpID = $_SESSION['EmpID'];
	$search = $_REQUEST["search"];
	$searchBy = $_REQUEST["searchBy"];
	
	$query = "SELECT  PatientID , Fname , Lname , BloodType , Sex , Weight , Height , Vitals  from patient where EmpID = '$EmpID' and $searchBy like '%$search%'";
    $result= buildTable($query);
	print($result);

	function buildTable($query){

	  	$localhost = 'localhost';
		$username = 'root';
		$password = 'root';
		$database = 'hospital';

		//*** create a connection object
		$connection = mysql_connect($localhost, $username, $password)
				or die (mysql_error());

		mysql_select_db($database)
				or die (mysql_error());

		//*** execute the query
		$result = mysql_query($query);

		//*** die if no result
		if (!$result)
			 die("Query Failed.");



		//*** return query results in a string
		$query_result = "<table border=0 cellspacing=10  width=500 align=left>\n";

		$query_result = $query_result . "<tr align=Center>";
		for ($i = 0; $i<mysql_num_fields($result); $i++)
			$query_result = $query_result . "<th style=\"color: black\">" . ucfirst(mysql_field_name($result, $i)) . "</th>";
		$query_result = $query_result . "</tr>";

              //*** background colors for printing
		$ptr = 0;
		$colors = array("white", "#dcebf8");

		while ($row = mysql_fetch_row($result)) {

			//*** alternate colors
            $ptr = ($ptr + 1)%2;
	        $query_result = $query_result . "<tr bgcolor=$colors[$ptr]>\n";

			foreach ($row as $item) {
				$query_result = $query_result . "   <td>$item</td>\n";
	         }


	        $query_result = $query_result . "<td colspan='2'>". "<a href = 'DoctorEditPatient.php?Edit=$row[PatientID]'>Edit</a>".  "</td>";
	   		$query_result = $query_result ."<td colspan='2'>". "<a href = 'DoctorAddReport1.php?Report=$row[PatientID]'>Reports</a>".  "</td>";
		  	
		  	$query_result = $query_result . "</tr>\n";
		}

		$query_result = $query_result . "</table>\n";



		//*** Free the resources associated with the result
		mysql_free_result($result);

		//*** close this connection
		mysql_close($conn);

		return $query_result;
    }



?>