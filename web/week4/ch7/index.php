<?php
session_start();

if ($_COOKIE['user_id'] && $_COOKIE['name']) {
  $_SESSION['user_id'] = $_COOKIE['user_id'];
  $_SESSION['name'] = $_COOKIE['name'];
}

if (isset($_GET['controller']) && isset($_GET['action'])) {
  $controller = $_GET['controller'];
  $action = $_GET['action'];
} else {
  $controller = 'home';
  $action = 'index';
}

require_once('routes/routes.php');
// require_once('views/layout.php');
