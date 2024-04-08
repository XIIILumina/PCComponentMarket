<?php

$route = parse_url($_SERVER['REQUEST_URI'])["path"];

switch ($route) {
    case '/':
        require "./Controllers/book.controllers.php";
        break;
        
    default:
        require "./Controllers/404.php";
        http_response_code(404);
        break;
}