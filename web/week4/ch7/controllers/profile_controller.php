<?php

class ProfileController {
  public function index() {

    $car = Car::find($_GET['id']);

    require_once('views/header.php');
    require_once('views/profile_view.php');
    require_once('views/footer.php');
  }
}
