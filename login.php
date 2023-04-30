<?php
    session_start(); // add session_start() here

    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $con = new mysqli('localhost','root','','tms');
    if($con->connect_error){
        die("Connection Failed : ".$con->connect_error);
    } else {
        // Check signup table
        $stmt = $con->prepare("select * from user where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        // Check traffic table
        $stmt2 = $con->prepare("select * from traffic where email = ?");
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        $stmt2_result = $stmt2->get_result();

        // Check admin table
        $stmt3 = $con->prepare("select * from admin where email = ?");
        $stmt3->bind_param("s", $email);
        $stmt3->execute();
        $stmt3_result = $stmt3->get_result();

        // Check all results
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<script>alert('Login Successful'); window.location.href='user/userdash.html';</script>";
            } else{
                echo "<script>alert('Invalid Email or password'); window.location.href='login.html';</script>";
            }
        }elseif ($stmt2_result->num_rows > 0) {
            $data = $stmt2_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<script>alert('Login Successful'); window.location.href='traffic/trafficdash.html';</script>";
            } else{
                echo "<script>alert('Invalid Email or password'); window.location.href='login.html';</script>";
            }
        }elseif ($stmt3_result->num_rows > 0) {
            $data = $stmt3_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<script>alert('Login Successful'); window.location.href='admin';</script>";
            } else{
                echo "<script>alert('Invalid Email or password'); window.location.href='login.html';</script>";
            }
        }else{
            echo "<script>alert('Invalid Email or password'); window.location.href='login.html';</script>";
        }
    }
?>
