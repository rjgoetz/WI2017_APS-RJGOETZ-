<?php


function call($controller, $action) {
  require_once('controllers/' . $controller . '_controller.php');

  switch($controller) {
    case 'home':
      $controller = new HomeController();
      break;
    case 'search':
      require_once('models/job.php');
      $controller = new SearchController();
      break;
    case 'register':
      require_once('models/user.php');
      $controller = new RegisterController();
      break;
  }

  $controller->{$action}();
}


$controllers = array('home' => ['index', 'error'],
                     'search' => ['index'],
                     'register' => ['index', 'register']);


if (array_key_exists($controller, $controllers)) {
  if (in_array($action, $controllers[$controller])) {
    call($controller, $action);
  } else {
    call('home', 'error');
  }
} else {
  call('home', 'error');
}
