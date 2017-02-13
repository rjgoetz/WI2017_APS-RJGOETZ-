<?php

class LoginController {
  public function index() {
    require_once('views/header.php');
    require_once('views/login_view.php');
    require_once('views/footer.php');
  }

  public function auth() {
    if (empty($_POST['email']) || empty($_POST['password'])) {
      echo '<p class="alert alert-danger">Please enter your email and password.</p>';
      return call('login', 'index');
    } else {
      // check email / password combination
      $auth = Car::login($_POST['email'], $_POST['password']);
      if ($auth) {
        // set cookies before header
        setcookie('name', $auth['name']);
        setcookie('user_id', strval($auth['id']));

        // view generation
        require_once('views/header.php');
        echo '<p class="alert alert-success">You have successfully logged in ' . $_COOKIE['name'] . '!</p>';
        require_once('views/login_view.php');
        require_once('views/footer.php');
      } else {
        echo '<p class="alert alert-danger">Your email and password combination is incorrect.</p>';
        return call('login', 'index');
      }
    }

  }

}
