<?php

// Developer Jobs v1.0

if (!isset($_GET['controller']) && !isset($_GET['action'])) {
  $controller = 'home';
  $action = 'index';
} else {
  $controller = $_GET['controller'];
  $action = $_GET['action'];
}

require_once('views/layout.php');
