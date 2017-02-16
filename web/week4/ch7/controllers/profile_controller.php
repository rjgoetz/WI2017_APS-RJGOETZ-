<?php

class ProfileController {
  public function index() {

    $car = Car::find($_GET['id']);

    require_once('views/header.php');

    if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];
      if ($msg === 'unauth') {
        echo '<p class="alert alert-danger">Your password is incorrect. Please try again.</p>';
      } elseif ($msg === 'auth') {
        echo '<p id="disappear" class="alert alert-success">Your email and password have been updated.</p>';
      } elseif ($msg === 'fail') {
        echo '<p class="alert alert-danger">Your passwords do not match. Please try again.</p>';
      } elseif ($msg === 'empty') {
        echo '<p class="alert alert-danger">Please complete all fields.</p>';
      } elseif ($msg === 'success') {
        echo '<p id="disappear" class="alert alert-success">Your information has been updated.</p>';
      }
    }

    require_once('views/profile_view.php');
    require_once('views/footer.php');
  }

  public function profile() {
    if (isset($_POST['submit'])) {

      Car::update_profile($_GET['id'], $_POST['name'], $_POST['city'], $_POST['state'], $_POST['car']);

      header('Location: index.php?controller=profile&action=index&id=' . $_GET['id'] . '&msg=success');

    } else {
      return call('profile', 'index');
    }
  }

  public function credentials() {
    if (isset($_POST['submit'])) {
      $auth = Car::verify($_GET['id'], $_POST['password']);

      if ($auth) {
        if (!empty($_POST['newpass'] && !empty($_POST['password2']))) {
          if ($_POST['newpass'] === $_POST['password2']) {

            Car::update_login($_GET['id'], $_POST['email'], $_POST['newpass']);

            header('Location: index.php?controller=profile&action=index&id=' . $_GET['id'] . '&msg=auth');
          } else {
            header('Location: index.php?controller=profile&action=index&id=' . $_GET['id'] . '&msg=fail');
          }
        } else {
          header('Location: index.php?controller=profile&action=index&id=' . $_GET['id'] . '&msg=empty');
        }
      } else {
        header('Location: index.php?controller=profile&action=index&id=' . $_GET['id'] . '&msg=unauth');
      }
    } else {
      return call('profile', 'index');
    }
  }
}
