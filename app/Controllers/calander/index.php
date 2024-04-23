<?php
if (!isset($_SESSION['user']['Username'])) {
    header("Location: /user/login");
}

$title = "Calander";
require_once "../app/Views/calander/index.view.php";