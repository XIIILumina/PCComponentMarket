<?php
$title = "Projects";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        // echo "Logged in as: " . htmlspecialchars($username);
        require_once "../app/Core/DBConnect.php";
        require_once "../app/Models/project.php";
        $projectModel = new projectModel();
        $db = new DBConnect();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchInput'])) {
            $searchValue = $_POST['searchInput'];
            $projects = $projectModel->searchProjectsByName($loggedInUser['UserID'], $searchValue);
        }else{
            $projects = $projectModel->getAllProjectsByUser($loggedInUser['UserID']);
        }
        
        require_once "../app/Views/project/index.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}
?>
