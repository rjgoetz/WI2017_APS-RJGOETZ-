<?php

class Survey {

  // define public attributes
  public $response_id;
  public $topic_name;
  public $category_name;
  public $response;

  public function __construct($response_id, $topic_name, $category_name, $response) {
    $this->response_id = $response_id;
    $this->topic_name = $topic_name;
    $this->category_name = $category_name;
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
        $query = "SELECT * FROM carswap_topic ORDER BY category_id, topic_id";
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

    // query database for list of responses from user
    $query = "SELECT cr.response_id, cr.response, ct.name AS topic_name, cc.name AS category_name FROM carswap_response AS cr INNER JOIN carswap_topic AS ct USING (topic_id) INNER JOIN carswap_category AS cc USING (category_id) WHERE user_id='" . $_SESSION['user_id'] . "'";

    $data = mysqli_query($dbc, $query) or die('No responses found in database.');

    $responses = [];

    while ($row = mysqli_fetch_array($data)) {
      $responses[] = new Survey($row['response_id'], $row['topic_name'], $row['category_name'], $row['response']);
    }

    mysqli_close($dbc);

    return $responses;
  }


  // update response data
  public static function update() {
    require('../../includes/connection.php');

    // loop through $_POST global and update database
    foreach ($_POST as $key=>$value) {
      $query = "UPDATE carswap_response SET response='$value' WHERE response_id='$key'";
      mysqli_query($dbc, $query) or die('Update responses failed.');
    }

    mysqli_close($dbc);
  }

  // find best match
  public static function match() {
    require('../../includes/connection.php');

    // initialize variables
    $user_responses = array();
    $user_score = 0;
    $car_swappers = array();
    $match_array = array();
    $my_match = array();

    // 1. get logged-in user's responses from database

    $query = "SELECT cr.response_id, cr.topic_id, cr.response, cc.name AS category_name, ct.name AS topic_name FROM carswap_response AS cr INNER JOIN carswap_topic AS ct USING (topic_id) INNER JOIN carswap_category AS cc USING (category_id) WHERE user_id='" . $_SESSION['user_id'] . "'";

    $data = mysqli_query($dbc, $query);

    while ($row1 = mysqli_fetch_array($data)) {
      array_push($user_responses, $row1);
    }

    // 2. check survey has been completed
    for ($i = 0; $i < count($user_responses); $i++) {
      $user_score += $user_responses[$i]['response'];
    }

    if ($user_score !== 0) {
      // 3. find other users
      $query2 = "SELECT user_id FROM car_swap WHERE user_id!='" . $_SESSION['user_id'] . "'";
      $data2 = mysqli_query($dbc, $query2);

      while ($row2 = mysqli_fetch_array($data2)) {
        array_push($car_swappers, $row2);
      }

      // 4. loop through users and collect response scores
      for ($j = 0; $j < count($car_swappers); $j++) {
        $match_score = 0;
        $swapper_responses = array();
        $matched_responses = array();

        $query3 = "SELECT cr.response_id, cr.topic_id, cr.response, cc.name AS category_name, ct.name AS topic_name FROM carswap_response AS cr INNER JOIN carswap_topic AS ct USING (topic_id) INNER JOIN carswap_category AS cc USING (category_id) WHERE user_id='" . $car_swappers[$j]['user_id'] . "'";

        $data3 = mysqli_query($dbc, $query3);

        while ($row3 = mysqli_fetch_array($data3)) {
          array_push($swapper_responses, $row3);
        }

        // 5. loop through user and swapper topics and calculate match score
        for ($k = 0; $k < count($user_responses); $k++) {
          if ($user_responses[$k]['response'] + $swapper_responses[$k]['response'] == 2) {
            array_push($matched_responses, $swapper_responses[$k]['category_name']);
            $match_score++;
          }
        }

        // add match_score and user_id to array
        array_push($match_array, array('score' => $match_score, 'user_id' => $car_swappers[$j]['user_id'], 'category_name' => $matched_responses));

      } // end user loop

      mysqli_close($dbc);

      // 6. Return highest score from match_array
      arsort($match_array);

      $match_array = array_slice($match_array, 0, 1);

      return $match_array;

    } else {
      mysqli_close($dbc);

      return false;
    }

  }


}
