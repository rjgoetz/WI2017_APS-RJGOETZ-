<?php

class SearchController {
  public function index() {

    $jobs = Job::find($_POST['search']);

    // render views
    require_once('views/search.php');
  }
}
