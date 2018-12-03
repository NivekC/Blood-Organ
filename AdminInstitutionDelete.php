<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "blood_organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$_GET['InstitutionID'];
$InstitutionID = $_GET['InstitutionID'];

//deleting a donor
/*$DonorId = $mysqli->real_escape_string($_REQUEST['DonorId']);

      $sql = "DELETE FROM donor WHERE DonorId = '$DonorId' ";
*/
//deleting an institution

 // $InstitutionId = $mysqli->real_escape_string($_REQUEST['InstitutionId']);

      $sql = "DELETE FROM institution WHERE InstitutionId = ' ".$InstitutionID."' ";
      
/*if($mysqli->query($sql1) === true){
   echo "Record Successfully DELETED $sql1. " . $mysqli->error;
    // header("Location: delete.php");
} else{
    echo "ERROR: Could not able to execute $sql1. " . $mysqli->error;
}*/
      

if($mysqli->query($sql) === true){
   echo "Record Successfully DELETED $sql. " . $mysqli->error;
   header("Location: admin.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close(); 
?>















