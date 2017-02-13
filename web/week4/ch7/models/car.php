<?php

class Car {

  // define public attributes
  public $id;
  public $date;
  public $car;
  public $name;
  public $city;
  public $state;
  public $picture;

  public function __construct($id, $date, $car, $name, $city, $state, $picture) {
    $this->id = $id;
    $this->date = $date;
    $this->car = $car;
    $this->name = $name;
    $this->city = $city;
    $this->state = $state;
    $this->picture = $picture;
  }

  public static function all() {
    require_once('../../includes/connection.php');

    $query = "SELECT * FROM car_owner";
    $data = mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');
    $list = [];

    // create output of Car objects from DB
    while ($row = mysqli_fetch_array($data)) {
      $list[] = new Car($row['id'], $row['date'], $row['car'], $row['name'], $row['city'], $row['state'], $row['picture']);
    }

    mysqli_close($dbc);

    return $list;
  }

  public static function signup($email, $password, $name, $car, $city, $state, $picture) {
    require_once('../../includes/connection.php');

    $query = "INSERT INTO car_owner (email, password, name, car, city, state, picture) VALUES ('$email', SHA('$password'), '$name', '$car', '$city', '$state', '$picture')";
    mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');

    mysqli_close($dbc);
  }

  public static function find($id) {
    require_once('../../includes/connection.php');

    $query = "SELECT * FROM car_owner WHERE id='$id'";
    $data = mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');
    $row = mysqli_fetch_array($data);

    mysqli_close($dbc);

    $car = new Car($row['id'], $row['date'], $row['car'], $row['name'], $row['city'], $row['state'], $row['picture']);

    return $car;
  }

  public static function login($email, $password) {
    require_once('../../includes/connection.php');

    $query = "SELECT * FROM car_owner WHERE email='$email' and password = sha('$password')";
    $data = mysqli_query($dbc, $query) or die('<p>SQL query failed.</p>');
    $row = mysqli_fetch_array($data);

    mysqli_close($dbc);

    if ($row) {
      return $row;
    } else {
      return false;
    }
  }



}
