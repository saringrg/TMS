<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the necessary libraries
require('vendor/autoload.php');
require('fpdf/fpdf.php');

// Get the form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$batchnumber = $_POST['batchnumber'];

// Database connection
$conn = new mysqli('localhost','root','','tms');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into traffic(fullname, email, password, batchnumber) values(?, ?, ?, ?)");
    $stmt->bind_param("sssi", $fullname, $email, $password, $batchnumber);
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
$pdf->Cell(0, 10, 'Traffic Login Details', 0, 1, 'C');

// Set the font for the document
$pdf->SetFont('Arial', '', 12);

// Add the form data to the document
$pdf->Cell(0, 10, 'Traffic Name: ' . $fullname, 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Password: ' . $password, 0, 1);
$pdf->Cell(0, 10, 'Batch Number: ' . $batchnumber, 0, 1);

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
    $mail->Password   = 'Space1400@';                   // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    // Set the email content
    $mail->setFrom('np03cs4a210050@heraldcollege.edu.np', 'TMS');
    $mail->addAddress($email);
    $mail->addStringAttachment($pdf_data, 'LoginDetails.pdf');
    $mail->isHTML(true);
    $mail->Subject = 'Login details';
    $mail->Body    = 'Please find attached Login Details submitted by Traffic Management System';
    $mail->AltBody = 'Please find attached Login Details submitted by Traffic Management System';

    // Send the email
    $mail->send();

    // show pop-up message
    echo '<script>alert("Message has been sent!");</script>';
    // redirect to login page
    echo '<script>window.location.href = "traffic2.php";</script>';

    //echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>