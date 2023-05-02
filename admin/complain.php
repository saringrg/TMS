<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>traffic details</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <img src="img/logo.jpg" class="rounded-circle" alt="logo" style="height:65px; border-radius: 50px;">&nbsp;
            <h1 class="tm">TMS</h1>
        </div><br>

        <ul>
                <a href="index.php">
                <li> <img src="img/dashboard1.jpg" style="height:35px; width:40px" alt="">&nbsp; <span>Dashboard</span> </li>
                </a>
                <a href="user.php">
                    <li><img src="img/user0.png" style="height:45px"alt="">&nbsp;<span>User</span> </li>
                </a>
                <a href="traffic2.php">
                    <li><img src="img/traffic2.jpg"style="height:40px; width:40px" alt="">&nbsp;<span>Traffic</span> </li>
                </a>
                <a href="echit.php">
                    <li><img src="img/table0.png" style="height:40px; width:40px" alt="">&nbsp;<span>E-chit</span> </li>
                </a>
                <a href="complain.html">
                    <li><img src="img/complain.jpg" style="height:40px; width:40px" alt="">&nbsp;<span>Complain</span> </li>
                </a>
                <a href="login.html">
                    <li><img src="img/log.jpg" style="height:40px; width:40px" alt="">&nbsp;<span>Logout</span> </li>
                </a>
            </ul>
    </div>

    <div class="container">
        <div class="header">
            <div class="nav">
            </div>
        </div>

        <div class="content-2">
            <div class="recent-payments">
                <div class="title">
                    <h2>Complain Box</h2>
                </div>
                <table>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                      </tr>
                      <?php
                        // Connect to MySQL database
                        $conn = mysqli_connect("localhost", "root", "", "tms");
                        
                        // Check connection
                        if (!$conn) {
                          die("Connection failed: " . mysqli_connect_error());
                        }
                        
                        // Retrieve data from the "traffic" table
                        $sql = "SELECT * FROM complain";
                        $result = mysqli_query($conn, $sql);
                        
                        // Display data in the table
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                              // echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fullname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td><td>" . $row["batchnumber"] . "</td></tr>";
                              echo "<tr>
                                      <td>" . $row["id"] . "</td>
                                      <td>" . $row["name"] . "</td>
                                      <td>" . $row["email"] . "</td>
                                      <td>" . $row["subject"] . "</td>
                                      <td>" . $row["message"] . "</td>
                                    </tr>";
                  
                            }
                          } else {
                            echo "<tr><td colspan='5'>No traffic data available</td></tr>";
                          }
                        
                        // Close MySQL database connection
                        mysqli_close($conn);
                      ?>
                    </table>
                            </div>
                        </div>
                    </div>
                
                </body>
                </html>