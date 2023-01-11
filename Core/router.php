<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');
//$routes = [
//    '/' => 'controllers/index.php',
//    '/view' => 'controllers/view.php',
//    '/signup' => 'controllers/signup.php',
//    '/message' => 'controllers/message.php'
//];

function routeToController($uri,$routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}
function abort($code = 404){
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

routeToController($uri,$routes);