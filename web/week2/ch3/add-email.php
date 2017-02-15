<?php require_once('../../includes/env.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Audi Connect Newsletter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
          <nav>
            <ul class="nav nav-pills">
              <li role="presentation" class="active"><a href="index.html">Home</a></li>
              <li role="presentation"><a href="send-email.php">Send Email</a></li>
              <li role="presentation"><a href="remove-email.php">Unsubscribe</a></li>
            </ul>
          </nav>
        </div>

        <div class="col-xs-12 col-md-6">
          <img src="audi-s4.jpg" alt="Audi S4" class="img-responsive">
        </div>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
          <h1><i>Audi Connect</i></h1>
          <?php
            require_once('../../includes/connection.php');

            // form values
            $first_name = $_POST['firstname'];
            $last_name = $_POST['lastname'];
            $email = $_POST['email'];

            $query = "INSERT INTO audi_connect (first_name, last_name, email) VALUES('$first_name', '$last_name', '$email')";

            mysqli_query($dbc, $query) or die('Error querying database');

            echo '<p class="lead">Welcome ' . $first_name . ' ' . $last_name . ', you have been added to the Audi Connect newsletter successfully!</p>';

            mysqli_close($dbc);
          ?>
        </div>
      </div>
    </div>
  </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
