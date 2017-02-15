<?php
  require_once('../../includes/env.php');
  require_once('_includes/authorization.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Top Cars</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $path; ?>/global.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="projects-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <p><a href="<?php echo $path; ?>/"><< Advanced Projects Studio</a></p>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <header>
            <h1><a href="index.php">Top Cars</a></h1>
            <p class="lead">Admin Page</p>
          </header>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <h3 class="margin-bottom">Cars Users List</h3>
          <?php
            require '_includes/vars.php';
            require '../../includes/connection.php';
            $counter = 0;

            // get cars from database
            $get_cars = "SELECT * FROM top_cars";
            $data = mysqli_query($dbc, $get_cars);

            mysqli_close($dbc);
          ?>

          <div class="row">
            <?php
              while ($row = mysqli_fetch_array($data)) {
                $counter++;
            ?>

              <div class="col-xs-12 col-sm-4">
                <div class="thumbnail">
                  <img src="<?php echo GW_UPLOADPATH . $row['image']; ?>" alt="<?php echo $row['image']; ?>" class="img-responsive">
                  <div class="caption">
                    <p><b>Name: </b><?php echo $row['name']; ?></p>
                    <p><b>Date: </b><?php echo $row['date']; ?></b></p>
                    <p><b>Votes: </b><?php echo $row['votes']; ?></p>
                    <a href="<?php echo 'remove-car.php?id=' . $row['id'] . '&amp;name=' . $row['name'] . '&amp;car=' . $row['car'] . '&amp;date=' . $row['date'] . '&amp;votes=' . $row['votes'] . '&amp;image=' . $row['image']; ?>" type="submit" class="btn btn-default">Remove</a>
                    <?php
                      if ($row['approved'] == 0) {
                        echo "<a href=\"approve-car.php?id=" . $row['id'] . "&amp;name=" . $row['name'] . "&amp;car=" . $row['car'] . "&amp;date=" . $row['date'] . "&amp;votes=" . $row['votes'] . "&amp;image=" . $row['image'] . "\" type=\"submit\" class=\"btn btn-danger\">Approve</a>";
                      }
                    ?>
                  </div>
                </div>
              </div>

            <?php
                if ($counter % 3 == 0) {
                  echo '<div class="clearfix visible-sm-block"></div>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <p><a href="index.php"><< Back to Top Cars</a></p>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
