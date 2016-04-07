<?php
$servername = "localhost";
$username = "coolcat";
$password = "toma456";
$dbname = "juan";// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} $sql = "SELECT * FROM jtable";
$result = $conn->query($sql);
   // output data of each row
   $data = $result->fetch_all(MYSQLI_ASSOC);

	echo json_encode($data);
$conn->close();
?>