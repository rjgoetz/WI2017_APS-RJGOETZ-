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
        <div class="col-xs-12 col-xs-6">
          <p class="lead"><?php echo $car->name; ?> is the perfect match!</p>
          <p><b>Owner: </b><?php echo $car->name; ?></p>
          <p><b>Joined: </b><?php echo $car->date; ?></p>
          <p><b>Location: </b><?php echo $car->city . ', ' . $car->state; ?></p><br>
          <a class="btn btn-default" href="<?php echo $_SERVER['PHP_SELF'] . '?controller=swapper&action=car&id=' . $car->id; ?>">View Profile >></a>
        </div>
        <div class="col-xs-12 col-xs-6">
          <img class="img-responsive" src="public/img/<?php echo $car->picture; ?>" alt="<?php echo $car->car; ?>">
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-12">
          <p class="lead text-primary">The topics you match on:</p>
      <?php
        foreach ($my_match['topic_name'] as $topic) {
      ?>

        <p><b><?php echo $topic; ?></b></p>


      <?php
        }
      }
      ?>
        </div>
      </div>
    </div>
  </div>
</section>
