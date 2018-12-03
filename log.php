<?php

session_start();


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
  $servername = "localhost";
  $username = "root";
  $pass = "";
  $dbName = "blood_organ";
$con = new mysqli($servername, $username, $pass, $dbName);

// Check connection
if($con->connect_error)
  {
    die("connection failed: " . $con->connect_error);
  }
// Escape user inputs for security
$Username = $con->real_escape_string($_REQUEST['Username']);
$Password = $con->real_escape_string($_REQUEST['Password']);

$_SESSION['Username'] = $Username;
    
      $sql = "SELECT Username,Password,AccessLevel FROM users WHERE Username = '".$Username."' ";
      

      if(!($result = $con ->query($sql))){
        echo $con->error;
      }
/*      if (password_verify($password1, $hash)) {
    // Success!
    echo $hash;
}
else {
    // Invalid credentials
    echo "Passwords do not match";
}*/
//echo $sql;

      if ($result-> num_rows > 0) {
        print_r($result) ;
        while ($row = $result-> fetch_assoc()) {
          echo $row["Password"];
          if ($row["Username"]== $Username && password_verify($Password, $row["Password"])) {
           echo "success";
            if($row["AccessLevel"] == 1)
            {
              header("location: Admin.php");
            } else
            
           header("location: index.php");
          }
          else
          {
            echo "failed";

          
    }
  }
}

?>
