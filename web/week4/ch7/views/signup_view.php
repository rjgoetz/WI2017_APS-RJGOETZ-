<div class="row">
  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
    <div class="panel panel-default">
      <div class="panel-body">
        <h1>Sign Up</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] . '?controller=signup&action=signup'; ?>" method="post" role="form" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Your Name</label>
            <input class="form-control" type="text" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="car">Car (Year, Make, and Model)</label>
            <input class="form-control" type="text" id="car" name="car" required>
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input class="form-control" type="text" id="city" name="city" required>
          </div>
          <div class="form-group">
            <label for="state">State</label>
            <select name="state" id="state">
              <option value="AL" selected>Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA">California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
          </div>
          <div class="form-group">
            <label for="picture">Car Picture</label>
            <input type="file" id="picture" name="picture" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="password2">Password again</label>
            <input class="form-control" type="password" id="password2" name="password2" required>
          </div>
          <p><button type="submit" class="btn btn-primary" name="submit">Sign Up</button></p>
          <p>Already have an account? <a href="<?php echo $_SERVER['PHP_SELF'] . '?controller=login&action=index'; ?>">Log In</a></p>
        </form>
      </div>
    </div>
  </div>
</div>
