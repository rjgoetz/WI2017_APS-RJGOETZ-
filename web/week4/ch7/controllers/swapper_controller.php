<?php

class CarController {
  public function car() {
    if (!isset($_GET['id'])) {
      return call('home', 'error');
    }

    $car = Car::find($_GET['id']);
    require_once('views/header.php');
    require_once('views/car_view.php');
    require_once('views/footer.php');
  }
}
