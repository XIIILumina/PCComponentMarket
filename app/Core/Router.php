<?php

$route = parse_url($_SERVER['REQUEST_URI'])["path"];

switch ($route) {

    case '/':
        require "./app/Controllers/index.php";
        break;

    case '/login':
        require "./app/Controllers/login.php";
        break;

    case '/register':
        require "./app/Controllers/register.php";
        break;
        
    default:
        require "./app/Controllers/404.php";
        http_response_code(404);
        break;
}