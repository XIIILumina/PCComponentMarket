<?php
/*
    Can add the routs and the conntroller
*/
$routes = [
    '/' => '../app/Controllers/index.php',
    '/login' => '../app/Controllers/login.php',
    '/register' => '../app/Controllers/register.php',
];

//The router
$url = parse_url($_SERVER['REQUEST_URI'])["path"];

if (array_key_exists($url, $routes)) {
    require $routes[$url];
}else{
    http_response_code(404);
    require "../app/Controllers/404.php";
}


