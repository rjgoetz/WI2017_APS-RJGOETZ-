<?php

class SurveyController {

  public function index() {

    if (isset($_POST['submit'])) {
      Survey::update();
    }

    $survey = Survey::all();
    require_once('views/header.php');
    require_once('views/survey_view.php');
    require_once('views/footer.php');

  }

}
