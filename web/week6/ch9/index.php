<?php

// Developer Jobs v1.0
session_start();

if (isset($_POST['submit'])) {
  $controller = $_POST['controller'];
  $action = $_POST['action'];
} else {
  if (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $controller = 'home';
    $action = 'index';
  } else {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
  }
}

require_once('views/layout.php');
