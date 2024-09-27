<?php
// dbconfig.php

$servername = "localhost"; // Use your database server details
$username = "root";        // Your MySQL username
$password = "";            // Your MySQL password (if any)
$dbname = "blog_app";      // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
