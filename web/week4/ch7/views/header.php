<?php require_once('../../includes/env.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car Swap!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $path; ?>/global.css">
  <link rel="stylesheet" href="<?php echo $path; ?>/week4/ch7/public/css/style.css">
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

  <main>
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
                    if (isset($_SESSION['name'])) {
                      echo 'Hello, ' . $_SESSION['name'];
                    } else {
                      echo 'Hello, Guest';
                    }
                    ?>
                  </li>
                  <li>
                    <?php
                    if (isset($_SESSION['name'])) {
                      echo '<a href="index.php?controller=profile&action=index&id=' . $_SESSION['user_id'] . '">My Profile</a>';
                    }
                    ?>
                  </li>
                  <li>
                    <?php
                    if (isset($_SESSION['name'])) {
                      echo '<a href="index.php?controller=survey&action=index&id=' . $_SESSION['user_id'] . '">Survey</a>';
                    }
                    ?>
                  </li>
                  <?php
                  if (isset($_SESSION['name'])) {
                    echo '<a class="btn btn-default navbar-btn"';
                    echo 'href="' . $_SERVER['PHP_SELF'] . '?controller=login&action=logout">Log Out</a>';
                  } else {
                    echo '<a class="btn btn-default navbar-btn"';
                    echo 'href="' . $_SERVER['PHP_SELF'] . '?controller=login&action=index">Log In</a>';
                  }
                  ?>
                </ul>
              </div>
            </nav>
          </header>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
