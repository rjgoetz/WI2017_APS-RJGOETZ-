<?php

class SearchController {
  public function index() {

    $jobs = Job::find($_GET['search'], $_GET['sort'], $_GET['order'], $_GET['page']);

    // render views
    require_once('views/search.php');
  }
}
