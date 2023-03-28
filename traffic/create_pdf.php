<?php

// Include the necessary libraries
require('fpdf/fpdf.php');

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$location = $_POST['location'];
$vehicle_number = $_POST['vehicle_number'];
$license_number = $_POST['license_number'];
$category = $_POST['category'];
$police_name = $_POST['police_name'];

// Create a new PDF instance
$pdf = new FPDF();

// Add a page to the PDF
$pdf->AddPage();

// Set the font for the document
$pdf->SetFont('Arial', 'B', 16);

// Add the title to the document
$pdf->Cell(0, 10, 'Vehicle Registration Form', 0, 1, 'C');

// Set the font for the document
$pdf->SetFont('Arial', '', 12);

// Add the form data to the document
$pdf->Cell(0, 10, 'Name: ' . $name, 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Date: ' . $date, 0, 1);
$pdf->Cell(0, 10, 'Location: ' . $location, 0, 1);
$pdf->Cell(0, 10, 'Vehicle Number: ' . $vehicle_number, 0, 1);
$pdf->Cell(0, 10, 'License Number: ' . $license_number, 0, 1);
$pdf->Cell(0, 10, 'Category: ' . $category, 0, 1);
$pdf->Cell(0, 10, 'Police Name: ' . $police_name, 0, 1);

// Output the PDF
$pdf->Output('D', 'vehicle-registration-form.pdf');

?>


----------------------------xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx---------------------

<?php
// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Database connection details
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "consumer";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get email from HTML form
$email = $_POST['email'];

// Check if email exists in database table
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Email exists in database, generate 4-digit verification code
    $verificationCode = rand(1000, 9999);

    // Send verification code to email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'np03cs4a210037@heraldcollege.edu.np';                     //SMTP username
        $mail->Password   = 'october8563 herald';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to

        //Recipients
        $mail->setFrom('np03cs4a210037@heraldcollege.edu.np', 'Aqua Nepal');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verification Code';
        $mail->Body    = 'Your verification code is: ' . $verificationCode;

        $mail->send();
        echo 'Verification code sent to email: ' . $email;
    } catch (Exception $e) {
        echo "Verification code could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Email does not exist in database, show error message
    echo 'Email does not exist in database.';
}

// Close database connection
$conn->close();
?>


how to generate pdf of the user provided information in the form using php


how to send the generated pdf to the email provided in the form



<?php

// Include the necessary libraries
require('fpdf/fpdf.php');
require('PHPMailer/PHPMailerAutoload.php');

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$location = $_POST['location'];
$vehicle_number = $_POST['vehicle_number'];
$license_number = $_POST['license_number'];
$category = $_POST['category'];
$police_name = $_POST['police_name'];

// Create a new PDF instance
$pdf = new FPDF();

// Add a page to the PDF
$pdf->AddPage();

// Set the font for the document
$pdf->SetFont('Arial', 'B', 16);

// Add the title to the document
$pdf->Cell(0, 10, 'Vehicle Registration Form', 0, 1, 'C');

// Set the font for the document
$pdf->SetFont('Arial', '', 12);

// Add the form data to the document
$pdf->Cell(0, 10, 'Name: ' . $name, 0, 1);
$pdf->Cell(0, 10, 'Email: ' . $email, 0, 1);
$pdf->Cell(0, 10, 'Date: ' . $date, 0, 1);
$pdf->Cell(0, 10, 'Location: ' . $location, 0, 1);
$pdf->Cell(0, 10, 'Vehicle Number: ' . $vehicle_number, 0, 1);
$pdf->Cell(0, 10, 'License Number: ' . $license_number, 0, 1);
$pdf->Cell(0, 10, 'Category: ' . $category, 0, 1);
$pdf->Cell(0, 10, 'Police Name: ' . $police_name, 0, 1);

// Output the PDF
$pdf_data = $pdf->Output('S');

// Create a new PHPMailer instance
$mail = new PHPMailer;

// Set the email parameters
$mail->setFrom('you@example.com', 'Your Name');
$mail->addAddress($email);
$mail->addAttachment($pdf_data, 'vehicle-registration-form.pdf');

// Set the email content
$mail->Subject = 'Vehicle Registration Form';
$mail->Body = 'Please find attached the vehicle registration form submitted by ' . $name . '.';
$mail->AltBody = 'Please find attached the vehicle registration form submitted by ' . $name . '.';

// Send the email
if (!$mail->send()) {
    echo 'Error: ' . $mail->ErrorInfo;
} else {
    echo 'Email sent!';
}

?>
