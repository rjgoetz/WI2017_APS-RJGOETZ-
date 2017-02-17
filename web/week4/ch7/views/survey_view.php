<section>
  <div class="row">
    <div class="col-xs-12">
      <h1>Car Swap Questionaire</h1>
      <p class="lead">What do you like in an automobile?</p>
      <form action="<?php $_SERVER['PHP_SELF'] . '?controller=survey&action=index&id=' . $_SESSION['user_id'] ?>" role="form" method="post">

        <?php

        foreach ($survey as $obj) {
        ?>
        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <p class="radio"><b><?php echo $obj->name; ?></b></p>
          </div>
          <div class="col-xs-12 col-sm-8">
            <div class="radio">
              <label class="radio-inline"><input type="radio" name="<?php echo $obj->response_id; ?>" value="1" <?php if ($obj->response == 1) { echo 'checked'; } ?>>Like</label>
              <label class="radio-inline"><input type="radio" name="<?php echo $obj->response_id; ?>" value="2" <?php if ($obj->response == 2) { echo 'checked'; } ?>>Dislike</label>
            </div>
          </div>
        </div>
        <?php
        }
        ?>

        <br>
        <button type="submit" name="submit" class="btn btn-primary">Finish</button>

      </form>
    </div>
  </div>
</section>
