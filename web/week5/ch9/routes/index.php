<?php


function call($controller, $action) {
  require_once('controllers/' . $controller . '_controller.php');

  switch($controller) {
    case 'home':
      $controller = new HomeController();
      break;
  }

  $controller->{$action}();
}


$controllers = array('home' => ['index', 'error']);


if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('home', 'error');
  }
} else {
  call('home', 'error');
}
