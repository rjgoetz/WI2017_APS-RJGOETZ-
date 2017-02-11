<?php

if (getenv('env') === 'production') {

  $dbc = mysqli_connect('us-cdbr-iron-east-04.cleardb.net', 'ba42118f85b34c', 'e4f6631c', 'heroku_a498164999f10b4') or die('Error connecting to MySQL server.');

} else {

  $dbc = mysqli_connect('localhost', 'root', 'root', 'advproj') or die('Error connecting to MySQL server.');

}
