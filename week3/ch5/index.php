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
          <p class="lead">Welcome car enthusiasts!</p>
          <p>Check out this Top Cars List. If your car didn't make the list <a href="add-car.php">add it here >></a></p>
        </header>
      </div>
    </div>

    <section>
      <div class="row">
        <?php
          require_once '_includes/vars.php';

          $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

          $count = 0;
          $top_ten = 0;
          $car_id = $_POST['id'];
          $new_vote = $_POST['vote'];
          $update_vote = "UPDATE car_table SET votes=$new_vote WHERE id=$car_id";

          if (!empty($car_id) && !empty($new_vote)) {
            mysqli_query($dbc, $update_vote) or die('Vote update failed.');
          }

          $get_cars = "SELECT * FROM car_table WHERE approved=1 ORDER BY votes DESC, date ASC";

          $data = mysqli_query($dbc, $get_cars) or die('Query cars failed.');

          mysqli_close($dbc);

          while ($row = mysqli_fetch_array($data)) {
            $count++;
            $top_ten++;
        ?>
          <div class="col-xs-12 col-sm-6">
            <div class="thumbnail relative">
              <?php
                if ($top_ten < 11) {
                  echo '<p class="lead top-ten">' . $top_ten . '</p>';
                }
              ?>
              <img class="img-responsive" src="<? echo GW_UPLOADPATH . $row['image']; ?>" alt="<?php $row['image']; ?>" class="img-responsive">
              <div class="caption">
                <p class="lead"><? echo $row['car']; ?></p>
                <p><b>Votes: </b><?php echo $row['votes']; ?><br>
                <b>Submitted By: </b><? echo $row['name']; ?><br>
                <b>Date: </b><?php echo $row['date']; ?></p>

                <div class="votes clearfix">
                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="vote" value="<?php echo $row['votes'] + 1; ?>">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                  </form>

                  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="hidden" name="vote" value="<?php echo $row['votes'] == 1 ? 1 : $row['votes'] - 1; ?>">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php
            if ($count % 2 == 0) {
              echo '<div class="clearfix visible-sm-block"></div>';
            }
          }
        ?>
      </div>
    </section>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
