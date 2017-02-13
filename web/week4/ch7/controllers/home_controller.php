<?php

class HomeController {
  public function index() {
    $cars = Car::all();
    require_once('views/header.php');
    require_once('views/home_view.php');
    require_once('views/footer.php');
  }

  public function error() {
    require_once('views/header.php');
    require_once('views/error.php');
    require_once('views/footer.php');
  }
}
