<section>
  <h1><small class="text-primary">My Profile</small></h1>

  <div class="row">
    <div class="col-xs-12 col-xs-6">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" role="form" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" value="<?php echo $car->name; ?>">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" class="form-control" value="<?php echo $car->email; ?>">
        </div>

        <div class="form-group">
          <label for="city">City</label>
          <input type="text" id="city" name="city" class="form-control" value="<?php echo $car->city; ?>">
        </div>

        <div class="form-group">
          <label for="state">State</label>
          <select name="state" id="state" value="<?php echo $car->state; ?>">
            <option value="AL">Alabama</option>
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
          <label for="car">Car Type (year, make, model)</label>
          <input type="text" id="car" name="car" class="form-control" value="<?php echo $car->car; ?>">
        </div>


        <button type="submit" class="btn btn-default">Update</button>
      </form>

    </div>
  </div>

  <!-- <div class="row">
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
  </div> -->
</section>
