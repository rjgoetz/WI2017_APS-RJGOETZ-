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
          <p class="lead">Admin Page</p>
        </header>
      </div>
    </div>

    <section>
      <?php
        require_once '_includes/vars.php';

        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Problem connecting to DB');

        $submitted = isset($_POST['submit']);
        $car = $_GET['car'];
        $image = $_GET['image'];
        $id = $_GET['id'];

        $delete_car = "DELETE FROM car_table WHERE id=" . $_POST['id'] . " LIMIT 1";

        if ($submitted) {
          mysqli_query($dbc, $delete_car) or die('Problem with query!');

          echo '<p class="lead">The car "' . $_POST['car'] . '" has been removed.</p>';
          echo '<a href="admin.php"><< Back to Admin Console</a>';

          @unlink(GW_UPLOADPATH . $_POST['image']);

          mysqli_close($dbc);
        } else {
      ?>
      <h3 class="margin-bottom">Are you sure you want to delete this car?</h3>
      <div class="row">
        <div class="col-xs-4">
          <div class="thumbnail">
            <img src="<?php echo GW_UPLOADPATH . $image; ?>" alt="<?php echo $image; ?>">
            <div class="caption">
              <p><b>Name: </b><?php echo $_GET['name']; ?></p>
              <p><b>Date: </b><?php echo $_GET['date']; ?></b></p>
              <p><b>Votes: </b><?php echo $_GET['votes']; ?></p>

              <form action="remove-car.php" method="post" role="form">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="image" value="<?php echo $image; ?>">
                <input type="hidden" name="car" value="<?php echo $car; ?>">
                <button type="submit" class="btn btn-danger" name="submit">Remove</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <?php
        }
      ?>
    </section>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
