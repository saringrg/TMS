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

// If email matches a user in the database, update their password
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $sql = "UPDATE user SET password='$new_password' WHERE id='$user_id'";
    
} else {
    echo "<script>alert('Email not found in database.'); window.location.href='resetpassword.html';</script>";
}

$conn->close();
?>
