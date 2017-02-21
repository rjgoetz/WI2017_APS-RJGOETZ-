<section>
  <div class="row">
    <div class="col-xs-12">
      <div class="page-header">
        <h2>Search Results</h2>
        <p><a href="<?php echo $_SERVER['PHP_SELF'] . '?controller=home&action=index'; ?>"><< Back to Search</a></p>
      </div>

      <?php
      if ($jobs) {
        foreach($jobs as $job) {
      ?>
      <div class="job">
        <p><span class="lead text-primary"><?php echo $job->title; ?></span><br><b>
        <?php
          echo $job->company . '<br>' . $job->city . ', ' . $job->state . ' ' . $job->zip;
        ?>
      </b></p>
        <p><?php echo $job->description; ?></p>
      </div>
      <?php
        }
      } else {
      ?>
        <p>No jobs found.</p>
      <?php
      }
      ?>
    </div>
  </div>
</section>
