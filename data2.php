<?php
session_start();


		/*if (!isset($_SESSION['Name'])) {

		 header("location: Hospitalin.php");
		 die();
		}*/


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
//query to get data from the table
$query = "SELECT BloodType, Amount FROM bloodbank WHERE InstitutionID = 5";

echo $query;
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
print_r($data);
//header("location: chart.php");
			
?>