<?php require_once('../../includes/env.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Car Locator</title>
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
                    <p class="lead">Complete the form with your contact information and the type of car you are looking to purchase. Once we receive your preferences, we will match you with a car dealer in your area.</p>
                  </div>

                    <!-- begin form panel -->
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <form action="car-form.php" role="form" method="post">
                          <h3>Connect with a local car dealer.</h3>
                          <fieldset>
                            <div class="form-group">
                              <label for="brand">Brand Preference (Audi, Ford, etc.)</label>
                              <input class="form-control" type="text" id="brand" name="brand">
                            </div>

                            <div class="form-group">
                              <label for="color">Color</label>
                              <input class="form-control" type="text" id="color" name="color">
                            </div>

                            <p><strong>Car Category</strong></p>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="2-Door Coupe" name="type1">2-Door Coupe
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="4-Door Sedan" name="type2">4-Door Sedan
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="5-Door Hatchback / Station Wagon" name="type3">5-Door Hatchback / Station Wagon
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Sport Utility Vehicle (SUV)" name="type4">Sport Utility Vehicle (SUV)
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Truck" name="type5">Truck
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Van" name="type6">Van
                              </label>
                            </div>

                            <p><strong>Features</strong></p>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="4WD" name="feature1">Four-Wheel-Drive / All-Wheel-Drive
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Compact" name="feature2">Compact Size
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="feature3">Convertible
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Electric" name="feature4">Electric
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Hybrid" name="feature5">Hybrid
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Luxury" name="feature6">Luxury
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Truck" name="feature7">Truck
                              </label>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" value="Collector" name="feature8">Vintage / Collector
                              </label>
                            </div>

                            <div class="form-group">
                              <label for="other">Other (features not listed above)</label>
                              <input class="form-control" type="text" id="other" name="other">
                            </div>

                            <div class="form-group">
                              <label for="price">Price Range</label>
                              <select name="price" id="price">
                                <option value="$0 - $9,999">$0 - $9,999</option>
                                <option value="$10,000 - $19,999">$10,000 - $19,999</option>
                                <option value="$20,000 - $29,999">$20,000 - $29,999</option>
                                <option value="$30,000 - $39,999">$30,000 - $39,999</option>
                                <option value="$40,000 - $49,999">$40,000 - $49,999</option>
                                <option value="$50,000 - $59,999">$50,000 - $59,999</option>
                                <option value="$60,000 - $69,999">$60,000 - $69,999</option>
                                <option value="$70,000 - $79,999">$70,000 - $79,999</option>
                                <option value="$80,000 - $89,999">$80,000 - $89,999</option>
                                <option value="$90,000 - $99,999">$90,000 - $99,999</option>
                                <option value="$100,000+">$100,000+</option>
                              </select>
                            </div>
                          </fieldset>

                          <fieldset>
                            <div class="form-group">
                              <label for="fullname">Full Name</label>
                              <input class="form-control" type="text" id="fullname" name="fullname">
                            </div>

                            <div class="form-group">
                              <label for="email">Email</label>
                              <input class="form-control" type="email" id="email" name="email">
                            </div>

                            <div class="form-group">
                              <label for="comments">Comments:</label>
                              <textarea class="form-control" name="comments" id="comments" cols="30" rows="5"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Find a Dealer ></button>
                            <button type="reset" class="btn btn-default pull-right">Reset Form</button>
                          </fieldset>
                        </form>
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
