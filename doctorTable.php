<?php
	session_start();
	require 'doctorSession.php';

	$EmpID = $_SESSION['aEmpID'];
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
		$query_result = "<table class='zui-table zui-table-zebra zui-table-horizontal' border=0 cellspacing=10  width=500 align=left>\n";

		$query_result = $query_result . "<tr align=Center>";
		for ($i = 0; $i<mysql_num_fields($result); $i++)
			$query_result = $query_result . "<th style=\"color: black\">" . ucfirst(mysql_field_name($result, $i)) . "</th>";
		$query_result = $query_result . "</tr>";
		$check=$query_result;

		$count=0;

		while ($row = mysql_fetch_row($result)) {	
	
	        $query_result = $query_result . "<tr bgcolor='white'>\n";

			foreach ($row as $item) {
				if($count==0){
					$id = $item;
				}

				$count++;
				$query_result = $query_result . "   <td>$item</td>\n";
	         }
	        $count=0;
	        $query_result = $query_result . "<td colspan='2'>". "<a href = 'DoctorEditPatient.php?Edit=".$id."'>Edit</a>".  "</td>";
	   		$query_result = $query_result ."<td colspan='2'>". "<a href = 'DoctorAddReport1.php?Report=".$id."'>Reports</a>".  "</td>";
		  	
		  	$query_result = $query_result . "</tr>\n";
		}

		$query_result = $query_result . "</table>\n";
		$check=$check."</table>\n";

		if($check == $query_result){

			$result = "<br><p>Search Not found<p/>";
			return $result;
		}



		//*** Free the resources associated with the result
		mysql_free_result($result);

		//*** close this connection
		mysql_close($conn);

		return $query_result;
    }



?>
