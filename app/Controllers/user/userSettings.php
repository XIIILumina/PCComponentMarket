<?php
require "../app/Models/user.php";

if (!isset($_SESSION['user']['Username'])) {
    header("Location: /user/login");
}

$userModel = new userModel();

$title = "User settings";
require_once "../app/Views/user/userSettings.view.php";
