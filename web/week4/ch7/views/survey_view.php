<section>
  <div class="row">
    <div class="col-xs-12">
      <h1>Car Swap Questionaire</h1>
      <p class="lead">What do you like in an automobile?</p>
      <form action="<?php $_SERVER['PHP_SELF'] . '?controller=survey&action=respond&id=' . $_SESSION['user_id'] ?>" role="form" method="post">

        <div class="radio">
          <p><b>Something: </b></p>
          <label class="radio-inline"><input type="radio" name="carswap">Like</label>
          <label class="radio-inline"><input type="radio" name="carswap">Dislike</label>
        </div>


      <?php
      foreach ($survey as $obj) {

      }

      ?>


      </form>
    </div>
  </div>
</section>
