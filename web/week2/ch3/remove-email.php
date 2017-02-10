<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Unsubscribe | Audi Connect Newsletter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <nav>
          <ul class="nav nav-pills">
            <li role="presentation"><a href="index.html">Home</a></li>
            <li role="presentation"><a href="send-email.php">Send Email</a></li>
            <li role="presentation" class="active"><a href="remove-email.php">Unsubscribe</a></li>
          </ul>
        </nav>
      </div>

      <div class="col-xs-12 col-md-6">
        <img src="audi-s4.jpg" alt="Audi S4" class="img-responsive">
      </div>

      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-0">
        <h1><i>Unsubscribe</i></h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" method="post">
        <?php
          $dbc = mysqli_connect('localhost', 'root', 'root', 'audi_connect') or die('Error connecting to database');

          if (isset($_POST['submit'])) {
            foreach ($_POST['todelete'] as $delete_id) {
              $query = "DELETE FROM email_list WHERE id=$delete_id";
              mysqli_query($dbc, $query) or die('Error querying database');
            }

            echo '<p class="lead text-success"><em>Subscriber successfully removed.</em></p>';
          }

          $query = "SELECT * FROM email_list";
          $result = mysqli_query($dbc, $query);

          while ($row = mysqli_fetch_array($result)) {
        ?>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="<?php echo $row['id']; ?>" name="todelete[]"><?php echo $row['first_name'] . ' ' . $row['last_name'] . ', ' . $row['email']; ?>
            </label>
          </div>
        <?php
          }

          mysqli_close($dbc);

        ?>
          <button class="pull-right btn btn-primary" name="submit" type="submit">Remove :(</button>

        </form>

      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
