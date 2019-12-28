<?php

// Initializate Doctrine and Twig
require_once 'bootstrap.php';

function defaultHandler ($em) {
    return [
        'template'    => 'main.html',
        'params' => [
            'title' => 'Товары'
        ]
    ];
};

// Route URL
$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'defaultHandler');
    $r->addRoute('GET', '/index.php', 'defaultHandler');
    $r->addRoute('GET', '/create_product', 'createProduct');
    $r->addRoute('POST', '/create_product', 'createProduct');
    $r->addRoute('GET', '/list_products', 'listProducts');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI']);

// Run action
$routeInfo = $dispatcher->dispatch($httpMethod, $uri['path']);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
        break;

    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $twigParams = $handler($entityManager);

        $template = $twig->load($twigParams['template']);
        echo $template->render($twigParams['params']);
}

