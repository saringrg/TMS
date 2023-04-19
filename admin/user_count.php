<?php
// Replace the database credentials with your own
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tms";

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create a SQL query to count the number of records in a table
$sql = "SELECT COUNT(*) as count FROM user";

// Execute the query
$result = mysqli_query($conn, $sql);

// Get the count of the records
$count = mysqli_fetch_assoc($result)['count'];

// Print the count
echo "Number of records: " . $count;

// Close the database connection
mysqli_close($conn);
?>
