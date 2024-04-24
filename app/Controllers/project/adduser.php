<?php
$title = "AddUser";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        require_once "../app/Core/DBConnect.php";
        require_once "../app/Models/user.php";
        $userModel = new userModel();
        $db = new DBConnect();
        
        // Pārbaudiet, vai ir nospiesta meklēšanas poga un saņemiet meklēšanas rezultātus
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchInputs'])) {
            $searchValue = $_POST['searchInputs'];
            $users = $userModel->searchUsers($searchValue); // Izmainīt uz atbilstošo metodi
        } else {
            $users = $userModel->getAllUsers(); // Iegūstiet visus lietotājus pēc noklusējuma
        }
        $userID = isset($_POST['userID']) ? $_POST['userID'] : null;
        $projectID = isset($_POST['projectID']) ? $_POST['projectID'] : null;
        
        $result = $userModel->addUserToProject($userID, $projectID);
        require_once "../app/Views/project/adduser.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}
?>
