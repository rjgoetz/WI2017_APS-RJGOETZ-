<section>
  <div class="row">
    <div class="col-xs-12">
      <h1>My Match</h1>
      <?php

      if (!$my_match) {
      ?>

      <p class="lead">Please complete your suvey first!</p>
      <a class="btn btn-primary" href="<? echo $_SERVER['PHP_SELF'] . '?controller=survey&action=index&id=' . $_SESSION['user_id']; ?>">Take Survey >></a>

      <?php
      } else {
      ?>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-push-6">
          <img class="img-responsive" src="public/img/<?php echo $car->picture; ?>" alt="<?php echo $car->car; ?>">
        </div>
        <div class="col-xs-12 col-sm-6 col-sm-pull-6">
          <br>
          <p class="lead"><b><?php echo $car->name; ?> is the perfect match!</b></p>
          <p><b>Owner: </b><?php echo $car->name; ?></p>
          <p><b>Joined: </b><?php echo $car->date; ?></p>
          <p><b>Location: </b><?php echo $car->city . ', ' . $car->state; ?></p><br>
          <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] . '?controller=swapper&action=car&id=' . $car->id; ?>">View Profile >></a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12">
          <p class="lead text-primary">The topics you match on:</p>

      <?php
        $count = 1;
        $category_count = array();
        $length = count($my_match[0]['category_name']);
        foreach ($my_match[0]['category_name'] as $key => $category) {
          if ($key != 0) {
            if ($category == $my_match[0]['category_name'][$key - 1]) {
              $count++;
            } elseif ($length - 1 == $key) {
              echo 'here';
              array_push($category_count, [$my_match[0]['category_name'][$key], $count]);
            } else {
              array_push($category_count, [$my_match[0]['category_name'][$key - 1], $count]);
              $count = 1;
            }
          }
      ?>

        <p><b><?php echo $category; ?></b></p>


      <?php
        }
        var_dump($category_count);
      }
      ?>
        </div>
      </div>
    </div>
  </div>
</section>
