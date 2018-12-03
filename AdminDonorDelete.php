<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "blood_organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$_GET['DonorID'];
$DonorID = $_GET['DonorID'];


$sql = "DELETE FROM Donor WHERE DonorID = '$DonorID' ";


if($mysqli->query($sql) === true){
   echo "Record Successfully DELETED $sql. " . $mysqli->error;
   header("Location: admin.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close(); 
?>















