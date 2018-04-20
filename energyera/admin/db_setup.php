<?php
$servername = "localhost";
$username = "jqi8";
$password = "5BnMRLWE";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?>