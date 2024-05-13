<?php
require_once "../app/Models/calander.php";

$taskModel = new calendarModel();
$calendar = $taskModel->calendarGetTasks();

if (!isset($_SESSION['user']['Username'])) {
    header("Location: /user/login");
    exit(); // It's important to exit after a header redirect to prevent further execution
}

$title = "Calendar";
require_once "../app/Views/calander/index.view.php";

