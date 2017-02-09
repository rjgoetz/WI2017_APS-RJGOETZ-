<?php

class HomeController {
  public function index() {
    $cars = Car::all();
    require_once('views/home_view.php');
  }

  public function error() {
    require_once('views/error.php');
  }
}
