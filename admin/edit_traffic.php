<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Edit</title>
    <style>
      body {
      background-image: url("https://trbahadurpur.com/wp-content/uploads/2021/01/background-5.jpg");
    }
    </style>
  </head>
  <body>
    <br> 
    <div class="container mb-4">
      <div class="row float-left">
        <img src="logo.jpg" style="width:100px; object-fit: fill; border-radius: 100px;" alt="No Image">
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="card" style="border-radius: 10px;">
            <div class="card-body">
              <h2 class="card-title text-center mb-4">Edit</h2>
                <?php
                  // Check if the ID is set
                  if (isset($_POST['id'])) {
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "root", "", "tms");

                    // Retrieve data for the specific row
                    $id = mysqli_real_escape_string($conn, $_POST['id']);
                    $query = "SELECT * FROM traffic WHERE id = '$id'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);

                    // Display the form with the retrieved data
                    if ($row) {
                      echo "<form method='post' action='update_traffic.php'>
                              <input type='hidden' name='id' value='" . $row["id"] . "'>
                              <div class='form-group'>
                                <label for='fullname'>Full Name</label>
                                <input type='text' class='form-control' id='fullname' name='fullname' value='" . $row["fullname"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='email'>Email</label>
                                <input type='email' class='form-control' id='email' name='email' value='" . $row["email"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='password'>Password</label>
                                <input type='password' class='form-control' id='password' name='password' value='" . $row["password"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='batchnumber'>Batch Number</label>
                                <input type='text' class='form-control' id='batchnumber' name='batchnumber' value='" . $row["batchnumber"] . "' required>
                              </div>
                              <button type='submit' name='submit' class='btn btn-primary'>Update</button>
                            </form>";
                    } else {
                        echo 'ID not found';
                        }
                        } else {
                        echo 'ID not set';
                        }
                        ?>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </body>
</html>