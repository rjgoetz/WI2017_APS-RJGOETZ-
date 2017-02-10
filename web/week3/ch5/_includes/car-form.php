<section>
  <div class="row">
    <div class="col-xs-12 col-sm-6">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
          <label for="car">Car: Year, Make and Model</label>
          <input type="text" id="car" name="car" class="form-control" value="<?php echo $car; ?>">
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary margin-top" name="submit">Add Car ></button>
      </form>
    </div>
  </div>
</section>
