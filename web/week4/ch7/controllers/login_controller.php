<?php

class LoginController {
  public function index() {
    require_once('views/login_view.php');
  }

  public function auth() {
    if (empty($_POST['email']) || empty($_POST['password'])) {
      echo '<p class="alert alert-danger">Please enter your email and password.</p>';
      return call('login', 'index');
    } else {
      // check email / password combination
      $auth = Car::login($_POST['email'], $_POST['password']);
      if ($auth) {
        echo '<p class="alert alert-success">You have successfully logged in!</p>';
        return call('login', 'index');
      } else {
        echo '<p class="alert alert-danger">Your email and password combination is incorrect.</p>';
        return call('login', 'index');
      }
    }
  }

}
