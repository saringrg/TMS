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
$sql = "SELECT * FROM signup WHERE email='$email'";
$result = $conn->query($sql);

// If email matches a user in the database, update their password
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_id = $row['id'];
    $sql = "UPDATE signup SET password='$new_password' WHERE id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Password updated successfully.");</script>';
        // redirect to login page
        echo '<script>window.location.href = "login1.html";</script>';

        //echo "<script>alert('Password updated successfully.');</script>";
       // header("Location: login1.html");
        //exit();
    } else {
        echo "<script>alert('Error updating password'); window.location.href='resetpassword.html';</script>";

        //echo "<script>alert('Error updating password: " . $conn->error . "');</script>";
       // header("Location: respassword.html");
       // exit();
    }
} else {
    echo "<script>alert('Email not found in database.'); window.location.href='resetpassword.html';</script>";
    //echo "<script>alert('Email not found in database.');</script>";
    //header("Location: respassword.html");
    //exit();
}

$conn->close();
?>
