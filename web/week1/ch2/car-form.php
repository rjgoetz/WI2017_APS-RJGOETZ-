<?php require_once('../../includes/env.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Success! Car Locator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="<?php echo $path; ?>/style.css">
</head>
<body>
  <header class="projects-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <p><a href="<?php echo $path; ?>/"><< Advanced Projects Studio</a></p>
        </div>
      </div>
    </div>
  </header>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">

          <!-- begin main content -->

          <div class="thumbnail">
            <header>
              <div class="row">
                <div class="col-xs-12 col-sm-5 col-sm-push-6">
                  <img src="audi-s4.jpg" alt="Audi S4" class="pull-right img-responsive">
                </div>
                <div class="col-xs-12 col-sm-5 col-sm-pull-4">
                  <div class="caption">
                    <div class="page-header">
                      <h1 class="text-primary">Car Locator</h1>
                      <p class="lead"><i>Find Your Next Car</i></p>
                    </div>
                  </div>
                </div>
              </div>
            </header>

            <!-- begin wrap -->
            <div class="wrap">
              <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                  <div class="caption">
                    <p class="lead">You successfully sent your information. A car dealer will be in contact with you shortly!</p>
                  </div>


                    <!-- begin form panel -->
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3>Your Information</h3>
                        <ul class="list-unstyled output">
                          <?php

                          // is checkbox checked?
                          function checked_box($name) {
                            return (isset($_POST[$name]) ? 1 : 0);
                          }

                          // variable declaration
                          $fullname = $_POST['fullname'];
                          $email = $_POST['email'];
                          $brand = $_POST['brand'];
                          $color = $_POST['color'];
                          $other = $_POST['other'];
                          $price = $_POST['price'];
                          $comments = $_POST['comments'];

                          $num_categories = 6;
                          $car_categories = array();
                          for ($i = 1; $i <= $num_categories; $i++)
                            if (checked_box('type' . $i) == 1)
                              array_push($car_categories, $_POST['type' . $i]);
                          $car_categories_str = implode(', ', $car_categories);

                          $num_features = 8;
                          $car_features = array();
                          for ($i = 1; $i <= $num_features; $i++)
                            if (checked_box('feature' . $i) == 1)
                              array_push($car_features, $_POST['feature' . $i]);
                          $car_features_str = implode(', ', $car_features);

                          // database connection
                          require_once('../../includes/connection.php');

                          echo $dbc;

                          // build query
                          $query = "INSERT INTO car_leads (full_name, email, brand, color, other, price, car_categories, car_features, comments) VALUES ('$fullname', '$email', '$brand', '$color', '$other', '$price', '$car_categories_str', '$car_features_str', '$comments')";

                          // query database
                          $result = mysqli_query($dbc, $query) or die('Error querying database.');

                          // close database
                          mysqli_close($dbc);


                          // output html
                          echo "<li><b>Full Name: </b>" . $fullname . "</li>";
                          echo "<li><b>Email: </b>$email</li>";
                          echo "<li><b>Brand Preferences: </b>$brand</li>";
                          echo "<li><b>Color: </b>$color</li>";
                          echo "<li><b>Type: </b><ul>";
                          foreach ($car_categories as $category)
                            echo "<li>$category</li>";
                          echo "</li></ul>";
                          echo "<li><b>Features: </b><ul>";
                          foreach ($car_features as $feature)
                            echo "<li>$feature</li>";
                          echo "</ul></li>";
                          echo "<li><b>Other Features: </b>$other</li>";
                          echo "<li><b>Price Range: </b>$price</li>";
                          echo "<li><b>Comments: </b>$comments</li>";


                          // construct email
                          $msg = "Car Locator - You received a new lead!\n\n";
                          $msg .= "Contact Name: $fullname\n";
                          $msg .= "Email Address: $email\n";
                          $msg .= "Brand Preference: $brand\n";
                          $msg .= "Color: $color\n\n";
                          $msg .= "Car Types: \n";
                          foreach ($car_categories as $category)
                            $msg .= "$category\n";
                          $msg .= "\n";
                          $msg .= "Car Features: \n";
                          foreach ($car_features as $feature)
                            $msg .= "$feature\n";
                          $msg .= "\n";
                          $msg .= "Other Features: $other\n";
                          $msg .= "Price Range: $price\n";
                          $msg .= "Comments: $comments";

                          $subject = 'Car Locator Form';
                          $to = 'rgoetz@mcad.edu';
                          $from = $email;

                          // mail($to, $subject, $msg, 'From: ' . $from);
                          ?>
                        </ul>
                        <a href="index.html" class="btn btn-primary">< Back</a>
                      </div>
                    </div>
                    <!-- end form panel -->
                  </div>
                </div>
              </div>
              <!-- end wrap -->

            </div>
          </div>
          <!-- end main content -->

        </div>
      </div>
    </div>
  </section>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
