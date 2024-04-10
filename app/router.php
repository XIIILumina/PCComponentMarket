<?php

$url = parse_url($_SERVER['REQUEST_URI'])["path"];

<<<<<<< HEAD
$routes = require "../routers.php";
=======
$routes = require "../app/routs.php";
>>>>>>> refs/remotes/origin/main

if (array_key_exists($url, $routes)) {
    require $routes[$url];
}else{
    http_response_code(404);
    require "../app/Controllers/404.php";
}


