<?php
    // Retrieve form data
    $fullname = $_POST['name'];
    $email = $_POST['email'];
	$subject = $_POST['subject'];
    $message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','tms');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into complain(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $fullname, $email, $subject, $message);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();

		if($execval) {
			// show pop-up message
			echo '<script>alert("Complain sent!");</script>';
			// redirect to login page
			echo '<script>window.location.href = "userdash.html";</script>';
		} else {
			echo "<script>alert('Error in sending complain'); window.location.href='complain.html';</script>";
			//echo "Error in registration";
		}
	}
?>
