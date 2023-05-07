<?php
$host = "localhost";
$username = "root";
$password = "";
$database_name = "userreg";

// Create a new MySQL connection using the mysqli extension
$connection = mysqli_connect($host, $username, $password, $database_name);

// Check for errors in the connection
if (mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
  

?>


