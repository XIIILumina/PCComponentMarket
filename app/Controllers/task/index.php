<?php
$title = "task";

require_once "../app/Core/Session.php";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        echo "Logged in as: " . htmlspecialchars($username);


        require_once "../app/Views/task/index.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}





// Iegūstam visus uzdevumus no datubāzes, izmantojot tasksModel
require_once "../app/Models/task.php";
$tasksModel = new taskModel();
$tasks = $tasksModel->getAllTasksByUser($loggedInUser['UserID']);

// Iekļaujam skatu (view)
require_once "../app/Views/task/index.view.php";
?>



