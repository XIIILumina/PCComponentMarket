<?php
$title = "todo";

require_once "../app/Core/Session.php";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        echo "Logged in as: " . htmlspecialchars($username);


        require_once "../app/Views/todo/index.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}
?>
