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

// Create a new PDF instance
$pdf = new FPDF();

// Add a page to the PDF
$pdf->AddPage();

// Set the font for the document
$pdf->SetFont('Arial', 'B', 16);

// Add the title to the document
$pdf->Cell(0, 10, 'eChit', 0, 1, 'C');

// Set the font for the document
$pdf->SetFont('Arial', '', 12);

// Add the form data to the document
$pdf->Cell(0, 10, 'Name: ' . $name, 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Date: ' . $date, 0, 1);
$pdf->Cell(0, 10, 'Vehicle Number: ' . $vehicle_number, 0, 1);
$pdf->Cell(0, 10, 'License Number: ' . $license_number, 0, 1);
$pdf->Cell(0, 10, 'Fine Category: ' . $fine_category, 0, 1);
$pdf->Cell(0, 10, 'Fine Box: ' . $fine_box, 0, 1);
$pdf->Cell(0, 10, 'Location: ' . $location, 0, 1);
$pdf->Cell(0, 10, 'Traffic Station: ' . $traffic_station, 0, 1);
$pdf->Cell(0, 10, 'Police Name: ' . $police_name, 0, 1);

// Output the PDF
$pdf_data = $pdf->Output('S');

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

?>