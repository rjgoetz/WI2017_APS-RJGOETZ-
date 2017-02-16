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
        // set session variables
        $_SESSION['user_id'] = $auth['user_id'];
        $_SESSION['name'] = $auth['name'];

        // set cookies
        setcookie('user_id', $auth['user_id'], time() + 30*24*60*60);
        setcookie('name', $auth['name'], time() + 30*24*60*60);

        // redirect to index
        header('Location: index.php?controller=home&action=index&msg=login');
        exit;

      } else {
        // redirect to index
        header('Location: index.php?controller=login&action=index&msg=fail');
      }
    }
  }

  public function logout() {
    if (isset($_SESSION['user_id'])) {
      // end session
      session_destroy();
      $_SESSION = array();

      // delete cookies
      setcookie('user_id', '', time() - 3600);
      setcookie('name', '', time() - 3600);

      // redirect to log in screen
      header('Location: index.php?controller=login&action=index&msg=logout');

    } else {
      return call('login', 'index');
    }
  }

}
