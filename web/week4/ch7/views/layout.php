<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car Swap!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $path; ?>/week4/ch7/public/css/style.css">
</head>
<body>

  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <header>
          <nav class="navbar navbar-default">
            <div class="container-fluid">
              <div class="navbar-header">
                <a href="<? echo $path; ?>/week4/ch7" class="navbar-brand text-primary">Car Swap!</a>
              </div>
              <ul class="nav navbar-nav pull-right">
                <li class="navbar-text">Hello, Guest</li>
                <a class="btn btn-default navbar-btn" href="<?php echo $_SERVER['PHP_SELF'] . '?controller=login&action=index'; ?>">Log In</a>
              </ul>
            </div>
          </nav>
        </header>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">

        <?php require_once('routes/routes.php'); ?>

      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <footer>
          <p class="pull-right">&copy; 2017 Car Swap!</p>
        </footer>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
