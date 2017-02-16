<?php

class SurveyController {

  public function index() {
    $survey = Survey::all();
    require_once('views/header.php');
    require_once('views/survey_view.php');
    require_once('views/footer.php');
  }

}
