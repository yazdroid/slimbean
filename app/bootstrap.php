<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \RedBeanPHP\R as R;

// Enviroment variables
require __DIR__ . '/enviroment.php';

//load settings
$settings = require __DIR__ . '/settings.php';

//initialize RedBean ORM
$conn = $settings['settings']['database']['connections'][$settings['settings']['database']['default']];
switch($conn['driver']) {
  case 'mysql':
    R::setup ($conn['driver'] . ':host=' . $conn['host'] . '; dbname=' . $conn['database'], $conn['username'], $conn['password']);
    break;
  case 'sqlite':
    R::setup ($conn['driver'] . ':' . $conn['database']);
    break;
}


$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/dependencies.php';

// Register middleware
//*require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/routes.php';

// OR
// Register routes
/*
$routes = scandir(__DIR__ . '/../src/Routes/');
foreach ($routes as $route) {
    if (strpos($route, '.php')) {
        require __DIR__ . '/../src/Routes/' . $route;
    }
}
*/

// Run
$app->run();
