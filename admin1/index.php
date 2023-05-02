<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title >Admin</title>
    <link rel="icon" type="image/x-icon" href="img/">
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <a href="index.php">
            <img src="img/logo.jpg" class="rounded-circle" alt="logo" style="height:65px; border-radius: 50px;">&nbsp;
            </a>
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

        <div class="content">
           <div class="heads" style="padding:20px; text-color:red"><h1>Dashboard</h1></div> 
            <div class="cards">
                <a href="user.html">
                    <div class="card">
                        <div class="box">
                            <h1>
                                <?php
                                // Replace the database credentials with your own
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "tms";
                
                                // Create a connection to the database
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                
                                // Check if the connection was successful
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                
                                // Create a SQL query to count the number of records in a table
                                $sql = "SELECT COUNT(*) as count FROM user";
                
                                // Execute the query
                                $result = mysqli_query($conn, $sql);
                
                                // Get the count of the records
                                $count = mysqli_fetch_assoc($result)['count'];
                
                                // Print the count within the h1 tag
                                echo $count;
                
                                // Close the database connection
                                mysqli_close($conn);
                                ?>
                            </h1>
                            <h3>User</h3>
                        </div>
                        <div class="icon-case">
                            <img src="img/user1.png" style="height:70px; width:70px" alt="">
                        </div>
                    </div>
                </a>

                <a href="traffic2.html">
                <div class="card">
                    <div class="box">
                        <h1>
                        <?php
                                // Replace the database credentials with your own
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "tms";
                
                                // Create a connection to the database
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                
                                // Check if the connection was successful
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                
                                // Create a SQL query to count the number of records in a table
                                $sql = "SELECT COUNT(*) as count FROM traffic";
                
                                // Execute the query
                                $result = mysqli_query($conn, $sql);
                
                                // Get the count of the records
                                $count = mysqli_fetch_assoc($result)['count'];
                
                                // Print the count within the h1 tag
                                echo $count;
                
                                // Close the database connection
                                mysqli_close($conn);
                                ?>
                        </h1>
                        <h3>Traffic</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/traffic1.png" style="height:90px; width:90px" alt="">
                    </div>
                </div>
            </a>

            <a href="chit.html">
                <div class="card">
                    <div class="box">
                        <h1>
                        <?php
                                // Replace the database credentials with your own
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "tms";
                
                                // Create a connection to the database
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                
                                // Check if the connection was successful
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
                
                                // Create a SQL query to count the number of records in a table
                                $sql = "SELECT COUNT(*) as count FROM echit";
                
                                // Execute the query
                                $result = mysqli_query($conn, $sql);
                
                                // Get the count of the records
                                $count = mysqli_fetch_assoc($result)['count'];
                
                                // Print the count within the h1 tag
                                echo $count;
                
                                // Close the database connection
                                mysqli_close($conn);
                                ?>
                        </h1>
                        <h3>E-chit details</h3>
                    </div>
                    <div class="icon-case">
                        <img src="img/table2.png" style="height:70px; width:70px" alt="">
                    </div>
                </div></a>

            </div>

            <!--
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>School</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>  -->



            <!--
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>option</th>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="info.png" alt=""></td>
                        </tr>
                    </table>
                </div>
                -->
        </div>
    </div>
    </div>
</body>

</html>