<?php
          
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbName = "blood_organ";

          $con = new mysqli($servername, $username,$password, $dbName);

          if($con->connect_error)
          {
            die("connection failed: " . $con->connect_error);
          }

?>