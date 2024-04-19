<?php
require "../app/Core/Session.php";
if (!isset($_SESSION['user']['Username'])) {
    header("Location: /login");
}

$title = "Calander";
require_once "../app/Views/calander/index.view.php";