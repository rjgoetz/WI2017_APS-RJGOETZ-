<?php

class Car {

  // define public attributes
  public $id;
  public $date;
  public $car;
  public $name;
  public $email;
  public $city;
  public $state;
  public $picture;

  public function __construct($id, $date, $car, $name, $email, $city, $state, $picture) {
    $this->id = $id;
    $this->date = $date;
    $this->car = $car;
    $this->name = $name;
    $this->email = $email;
    $this->city = $city;
    $this->state = $state;
    $this->picture = $picture;
  }

  public static function all() {
    require_once('../../includes/connection.php');

    $query = "SELECT * FROM car_swap";
    $data = mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');
    $list = [];

    // create output of Car objects from DB
    while ($row = mysqli_fetch_array($data)) {
      $list[] = new Car($row['user_id'], $row['date'], $row['car'], $row['name'], $row['email'], $row['city'], $row['state'], $row['picture']);
    }

    mysqli_close($dbc);

    return $list;
  }

  public static function signup($email, $password, $name, $car, $city, $state, $picture) {
    require_once('../../includes/connection.php');

    $query = "INSERT INTO car_swap (date, email, password, name, car, city, state, picture) VALUES (now(), '$email', SHA('$password'), '$name', '$car', '$city', '$state', '$picture')";
    mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');

    mysqli_close($dbc);
  }

  public static function find($id) {
    require_once('../../includes/connection.php');

    $query = "SELECT * FROM car_swap WHERE user_id='$id'";
    $data = mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');
    $row = mysqli_fetch_array($data);

    mysqli_close($dbc);

    $car = new Car($row['user_id'], $row['date'], $row['car'], $row['name'], $row['email'], $row['city'], $row['state'], $row['picture']);

    return $car;
  }

  public static function login($email, $password) {
    require_once('../../includes/connection.php');

    $query = "SELECT * FROM car_swap WHERE email='$email' and password = sha('$password')";
    $data = mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');
    $row = mysqli_fetch_array($data);

    mysqli_close($dbc);

    if ($row) {
      return $row;
    } else {
      return false;
    }
  }

  public static function verify($id, $password) {
    require_once('../../includes/connection.php');

    $query = "SELECT * FROM car_swap WHERE user_id='$id' and password = sha('$password')";
    $data = mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');
    $row = mysqli_fetch_array($data);

    mysqli_close($dbc);

    if ($row) {
      return $row;
    } else {
      return false;
    }
  }

  public static function update_login($id, $email, $password) {
    require('../../includes/connection.php');

    $query = "UPDATE car_swap SET email='$email', password=sha('$password') WHERE user_id='$id'";
    mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');

    mysqli_close($dbc);
  }

  public static function update_profile($id, $name, $city, $state, $car) {
    require('../../includes/connection.php');

    $query = "UPDATE car_swap SET name='$name', city='$city', state='$state', car='$car' WHERE user_id='$id'";
    mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');

    mysqli_close($dbc);
  }


}
