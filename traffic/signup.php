<?php
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $batchnumber = $_POST['batchnumber'];

	// Database connection
	$conn = new mysqli('localhost','root','','tms');
	
?>
