<section>
  <h1><small class="text-primary">Meet the Car Swappers</small></h1>

  <div class="row">
  <?php
  $count = 0;
  foreach($cars as $obj) {
    $count++;
  ?>
  <!-- loop through cars db -->
  <div class="col-xs-12 col-sm-4">
    <div class="thumbnail">
      <img src="public/img/<?php echo $obj->picture; ?>" alt="<?php echo $obj->car; ?>" class="img-responsive">
      <div class="caption">
        <h3><?php echo $obj->car ?></h3>
        <p><b>Owner: </b><?php echo $obj->name; ?></p>
        <p><b>Location: </b><?php echo $obj->city . ', ' . $obj->state; ?></p><br>
        <p><a href="<?php echo $_SERVER['REQUEST_URI'] . '?controller=swapper&action=car&id=' . $obj->id; ?>" class="btn btn-default" role="button">View</a></p>
      </div>
    </div>
  </div>

  <?php
  if ($count % 3 === 0) {
  ?>
  <div class="clearfix visible-sm-block"></div>
  <?php
  }
  }
  ?>
  </div>
</section>
