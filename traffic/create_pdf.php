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

