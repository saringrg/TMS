<?php
// Check if the ID is set
if (isset($_POST['id'])) {
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "tms");

  // Retrieve data for the specific row
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $query = "SELECT * FROM traffic WHERE id = '$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  // Display the form with the retrieved data
  if ($row) {
    echo "<form method='post' action='update_traffic.php'>
            <input type='hidden' name='id' value='" . $row["id"] . "'>
            <label>Name:</label>
            <input type='text' name='name' value='" . $row["fullname"] . "'><br>
            <label>Email:</label>
            <input type='email' name='email' value='" . $row["email"] . "'><br>
            <label>Password:</label>
            <input type='password' name='password' value='" . $row["password"] . "'><br>
            <label>Batch Number:</label>
            <input type='text' name='batchnumber' value='" . $row["batchnumber"] . "'><br>
            <input type='submit' name='submit' value='Update'>
          </form>";
  } else {
    echo "Row not found.";
  }

  // Close the database connection
  mysqli_close($conn);
}
?>
