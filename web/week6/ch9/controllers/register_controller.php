<?php

class RegisterController {

  public function index() {    

    require_once('views/register.php');
  }

  public function register() {

    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job = $_POST['job'];
    $resume = $_POST['resume'];

    if (isset($_POST['submitted'])) {

      if (!empty($first_name) && !empty($last_name)) {

        // check phone number
        if (preg_match('/^\(?[2-9]\d{2}\)?[-\s]\d{3}-\d{4}$/', $phone)) {

          $new_phone = preg_replace('/[\(\)\-\s]/', '', $phone);

          // check email
          if (preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', $email)) {

            $domain = preg_replace('/[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', "", $email);

            if (checkdnsrr($domain)) {

              User::create($first_name, $last_name, $email, $new_phone, $job, $resume);

              require_once('views/post.php');

            } else {
              echo '<p class="alert alert-danger">Please enter a valid email address.</p>';
              return call('register', 'index');
            }

          } else {
            echo '<p class="alert alert-danger">Please enter a valid email address.</p>';
            return call('register', 'index');
          }

        } else {
          echo '<p class="alert alert-danger">Please enter a valid phone number.</p>';
          return call('register', 'index');
        }

      } else {
        echo '<p class="alert alert-danger">Please enter your first and last name.</p>';
        return call('register', 'index');
      }

    } else {
      echo '<p class="alert alert-danger">Form wasn\'t submitted. Try again.</p>';
      return call('register', 'index');
    }

  }

}
