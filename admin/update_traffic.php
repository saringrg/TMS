<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "tms");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if (isset($_POST["submit"])) {
  // Get form data
  $id = $_POST["id"];
  $fullname = $_POST["fullname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $batchnumber = $_POST["batchnumber"]; 

  // Update data in the "traffic" table
  $sql = "UPDATE traffic SET fullname='$fullname', email='$email', password='$password', batchnumber='$batchnumber' WHERE id=$id";

  if (mysqli_query($conn, $sql)) {
    // Redirect to dashboard with success message
    header("Location: dash.php?msg=Record updated successfully");
    exit();
  } else {
    // Display error message
    echo "Error updating record: " . mysqli_error($conn);
  }
}

// Close MySQL database connection
mysqli_close($conn);
?>
