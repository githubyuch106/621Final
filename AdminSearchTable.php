<?php
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

	  	require 'common.php';
		$connection = new mysqli($localhost , $dusername , $dpassword,$database);
		if ($connection->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
			echo "No Connection to DB";
		} 

    		$result = mysqli_query($connection, $query);

		$query_result = "<table class='zui-table zui-table-zebra zui-table-horizontal' border=0 cellspacing=10  width=500 align=left>\n";

		$query_result = $query_result . "<tr align=Center>";
		$fieldinfo = mysqli_fetch_fields($result);
		foreach ($fieldinfo as $val)
			$query_result = $query_result . "<th style=\"color: black\">" . ucfirst($val->name) . "</th>";
		$query_result = $query_result . "</tr>";
		$check=$query_result;
        

		while ($row = mysqli_fetch_row($result)) {	
	
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
		        $query_result = $query_result . "<td colspan='2'>". "<a hsref = 'AdminEditEmployee.php?Edit=".$id."'>Edit</a>".  "</td>";
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

		return $query_result;
    }

?>
