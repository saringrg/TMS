<!-- <?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
  // Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "tms");

  // Retrieve form data
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $fname = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $license_number = mysqli_real_escape_string($conn, $_POST['license_number']);
  $fine_box = mysqli_real_escape_string($conn, $_POST['fine_box']);
  $traffic_station = mysqli_real_escape_string($conn, $_POST['traffic_station']);
  $chit_number = mysqli_real_escape_string($conn, $_POST['chit_number']);
  $payment = mysqli_real_escape_string($conn, $_POST['payment']);

  // Update the data in the database
  $query = "UPDATE echit SET name='$fname', email='$email', date='$date', license_number='$license_number', fine_box='$fine_box', traffic_station='$traffic_station', chit_number='$chit_number', payment='$payment' WHERE id='$id'";
  $result = mysqli_query($conn, $query);

  // Check if the update was successful
  if ($result) {
    echo "<script>alert('Data updated successfully.')</script>";
    echo "<script>window.location = 'echit.php'</script>";
  } else {
    echo "<script>alert('Error updating data: " . mysqli_error($conn) . "')</script>";
    echo "<script>window.history.back()</script>";
  }


  // Close the database connection
  mysqli_close($conn);
}
?> -->
