<?php

class Job {

  // define attributes
  public $id;
  public $title;
  public $description;
  public $city;
  public $state;
  public $zip;
  public $company;
  public $date;

  // construct object
  public function __construct($id, $title, $description, $city, $state, $zip, $company, $date) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->city = $city;
    $this->state = $state;
    $this->zip = $zip;
    $this->company = $company;
    $this->date = $date;
  }

  // find jobs that match search terms
  public static function find($search) {
    require('../../includes/connection.php');

    $query = "SELECT * FROM developer_jobs WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
    $data = mysqli_query($dbc, $query) or die('Search database failed.');
    $jobs = [];

    if (mysqli_num_rows($data) == 0) {
      return false;
    } else {
      while($row = mysqli_fetch_array($data)) {
        $jobs[] = new Job($row['job_id'], $row['title'], $row['description'], $row['city'], $row['state'], $row['zip'], $row['company'], $row['date_posted']);
      }

      return $jobs;
    }


  }
}
