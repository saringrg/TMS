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
                    $query = "SELECT * FROM echit WHERE id = '$id'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);

                    // Display the form with the retrieved data
                    if ($row) {
                      echo "<form method='post' action='update_echit.php'>
                              <input type='hidden' name='id' value='" . $row["id"] . "'>
                              <div class='form-group'>
                                <label for='name'>Full Name</label>
                                <input type='text' class='form-control' id='name' name='name' value='" . $row["name"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='email'>Email</label>
                                <input type='email' class='form-control' id='email' name='email' value='" . $row["email"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='date'>Date</label>
                                <input type='text' class='form-control' id='date' name='date' value='" . $row["date"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='license_number'>License Number</label>
                                <input type='text' class='form-control' id='license_number' name='license_number' value='" . $row["license_number"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='fine_box'>Fine Box</label>
                                <input type='text' class='form-control' id='fine_box' name='fine_box' value='" . $row["fine_box"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='traffic_station'>Traffic Station</label>
                                <input type='text' class='form-control' id='traffic_station' name='traffic_station' value='" . $row["traffic_station"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='chit_number'>Chit Number</label>
                                <input type='text' class='form-control' id='chit_number' name='chit_number' value='" . $row["chit_number"] . "' required>
                              </div>
                              <div class='form-group'>
                                <label for='payment'>Payment</label>
                                <input type='text' class='form-control' id='payment' name='payment' value='" . $row["payment"] . "' required>
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