<?php
$title = "AddUser";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        require_once "../app/Models/user.php";
        $userModel = new userModel();
        
        // Pārbaudiet, vai ir nospiesta meklēšanas poga un saņemiet meklēšanas rezultātus
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchInputs'])) {
            $searchValue = $_POST['searchInputs'];
            $users = $userModel->searchUsers($searchValue); // Izmainīt uz atbilstošo metodi
        } else {
            $users = $userModel->getAllUsers(); // Iegūstiet visus lietotājus pēc noklusējuma
        }
        require_once "../app/Views/project/adduser.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}
?>
