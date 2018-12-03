<?php


session_start();


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "blood_organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
$username = $mysqli->real_escape_string($_REQUEST['username']);
$password = $mysqli->real_escape_string($_REQUEST['password']);
$cpassword = $mysqli->real_escape_string($_REQUEST['cpassword']);
$sex = $mysqli->real_escape_string($_REQUEST['sex']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$NatId = $mysqli->real_escape_string($_REQUEST['NatId']);
$DateOfBirth = $mysqli->real_escape_string($_REQUEST['DOB']);

$target = "images/".basename($_FILES['Image']['name']);
$Image = $_FILES['Image']['name'];

$_SESSION['Username']=$username;
 
 if ($password===$cpassword) {
 	# code...
$hash = password_hash($password, PASSWORD_DEFAULT);
 	$sql = "INSERT INTO users (Name,Username,Password,Sex,PhoneNo,email,NationalID,Address,DateOfBirth,image,AccessLevel) VALUES ('$name','$username','$hash','$sex', '$PhoneNo','$email','$NatId','$Address','$DateOfBirth','$Image',0)";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
echo "Image Uploaded successfully";
}
else
{
echo "There was a problem uploading the Image ";
}

if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
    $message ="signup successfull";
     //echo "<script type = 'text/javascript'> alert($message);</script>";
     header("Location: sign_in.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 }
// attempt insert query execution

// Close connection
$mysqli->close();
?>