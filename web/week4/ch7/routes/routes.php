<?php

function call($controller, $action) {
  require_once('controllers/' . $controller . '_controller.php');

  switch($controller) {
    case 'home':
      require_once('models/car.php');
      $controller = new HomeController();
      break;
    case 'swapper':
      require_once('models/car.php');
      $controller = new CarController();
      break;
  }

  $controller->{$action}();
}

$controllers = array('home' => ['index', 'error'],
                     'swapper' => ['car']);

if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('home', 'error');
  }
} else {
  call('home', 'error');
}
