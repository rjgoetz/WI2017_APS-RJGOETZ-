<?php require_once('../../includes/env.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Developer Jobs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo $path; ?>/global.css">
  <link rel="stylesheet" href="<?php echo $path; ?>/week6/ch9/public/css/style.css">
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

  <main>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <header class="page-header clearfix">
            <div class="row">
              <div class="col-xs-12 col-sm-10">
                <h1><a href="<?php echo $path ?>/week6/ch9">Developer Jobs</a></h1>
              </div>
              <div class="col-xs-12 col-sm-2">
                <p class="register pull-right"><a href="<?php echo $path . '/week6/ch9/index.php?controller=register&action=index'; ?>">Register</a></p>
              </div>
            </div>
          </header>
          <img class="img-responsive" src="<? echo $path; ?>/week6/ch9/public/img/dev-illustration.jpg" alt="developer illustration">
        </div>
      </div>

      <?php require_once('routes/index.php'); ?>

      </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
