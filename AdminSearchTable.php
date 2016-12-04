<?php
	//  ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	//  error_reporting(E_ALL);
	session_start();
	require 'adminSession.php';
	$whoSearch = $_REQUEST["whoSearch"];

	$firstCriteria = $_REQUEST["firstCriteria"];
	$firstCondition = $_REQUEST["firstCondition"];
	$firstValue = $_REQUEST["firstValue"];

	$secondCriteria = $_REQUEST["secondCriteria"];
	$secondCondition = $_REQUEST["secondCondition"];
	$secondValue = $_REQUEST["secondValue"];

    if($whoSearch == "Employees"){

		if($firstCriteria == "Salary"  && $firstCondition != "=" ){

	 		$query = "SELECT  EmpID, SSN, Fname, Lname, Email, PhoneNumber, Salary, JobTitle  FROM employee WHERE $firstCriteria $firstCondition $firstValue";	
		}
		else{

			$query = "SELECT  EmpID, SSN, Fname, Lname, Email, PhoneNumber, Salary, JobTitle  FROM employee WHERE $firstCriteria like '%$firstValue%'";	
	
		}
	}

	if($whoSearch == "Patients"){

		if(($secondCriteria == "Weight" || $secondCriteria == "Height")  && $secondCondition != "=" ){
			$query = "SELECT  PatientID , Fname , Lname , BloodType , Sex , Weight , Height , Vitals  FROM patient WHERE $secondCriteria $secondCondition '$secondValue'";
		}
		else{
			$query = "SELECT  PatientID , Fname , Lname , BloodType , Sex , Weight , Height , Vitals  FROM patient WHERE $secondCriteria like '%$secondValue%'";
		}
	}

	$result= buildTable($query, $whoSearch);
	print($result);

	function buildTable($query, $whoSearch){

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
			 die("Search Invalid");



		//*** return query results in a string
		$query_result = "<table class='zui-table zui-table-zebra zui-table-horizontal' border=0 cellspacing=10  width=500 align=left>\n";

		$query_result = $query_result . "<tr align=Center>";
		for ($i = 0; $i<mysql_num_fields($result); $i++)
			$query_result = $query_result . "<th style=\"color: black\">" . ucfirst(mysql_field_name($result, $i)) . "</th>";
		$query_result = $query_result . "</tr>";
		$check=$query_result;
        
        //*** background colors for printing
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

	        if($whoSearch == "Employees"){
		        $query_result = $query_result . "<td colspan='2'>". "<a href = 'AdminEditEmployee.php?Edit=".$id."'>Edit</a>".  "</td>";
		   		$query_result = $query_result ."<td colspan='2'>". "<a href = 'AdminDeleteEmployee.php?Delete=".$id."'>Delete</a>".  "</td>";
	   	    }

	   	    if($whoSearch == "Patients"){
		        $query_result = $query_result . "<td colspan='2'>". "<a href = 'AdminEditPatient.php?Edit=".$id."'>Edit</a>".  "</td>";
		   		$query_result = $query_result ."<td colspan='2'>". "<a href = 'AdminDeletePatient.php?Delete=".$id."'>Delete</a>".  "</td>";
	   	    }
		  	
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