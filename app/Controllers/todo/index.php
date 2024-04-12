<?php
$title = "todo";

session_start();

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        echo "Logged in as: $username";
        require_once "../app/Views/todo/index.view.php";
    } else {
        echo "Username not found in session";
    }
}else {
    header("Location: /");
}




