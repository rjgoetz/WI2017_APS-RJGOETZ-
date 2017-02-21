<section>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <div class="well">
        <p class="lead text-primary text-center">Your dream job is out there. Go find it!</p>
        <div class="row">
          <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <form action="<?php echo $_SERVER['PHP_SELF'] . '?controller=search&action=index'; ?>" method="post" role="form">
              <div class="form-group">
                <label for="search">Search</label>
                <input class="form-control" type="text" id="search" name="search" placeholder="job title, skill, etc.">
              </div>
              <button type="submit" class="btn btn-primary">Search >></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
