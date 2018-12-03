<?php
session_start();
//echo $_SESSION['Username'];
unset($_SESSION['Username']);
unset($_SESSION['Name']);
unset($_SESSION['Donorname']);
header("location: index.php");

?>