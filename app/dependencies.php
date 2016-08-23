<?php
/**
 * Fetch the container
 */
$container = $app->getContainer();

/**
 * PDO
 */
 /*
$container['db'] = function ($c) {
    // $db = $container['settings']['database'];
    $pdo = new PDO("mysql:host=" . $_SERVER['DB_HOST'] . ";dbname=" . $_SERVER['DB_NAME'],
        $_SERVER['DB_USER'], $_SERVER['DB_PASS']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};
*/

/*

// Flash messages
$container['flash'] = function () {
    return new \Slim\Flash\Messages();
};

*/
// Monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

/*
// Using Twig as template engine
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('templates', [
        'cache' => false //'cache'
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));
    return $view;
};

*/
