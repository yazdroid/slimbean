<?php

use \RedBeanPHP\R as R;

// Routes


$app->get('/users[/{name}]', function($request, $response, $args){
  return "Hello " . $args['name'];

});



$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    //$this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    $vlr = isset($args["name"]) ? $args["name"] : "";

    $data = R::findAll('teste');
    print_r($data);
    return "Everything is OK!";
    //$this->renderer->render($response, 'index.phtml', $args);
});
