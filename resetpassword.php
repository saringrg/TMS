<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$new_password = $_POST['new_password'];

// Query database for user with matching email
$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);



$conn->close();
?>
