<?php

$env = 'production';

if ($env === 'production') {
  $path = '/WI2017_APS-RJGOETZ-/week4/ch7/';
}

if (isset($_GET['controller']) && isset($_GET['action'])) {
  $controller = $_GET['controller'];
  $action = $_GET['action'];
} else {
  $controller = 'home';
  $action = 'index';
}

require_once('views/layout.php');
