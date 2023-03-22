
<?php
include "../function.php";
dd($result = $_SERVER['REQUEST_URI']);
$routes = [
    "/thinkingOOP/" => 'function/HomeController.php',
    "/thinkingOOP/about" => 'function/about.php'
];
$rout = $_SERVER['REQUEST_URI'];
echo $rout;

if (array_key_exists($rout, $routes)) {
    include "../" . $routes[$rout];
} else {
    dd(404);
};
