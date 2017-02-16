<?php

class Survey {

  // define public attributes
  public $response_id;
  public $topic_name;
  public $topic_category;
  public $response;

  public function __construct($response_id, $topic_name, $topic_category, $response) {
    $this->response_id = $response_id;
    $this->user_id = $topic_name;
    $this->topic_id = $topic_category;
    $this->response = $response;
  }

  // initialize form with empty responses
  public static function initialize() {
    require('../../includes/connection.php');

    // check user is logged in alaredy
    if (isset($_SESSION['user_id'])) {
      $query = "SELECT * FROM carswap_response WHERE user_id='" . $_SESSION['user_id'] . "'";
      $data = mysqli_query($dbc, $query);

      // check form data isn't initialized
      if (mysqli_num_rows($data) == 0) {

        // grab topics from topic table
        $query = "SELECT * FROM carswap_topic ORDER BY category, topic_id";
        $data = mysqli_query($dbc, $query) or die('Topics not found.');

        // create array of topics
        $topicIDs = array();
        while ($row = mysqli_fetch_array($data)) {
          array_push($topicIDs, $row['topic_id']);
        }

        // insert topics into response table with blank data
        foreach ($topicIDs as $topic) {
          $query = "INSERT INTO carswap_response (user_id, topic_id) VALUES (" . $_SESSION['user_id'] . ", $topic)";
          mysqli_query($dbc, $query) or die('Questionaire init failed.');
        }

        mysqli_close($dbc);

      }
    }
  } // end initialize()

  public static function all() {
    require('../../includes/connection.php');

    // get a list of responses from user
    $query = "SELECT * FROM carswap_response WHERE user_id='" . $_SESSION['user_id'] . "'";

    $data = mysqli_query($dbc, $query) or die('No responses found in database.');

    // build survey question objects
    $list = [];

    while ($row = mysqli_fetch_array($data)) {
      $query = "SELECT * FROM carswap_topic WHERE topic_id=" . $row['topic_id'] . "'";
      $data2 = mysqli_query($dbc, $query);
      $list[] = new Survey($row['response_id'], $data2['topic_name'], $data2['topic_category'], $row['response']);
    }

    return $list;
  }


  // update response data
  public static function respond() {
    require('../../includes/connection.php');






  }


}
