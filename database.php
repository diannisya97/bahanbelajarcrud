<?php
header("Content-Type: application/json");

// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'moving_class';

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}
?>