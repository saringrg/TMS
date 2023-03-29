<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the necessary libraries
require('vendor/autoload.php');
require('fpdf/fpdf.php');

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$vehicle_number = $_POST['vehicle_number'];
$license_number = $_POST['license_number'];
$fine_category = $_POST['fine_category'];
$fine_box = $_POST['fine_box'];
$location = $_POST['location'];
$traffic_station = $_POST['traffic_station'];
$police_name = $_POST['police_name'];

// Database connection
$conn = new mysqli('localhost','root','','tms');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into echit(name, email, date, vehicle_number, license_number, fine_category, fine_box, location, traffic_station, police_name) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiisisss", $name, $email, $date, $vehicle_number, $license_number, $fine_category, $fine_box, $location, $traffic_station, $police_name);
    $execval = $stmt->execute();
    $stmt->close();
    $conn->close();

    if($execval) {
        // show pop-up message
        echo '<script>alert("data saved successfully!");</script>';
        // redirect to login page
        //echo '<script>window.location.href = "login.html";</script>';
    } else {
        echo '<script>alert("data saving failed!");</script>';
        //echo "<script>alert('Error in registration'); window.location.href='signup.html';</script>";
        //echo "Error in registration";
    }
}

