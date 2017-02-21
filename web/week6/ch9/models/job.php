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
  public $pages;

  // construct object
  public function __construct($id, $title, $description, $city, $state, $zip, $company, $date, $pages) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->city = $city;
    $this->state = $state;
    $this->zip = $zip;
    $this->company = $company;
    $this->date = $date;
    $this->pages = $pages;
  }

  // find jobs that match search terms
  public static function find($search, $sort, $order, $page) {
    require('../../includes/connection.php');

    // table columns to search
    $columns = ['title', 'description'];

    // sanitize search string
    $search = str_replace(',', ' ', $search);
    $search_terms = explode(' ', $search);
    $final_terms = array();

    if (count($search_terms) > 0) {
      foreach ($search_terms as $term) {
        if (!empty($term)) {
          $final_terms[] = $term;
        }
      }
    }

    // build query
    $search_query = "SELECT * FROM developer_jobs";
    $where_list = array();

    foreach ($columns as $key=>$column) {
      foreach($final_terms as $term) {
        $where_list[] = "$column LIKE '%$term%'";
      }
    }

    $where_clause = implode(' OR ', $where_list);

    if(!empty($where_clause)) {
      $search_query .= " WHERE $where_clause";
    }

    if(!empty($sort) && !empty($order)) {
      $search_query .= " ORDER BY $sort";
      if ($order == 2) {
        $search_query .= " DESC";
      }
    }

    $data = mysqli_query($dbc, $search_query) or die('<p>Search for number of results failed.</p>');

    $limit = 3;
    $pages = ceil(mysqli_num_rows($data))/$limit;

    $page_interval = intval($page) * $limit - $limit;
    $search_query .= " LIMIT $page_interval, $limit";

    $data = mysqli_query($dbc, $search_query) or die('<p>Search database failed.</p>');
    $jobs = [];

    if (mysqli_num_rows($data) == 0) {

      mysqli_close($dbc);
      return false;

    } else {

      while($row = mysqli_fetch_array($data)) {
        $jobs[] = new Job($row['job_id'], $row['title'], substr($row['description'], 0, 500) . '...', $row['city'], $row['state'], $row['zip'], $row['company'], $row['date_posted'], $pages);
      }

      mysqli_close($dbc);
      return $jobs;
    }


  }
}
