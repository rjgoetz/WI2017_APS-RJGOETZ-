<section>
  <div class="row">
    <div class="col-xs-12">
      <h1>Car Swap Questionaire</h1>
      <div class="row">
        <div class="col-xs-12 col-xs-9">
          <p class="lead">What do you like in an automobile? We use these results to find you the perfect car swapper.</p>
        </div>
      </div>

      <form action="<?php $_SERVER['PHP_SELF'] . '?controller=survey&action=index&id=' . $_SESSION['user_id'] ?>" role="form" method="post">
        <div class="row">

          <?php
          $category;

          foreach ($survey as $key=>$obj) {
            if ($category !== $obj->category_name) {
              $category = $obj->category_name;
          ?>
            <div class="col-xs-12">
              <p class="lead survey-category text-primary"><?php echo $obj->category_name; ?></p>
            </div>
          <?php
            }
          ?>
            <div class="col-xs-12 col-sm-4 col-sm-offset-1">
              <p class="radio"><b><?php echo $obj->topic_name; ?></b></p>
            </div>
            <div class="col-xs-12 col-sm-7">
              <div class="radio">
                <label class="radio-inline"><input type="radio" name="<?php echo $obj->response_id; ?>" value="1" <?php if ($obj->response == 1) { echo 'checked'; } ?>>Like</label>
                <label class="radio-inline"><input type="radio" name="<?php echo $obj->response_id; ?>" value="3" <?php if ($obj->response == 3) { echo 'checked'; } ?>>Dislike</label>
              </div>
            </div>
          <?php
          }
          ?>

          <div class="col-xs-12">
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Update Survey</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
