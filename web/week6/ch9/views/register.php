<section>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
      <h2>Registration</h2>
      <p class="lead">Register with Developer Jobs and post your resume.</p>

      <div class="row">
        <div class="col-xs-12 col-sm-9">
          <form action="<?php echo $_SERVER['PHP_SELF'] . '?controller=register&action=register'; ?>" method="post" role="form">
            <div class="form-group">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control" id="firstname" name="firstname">
            </div>
            <div class="form-group">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="phone" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
              <label for="job">Desired Job</label>
              <input type="text" class="form-control" id="job" name="job">
            </div>
            <div class="form-group">
              <label for="resume">Paste your resume here:</label>
              <textarea class="form-control" name="resume" id="resume"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submitted">Submit</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
