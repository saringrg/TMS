<?php
// Generate a six-digit code
$chit_number = rand(100000, 999999);

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
$notice = $_POST['notice'];

// Database connection
$conn = new mysqli('localhost','root','','tms');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into echit(name, email, date, vehicle_number, license_number, fine_category, fine_box, location, traffic_station, police_name, notice, chit_number) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisissssi", $name, $email, $date, $vehicle_number, $license_number, $fine_category, $fine_box, $location, $traffic_station, $police_name, $notice, $chit_number);
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
$pdf->Cell(0, 10, 'E-Chit', 0, 1, 'C');

// Set the font for the document
$pdf->SetFont('Arial', '', 12);

// Add the form data to the document
$pdf->Cell(0, 10, 'Chit Number: ' . $chit_number, 0, 1, 'R');
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
$pdf->Cell(0, 10, 'Notice: ' . $notice, 0, 1);
$pdf->Cell(0, 10, 'Please, write the specified chit number at the remarks section during the payment', 0, 0, 'C'); // print message centered


// Output the PDF
$pdf_data = $pdf->Output('S');

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Set the email parameters
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'np03cs4a210050@heraldcollege.edu.np';                 // SMTP username
    $mail->Password   = '';                   // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // Set the email content
    $mail->setFrom('np03cs4a210050@heraldcollege.edu.np', 'TMS');
    $mail->addAddress($email);
    $mail->addStringAttachment($pdf_data, 'E-Chit.pdf');
    $mail->isHTML(true);
    $mail->Subject = 'eChit details';
    $mail->Body    = 'Please find attached E-Chit submitted by Traffic Management System';
    $mail->AltBody = 'Please find attached E-Chit submitted by Traffic Management System';

    // Send the email
    $mail->send();

    // show pop-up message
    echo '<script>alert("Message has been sent!");</script>';
    // redirect to login page
    echo '<script>window.location.href = "trafficdash.html";</script>';

    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>