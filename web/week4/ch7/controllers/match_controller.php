<?php

class MatchController {

  public function index() {
    $my_match = Survey::match();

    $car = Car::find($my_match[0]['user_id']);

    require_once('views/header.php');
    require_once('views/match_view.php');
    require_once('views/footer.php');
  }

}
