<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "tms");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the ID parameter is set
if (isset($_POST["id"])) {
  $id = $_POST["id"];

  // Validate the ID parameter
  if (!is_numeric($id)) {
    die("Invalid ID parameter");
  }

  // Construct the DELETE query and execute it
  $sql = "DELETE FROM traffic WHERE id = $id";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Record deleted sucessfully'); window.location.href='dash.php';</script>";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
} else {
  echo "No ID parameter specified";
}

// Close MySQL database connection
mysqli_close($conn);
?>
