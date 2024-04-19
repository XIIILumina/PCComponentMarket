<?php
require "../app/Models/user.php";
require "../app/Core/Validator.php";
require "../app/Core/Session.php";

if (!isset($_SESSION['user']['Username'])) {
    header("Location: /login");
}
$userModel = new userModel();

$title = "Register";
require_once "../app/Views/user/userSettings.view.php";
