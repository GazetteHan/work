<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">-->
</head>
<body>
<?php
if( !session_id() ) {session_start();}

require_once "../vendor/autoload.php";

use Illuminate\Support\Arr;
use \Tamtamchik\SimpleFlash\Flash;

//d($_SERVER);

$array = [
    ["marlin" => ["course" => "HTML"]],
    ["marlin" => ["course" => "PHP"]]
];
Arr::pluck($array, 'marlin.course');
//var_dump($result);

if( !session_id() ) {
    session_start();
}





$flash = new Flash();
$flash->display();
$flash->error('error');

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/DeepOOP/home', ['app\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/DeepOOP/about/{amount:\d+}', ['app\controllers\HomeController', 'about']);
    // {id} must be a number (\d+) //user/1
// $r->addRoute('GET', '/user/{id:\d+}', 'get_user_handler');
// The /{title} suffix is optional
// $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

d($routeInfo);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        d($handler[0]);
        $controller = new $handler[0];
        d($controller);
        call_user_func([$controller, $handler[1]], $vars);
        break;
}





