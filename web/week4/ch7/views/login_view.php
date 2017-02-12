<div class="row">
  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
    <div class="panel panel-default">
      <div class="panel-body">
        <h1>Log In</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?controller=login&action=auth'; ?>" method="post" role="form">
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password">
          </div>
          <p><button type="submit" class="btn btn-primary">Log In</button></p>
          <p>Don't have an account? <a href="<? echo $_SERVER['PHP_SELF'] . '?controller=signup&action=index'; ?>">Sign Up</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
