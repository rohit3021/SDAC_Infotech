<?php
// dbconfig.php

// $servername = "sql201.infinityfree.com"; // Use your database server details
// $username = "if0_37405908";        // Your MySQL username
// $password = "OX2Du3ov2OvnPka";            // Your MySQL password (if any)
// $dbname = "if0_37405908_blog_app";      // Your database name
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
