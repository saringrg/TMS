<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>traffic details</title>
    <style>
        .delete-btn, .update-btn {
  color: white;
  border: none;
  padding: 5px 10px;
  margin-right: 10px;
  border-radius: 3px;
  cursor: pointer;
}

.delete-btn{
    background-color: red;
}

.update-btn{
    background-color: green;
}

.delete-btn:hover{
  background-color: darkred;
}

.update-btn:hover{
  background-color: darkgreen;
}

td form {
  display: inline-block;
}

    </style>
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
            <a href="complain.php">
                    <li><img src="img/complain.jpg" style="height:40px; width:40px" alt="">&nbsp;<span>Complain</span> </li>
                </a>
            <a href="login.html">
                <li><img src="img/log.jpg" style="height:40px; width:40px" alt="">&nbsp;<span>Logout</span> </li>
            </a>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
            </div>
        </div>g

        <div class="content-2">
            <div class="recent-payments">
                <div class="title">
                    <h2>Traffic Details</h2>
                    <a href="signup.html" class="btn1">Add Traffic</a>
                </div>
      <table>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Batch Number</th>
        <th>Action</th>
      </tr>
      <?php
        // Connect to MySQL database
        $conn = mysqli_connect("localhost", "root", "", "tms");
        
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }
        
        // Retrieve data from the "traffic" table
        $sql = "SELECT * FROM traffic";
        $result = mysqli_query($conn, $sql);
        
        // Display data in the table
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            // echo "<tr><td>" . $row["id"] . "</td><td>" . $row["fullname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td><td>" . $row["batchnumber"] . "</td></tr>";
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["fullname"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["password"] . "</td>
                    <td>" . $row["batchnumber"] . "</td>
                    <td>
                  <form method='post' action='edit_traffic.php'>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <input type='submit' name='update' value='Edit' class='update-btn'>
                  </form>
                  
                  <form method='post' action='del_traffic.php'>
                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                    <input type='submit' name='delete' value='Delete' class='delete-btn'>
                  </form>
                    </td>
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