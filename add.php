<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "blood_organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 


// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
$address = $mysqli->real_escape_string($_REQUEST['address']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$phoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$location = $mysqli->real_escape_string($_REQUEST['location']);
 
//donors
$Dname = $mysqli->real_escape_string($_REQUEST['name']);
$DphoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Ddob = $mysqli->real_escape_string($_REQUEST['DOB']);
$Daddress = $mysqli->real_escape_string($_REQUEST['address']);
$Dsex = $mysqli->real_escape_string($_REQUEST['sex']);
$Bloodtype = $mysqli->real_escape_string($_REQUEST['bloodtype']);
$Demail = $mysqli->real_escape_string($_REQUEST['email']);


// attempt insert query execution
$sql = "INSERT INTO institution (Name, Address, Email, PhoneNo,Location) VALUES ('$name', '$address', '$email', '$phoneNo','$location')";

//donor
$sql = "INSERT INTO donor (Name, PhoneNo, DateOfBirth, Address, Sex, BloodType ,email ) VALUES ('$Dname', '$Daddress', '$Demail', '$DphoneNo','$Ddob','$Dbloodtype','$Dsex')";


if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
    $message ="Added Succesfully";
     echo "<script type = 'text/javascript'> alert($message);</script>";
     // header("Location: AdminAdd.php");


} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

 
// Close connection
$mysqli->close();
?>