<?php
session_start();
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "Blood_Organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

if (isset($_POST['Organ'])) {
  // Escape user inputs for security
$name = $mysqli->real_escape_string($_POST['name']);
$password = $mysqli->real_escape_string($_REQUEST['password']);
$cpassword = $mysqli->real_escape_string($_REQUEST['cpassword']);
$sex = $mysqli->real_escape_string($_REQUEST['Sex']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$DateOfBirth = $mysqli->real_escape_string($_REQUEST['DOB']);
$NatId = $mysqli->real_escape_string($_REQUEST['NationalID']);
$Organ = $mysqli->real_escape_string($_REQUEST['Organ']);

  $target = "images/".basename($_FILES['Image']['name']);
  $Image = $_FILES['Image']['name'];


$_SESSION['Donorname'] = $name;

if ($password===$cpassword) {
$hash = password_hash($password, PASSWORD_DEFAULT);
 // attempt insert query execution
$sql = "INSERT INTO donor (Name,Password,PhoneNo,NationalID,DateOfBirth,Address,Sex,email,Image) VALUES ('$name','$hash','$PhoneNo','$NatId','$DateOfBirth','$Address','$sex','$email','$Image')";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
$msg = "Image Uploaded successfully";
}
else
{
$msg = "There was a problem uploading the Image ";
}
/*if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
  //header("DonorIn.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}*/
$sql2 = "SELECT DonorID FROM donor WHERE Name = '".$name."'";
echo $sql2;
$result = $mysqli-> query($sql2) ;
$donorid = "";
if ($result-> num_rows > 0) {
  while ($row= $result-> fetch_assoc()) {
    $donorid = $row['DonorID'];
  }
}
echo $donorid;

$sql3 = "INSERT INTO organ (OrganType,DonorID) VALUES ('$Organ','".$donorid."')";
echo $sql3;

if ($mysqli->query($sql3)) {
  echo "Records inserted successfully."; 
  header("location: DonorIn.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

} else
{
 /*  if ($error == false) {
$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
}else {*/
    echo '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    header("location: DonorReg.php");
  
}
} 


elseif (isset($_POST['BloodType'])) {
  // Escape user inputs for security
$name = $mysqli->real_escape_string($_POST['name']);
$password = $mysqli->real_escape_string($_REQUEST['password']);
$cpassword = $mysqli->real_escape_string($_REQUEST['cpassword']);
$sex = $mysqli->real_escape_string($_REQUEST['Sex']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);
$email = $mysqli->real_escape_string($_REQUEST['email']);
$DateOfBirth = $mysqli->real_escape_string($_REQUEST['DOB']);
$NatId = $mysqli->real_escape_string($_REQUEST['NationalID']);
$blood_type = $mysqli->real_escape_string($_REQUEST['BloodType']);
$target = "images/".basename($_FILES['Image']['name']);
$Image = $_FILES['Image']['name'];

if ($password===$cpassword) {
$hash = password_hash($password, PASSWORD_DEFAULT);
$_SESSION['Donorname'] = $name;
$sql = "INSERT INTO donor (Name,Password,PhoneNo,NationalID,DateOfBirth,Address,Sex,email,Image) VALUES ('$name','$hash','$PhoneNo','$NatId','$DateOfBirth','$Address','$sex','$email','$Image')";
if(move_uploaded_file($_FILES['Image']['tmp_name'], $target)){
$msg = "Image Uploaded successfully";
}
else
{
$msg = "There was a problem uploading the Image ";
}
if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
  header("DonorIn.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
$sql2 = "SELECT DonorID FROM donor WHERE Name = '".$name."'";

$result = $mysqli-> query($sql2) ;
$donorid = "";
if ($result-> num_rows > 0) {
  while ($row= $result-> fetch_assoc()) {
    $donorid = $row['DonorID'];
  }
}

$sql3 = "INSERT INTO blood (BloodType, DonorID) VALUES ('$blood_type','$donorid')";

if ($mysqli-> query($sql3)) {
  echo "Records inserted successfully."; 
  header("location: DonorIn.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}


}
}
?>     




