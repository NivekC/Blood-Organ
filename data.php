<?php
session_start();

		/*if (!isset($_SESSION['Name'])) {

		 header("location: Hospitalin.php");
		 die();
		}*/
//setting header to json
//header('Content-Type: application/json');

/*//database
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'blood_organ');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT BloodType, Amount FROM bloodbank WHERE InstitutionID = 6");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);*/

			 //setting header to json
			header('Content-Type: application/json');

	//database
			define('DB_HOST', 'localhost');
			define('DB_USERNAME', 'root');
			define('DB_PASSWORD', '');
			define('DB_NAME', 'blood_organ');

			//get connection
			$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

			if(!$mysqli){
				die("Connection failed: " . $mysqli->error);
			}
			$sql = "SELECT InstitutionID FROM Institution WHERE Name = '".$_SESSION['Name']."'";

				$result1 = $mysqli-> query($sql) ;


				$institutionid = "";
				if ($result1-> num_rows > 0) {
				  while ($row1= $result1-> fetch_assoc()) {
				    $institutionid = $row1['InstitutionID'];
				  }
				}

			//query to get data from the table
			$query = "SELECT BloodType, Amount FROM bloodbank WHERE InstitutionID = '".$institutionid."'";

			//execute query
			$result = $mysqli->query($query);

			//loop through the returned data
			$data = array();
			foreach ($result as $row) {
				$data[] = $row;
			}

			//free memory associated with result
			$result->close();

			//close connection
			$mysqli->close();
			print json_encode($data);
			
?>