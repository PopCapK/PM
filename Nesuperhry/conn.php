<?php
$servername = "localhost";
$username = "petrabraham";
$password = "VHUgai725";
$database = "petrabraham";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "";
?>