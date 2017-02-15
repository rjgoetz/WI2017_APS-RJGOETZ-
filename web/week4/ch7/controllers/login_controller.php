<?php

class LoginController {

  public function index() {
    require_once('views/header.php');

    if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];

      if ($msg === 'fail') {
        echo '<p class="alert alert-danger">Your email and password combination is incorrect.</p>';
      } elseif ($msg === 'logout') {
        echo '<p class="alert alert-success">You are logged out.</p>';
      } elseif ($msg === 'incomplete') {
        echo '<p class="alert alert-danger">Please complete all fields.</p>';
      } elseif ($msg === 'signup') {
        echo '<p class="alert alert-success">You have successfully signed up! Please log in.</p>';
      }
    }

    require_once('views/login_view.php');
    require_once('views/footer.php');
  }

  public function auth() {
    if (empty($_POST['email']) || empty($_POST['password'])) {
      // complete all fields
      header('Location: index.php?controller=login&action=index&msg=incomplete');
    } else {
      // check email / password combination
      $auth = Car::login($_POST['email'], $_POST['password']);
      if ($auth) {
        // set cookies before header
        setcookie('name', $auth['name']);
        setcookie('user_id', strval($auth['user_id']));

        // redirect to index
        header('Location: index.php?controller=home&action=index&msg=login');

      } else {
        // redirect to index
        header('Location: index.php?controller=login&action=index&msg=fail');
      }
    }
  }

  public function logout() {
    if (isset($_COOKIE['user_id'])) {
      // set cookies to negative time
      setcookie('name', $auth['name'], time() - 3600);
      setcookie('user_id', strval($auth['user_id']), time() - 3600);

      // redirect to log in screen
      header('Location: index.php?controller=login&action=index&msg=logout');

    } else {
      return call('login', 'index');
    }
  }

}
