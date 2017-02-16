<?php
session_start();

if (isset($_GET['controller']) && isset($_GET['action'])) {
  $controller = $_GET['controller'];
  $action = $_GET['action'];
} else {
  $controller = 'home';
  $action = 'index';
}

require_once('routes/routes.php');
// require_once('views/layout.php');
