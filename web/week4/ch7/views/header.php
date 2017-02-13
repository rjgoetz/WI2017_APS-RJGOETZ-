<?php
  require_once('../../includes/env.php');
?>

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
                <li class="navbar-text">
                  <?php
                  if ($_COOKIE['name']) {
                    echo $_COOKIE['name'];
                  } else {
                    echo 'Hello, Guest';
                  }
                  ?>
                </li>
                <a class="btn btn-default navbar-btn" href="

                <?php
                if ($_COOKIE['name']) {
                  echo $_SERVER['PHP_SELF'] . '?controller=login&action=logout">Log Out';
                } else {
                  echo $_SERVER['PHP_SELF'] . '?controller=login&action=index">Log In';
                }
                ?>

                </a>
              </ul>
            </div>
          </nav>
        </header>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
