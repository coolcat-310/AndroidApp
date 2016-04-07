<?php
$servername = "localhost";
$username = "coolcat";
$password = "toma456";
$dbname = "testy";// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} $sql = "SELECT quote FROM tab";
$result = $conn->query($sql);
   // output data of each row
   $quote = $result->fetch_all(MYSQLI_ASSOC);

	echo json_encode($quote);
$conn->close();
?>