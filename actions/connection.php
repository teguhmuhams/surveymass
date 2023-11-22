<?php
// Database configuration
$host = "localhost"; // Host name 
$username = "root"; // Mysql username 
$password = "root"; // Mysql password 
$db_name = "surveymass"; // Database name 

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;
