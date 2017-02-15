<?php

class HomeController {
  public function index() {
    $cars = Car::all();
    require_once('views/header.php');

    if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];

      if ($msg === 'login') {
        echo '<p id="disappear" class="alert alert-success">You successfully logged in ' . $_COOKIE['name'] . '!</p>';
      }
    }

    require_once('views/home_view.php');
    require_once('views/footer.php');
  }

  public function error() {
    require_once('views/header.php');
    require_once('views/error.php');
    require_once('views/footer.php');
  }
}
