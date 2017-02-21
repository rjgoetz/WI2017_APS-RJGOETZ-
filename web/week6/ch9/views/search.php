<?php
if (!isset($_SESSION['sort'])) {
  $_SESSION['sort'] = $_GET['sort'];
}

$query_string = '?controller=search&action=index&search=' . $_GET['search'] . '&submit=';
?>

<section>
  <div class="row">
    <div class="col-xs-12">
      <div class="page-header">
        <h2>Search Results</h2>
        <p><a href="<?php echo $_SERVER['PHP_SELF'] . '?controller=home&action=index'; ?>"><< Back to Search</a></p>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-3">
          <p><b><a href="
          <?php
          if ($_SESSION['sort'] == $_GET['sort']) {
            if ($_GET['order'] == '1') {
              echo $_SERVER['PHP_SELF'] . $query_string . '&sort=title&order=2&page=' . $_GET['page'];
            } else {
              echo $_SERVER['PHP_SELF'] . $query_string . '&sort=title&order=1&page=' . $_GET['page'];
            }
          } else {
            echo $_SERVER['PHP_SELF'] . $query_string . '&sort=title&order=1&page=' . $_GET['page'];

            $_SESSION['sort'] = $_GET['sort'];
          }
          ?>">Job Title</a></b></p>
        </div>
        <div class="col-xs-12 col-sm-7">
          <p><b>Description</b></p>
        </div>
        <div class="col-xs-12 col-sm-2">
          <p><b><a href="
          <?php
          if ($_SESSION['sort'] == $_GET['sort']) {
            if ($_GET['order'] == '1') {
              echo $_SERVER['PHP_SELF'] . $query_string . '&sort=date_posted&order=2&page=' . $_GET['page'];
            } else {
              echo $_SERVER['PHP_SELF'] . $query_string . '&sort=date_posted&order=1&page=' . $_GET['page'];
            }
          } else {
            echo $_SERVER['PHP_SELF'] . $query_string . '&sort=date_posted&order=1&page=' . $_GET['page'];

            $_SESSION['sort'] = $_GET['sort'];
          }
          ?>">Date Posted</a></b></p>
        </div>
      </div>

      <?php
      if ($jobs) {
        foreach($jobs as $job) {
      ?>
      <div class="job">
        <div class="row">
          <div class="col-xs-12 col-sm-3">
            <p><b><?php echo $job->title; ?></b><br>
            <?php
              echo $job->company . '<br>' . $job->city . ', ' . $job->state . ' ' . $job->zip;
            ?>
          </p>
          </div>
          <div class="col-xs-12 col-sm-7">
            <p><?php echo $job->description; ?></p>
          </div>
          <div class="col-xs-12 col-sm-2">
            <p><?php echo $job->date; ?></p>
          </div>
        </div>
      </div>
      <?php
        }
      } else {
      ?>
        <p>No jobs found.</p>
      <?php
      }
      ?>

      <div class="row">
        <div class="col-xs-12">
          <nav class="pagination">
            <p><b>Pages</b></p>
            <ul>
              <li><a href="<?php echo $_SERVER['PHP_SELF'] . $query_string . '&page=1'?>">1</a></li>
              <li><a href="<?php echo $_SERVER['PHP_SELF'] . $query_string . '&page=2'?>">2</a></li>
              <li><a href="<?php echo $_SERVER['PHP_SELF'] . $query_string . '&page=3'?>">3</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</section>
