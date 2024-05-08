<?php
if (isset($_SESSION['user']['Username'])) {
    header("Location: /user/login");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    require "../app/Models/user.php";
    $userModel = new userModel ;




}


$title = "lost Password";
require "../app/Views/user/lostPassword.view.php";