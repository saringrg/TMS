<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "tms");

  // Retrieve form data
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['fullname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $batchnumber = mysqli_real_escape_string($conn, $_POST['batchnumber']);

  // Update the data in the database
  $query = "UPDATE traffic SET fullname='$name', email='$email', password='$password', batchnumber='$batchnumber' WHERE id='$id'";
  $result = mysqli_query($conn, $query);

  // Check if the update was successful
  if ($result) {
    echo "<script>alert('Data updated successfully.')</script>";
    echo "<script>window.location = 'traffic2.php'</script>";
  } else {
    echo "<script>alert('Error updating data: " . mysqli_error($conn) . "')</script>";
    echo "<script>window.history.back()</script>";
  }


  // Close the database connection
  mysqli_close($conn);
}
?>
