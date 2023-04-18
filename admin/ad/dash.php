<!DOCTYPE html>
<html>
  <head>
    <title>Traffic Table Example</title>
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }
      th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid black;
      }
      th {
        background-color: #ddd;
      }
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
    </style>
  </head>
  <body>
  <button onclick="window.location.href='signup.html'">Sign Up</button>

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
                      <form method='post' action='delete.php'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <input type='submit' name='delete' value='Delete'>
                      </form>
                      <form method='post' action='update.php'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <input type='submit' name='update' value='Update'>
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
  </body>
</html>

