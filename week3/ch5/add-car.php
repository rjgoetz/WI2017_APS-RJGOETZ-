<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Top Cars</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <header>
          <h1><a href="index.php">Top Cars</a></h1>

          <?php
            require_once '_includes/vars.php';

            $submitted = isset($_POST['submit']);

            if ($submitted) {
              $name = $_POST['name'];
              $car = $_POST['car'];
              $vote = $_POST['vote'];
              $image_name = $_FILES['image']['name'];
              $image_target = GW_UPLOADPATH . $image_name;

              if (!empty($name) && !empty($car) && !empty($_FILES['image']['size'])) {
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                $add_car_query = "INSERT INTO car_table (date, name, car, image, votes) VALUES (now(), '$name', '$car', '$image_name', '$vote')";

                mysqli_query($dbc, $add_car_query) or die('Add car failed.');

                $fetch_date_query = "SELECT * FROM car_table ORDER BY id DESC LIMIT 1";

                $date = mysqli_query($dbc, $fetch_date_query) or die('Fetch date failed.');

                // move image to img folder
                move_uploaded_file($_FILES['image']['tmp_name'], $image_target);

                mysqli_close($dbc);
          ?>

          <p class="lead">Thanks for adding your Top Car!</p>
        </header>
      </div>
    </div>

    <section>
      <div class="row">
        <div class="col-xs-12">
          <img src="<?php echo $image_target; ?>" alt="<?php echo $image_name; ?>" class="img-responsive">
        </div>
        <div class="col-xs-12">
          <p class="lead"><b><?php echo $car; ?></b></p>
          <p><b>Submitted By:</b> <?php echo $name; ?></p>
          <p><b>Date:</b>
            <?php
              while ($row = mysqli_fetch_array($date)) {
                echo $row['date'];
              }
            ?>
          </p>

          <p class="margin-top"><a href="index.php" class="btn btn-primary"><< Back to Top Cars</a></p>
        </div>
      </div>
    </section>

      <?php
        } else { // if input fields are empty
      ?>
          <p class="lead">Add a car to the Top Cars list.</p>
        </header>
      </div>
    </div>
      <?php
            echo '<p class="lead text-danger">Please complete all of the fields.</p>';
            include '_includes/car-form.php';
          }
        } else { // if form is not submitted yet
      ?>
          <p class="lead">Add a car to the Top Cars list.</p>
        </header>
      </div>
    </div>
    <?php
        include '_includes/car-form.php';
      }
    ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
