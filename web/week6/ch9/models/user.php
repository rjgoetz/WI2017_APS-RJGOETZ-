<?php

class User {

  // initialize properties
  public $userid;
  public $first_name;
  public $last_name;
  public $email;
  public $phone;
  public $desired_job;
  public $resume;

  public function __construct($userid, $first_name, $last_name, $email, $phone, $desired_job, $resume) {
    $this->userid = $userid;
    $this->first_name = $first_name;
    $this->last_name = $last_name;
    $this->email = $email;
    $this->phone = $phone;
    $this->desired_job = $desired_job;
    $this->resume = $resume;
  }

  public function create($first_name, $last_name, $email, $phone, $desired_job, $resume) {
    require('../../includes/connection.php');

    $query = "INSERT INTO developer_jobs_users (first_name, last_name, email, phone, desired_job, resume) VALUES ('$first_name', '$last_name', '$email', '$phone', '$desired_job', '$resume')";

    mysqli_query($dbc, $query) or die('<p>Users failed to be added to database.</p>');

    mysqli_close($dbc);
  }
}
