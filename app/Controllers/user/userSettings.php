<?php
require "../app/Models/user.php";
require "../app/Core/Validator.php";
$userModel = new userModel();

$title = "Register";
require_once "../app/Views/user/userSettings.view.php";
