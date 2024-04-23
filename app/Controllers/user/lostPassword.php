<?php
if (isset($_SESSION['user']['Username'])) {
    header("Location: /user/login");
}

$title = "lost Password";
require "../app/Views/user/lostPassword.view.php";