<?php
$title = "task";

require_once "../app/Models/task.php";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Pārbaudiet, vai ir norādīts 'Username' atslēgas vārds lietotāja datus
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        
        // Pārsūtiet projektus uz skatu
        require_once "../app/Views/task/index.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}


require_once "../app/Views/task/index.view.php";
?>



