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
    case 'login':
      require_once('models/car.php');
      $controller = new LoginController();
      break;
    case 'signup':
      require_once('models/car.php');
      $controller = new SignUpController();
      break;
    case 'profile':
      require_once('models/car.php');
      $controller = new ProfileController();
      break;
  }

  $controller->{$action}();
}

$controllers = array('home' => ['index', 'error'],
                     'swapper' => ['car'],
                     'login' => ['index', 'auth', 'logout'],
                     'signup' => ['index', 'signup'],
                     'profile' => ['index']);

if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('home', 'error');
  }
} else {
  call('home', 'error');
}
