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

		$count=0;

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


		return $query_result;
    }

?>
