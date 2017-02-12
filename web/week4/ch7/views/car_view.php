<section>
  <h1><small class="text-primary">Meet <?php echo $car->name; ?></small></h1>

  <div class="row">
    <div class="col-xs-12 col-xs-6">
      <div class="thumbnail">
        <img src="<?php echo 'public/img/' . $car->picture; ?>" alt="<?php echo $car->car; ?>" class="img-responsive">
        <div class="caption">
          <h2><?php echo $car->car; ?></h2>
          <p><b>Owner: </b><?php echo $car->name; ?></p>
          <p><b>Joined: </b><?php echo $car->date; ?></p>
          <p><b>Location: </b><?php echo $car->city . ', ' . $car->state; ?></p><br>
          <button type="submit" class="btn btn-default">Contact ></button>
        </div>
      </div>
    </div>
  </div>
</section>
