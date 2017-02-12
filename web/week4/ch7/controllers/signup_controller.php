<?php

class SignUpController {
  public function index() {
    require_once('views/signup_view.php');
  }

  public function signup() {
    // image variables
    $upload_path = 'public/img/';
    $max_size = 250000;
    $image_name = $_FILES['picture']['name'];
    $image_target = $upload_path . $image_name;
    $image_type = $_FILES['picture']['type'];
    $image_size = $_FILES['picture']['size'];

    // check form data isn't empty
    if (!empty($_POST['name']) && !empty($_POST['car']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2'])) {

      // check passwords match
      if ($_POST['password'] === $_POST['password2']) {

        // check image types and size meets requirements
        if ($image_type == 'image/jpeg' || $image_type == 'image/pjpeg' || $image_type == 'image/png' || $image_type == 'image/gif' && $image_size > 0 && $image_size <= $max_size) {

          // check for image error
          if ($_FILES['image']['error'] == 0) {

            // move image to img folder
            move_uploaded_file($_FILES['picture']['tmp_name'], $image_target);

            Car::signup($_POST['email'], $_POST['password'], $_POST['name'], $_POST['car'], $_POST['city'], $_POST['state'], $image_name);

            echo '<p class="alert alert-success">You have successfully signed up at Car Swap!</p>';
            return call('signup', 'index');

          } else {
            echo '<p class="alert alert-danger">Error uploading image.</p>';
            return call('signup', 'index');
          }
        } else {
          echo '<p class="alert alert-danger">Image size or type not supported.</p>';
          return call('signup', 'index');
        }

        // try to delete temporary image file
        @unlink($_FILES['picture']['tmp_name']);

      } else {
        echo '<p class="alert alert-danger">Passwords do not match.</p>';
        return call('signup', 'index');
      }
    } else {
      echo '<p class="alert alert-danger">Please complete all fields.</p>';
      return call('signup', 'index');
    }
  }


}
