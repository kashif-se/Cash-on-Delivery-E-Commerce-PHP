<?php

$servername = "localhost"; // Enter MySQL server address
$username = "root"; //MySQL User Name
$password = "password"; //MySQL Password
$dbname = "fruit"; //
global $conn;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn -> connect_error) {
	die("Connection to database failed: " . $conn -> connect_error);
	exit();
}
?>