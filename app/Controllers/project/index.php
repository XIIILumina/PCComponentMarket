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
        
        // Create an instance of the projectModel class
        $projectModel = new projectModel();

        // No need to create a new DBConnect instance here

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchInput'])) {
            $searchValue = $_POST['searchInput'];
             $projectss = $projectModel->searchProjectsByName($loggedInUser['UserID'], $searchValue);
            // $projectss = $projectModel->getSharedProjectsByUser($loggedInUser['UserID'], $searchValue);
            
        } else {
            // Get projects owned by the user
            // $projects = $projectModel->getAllProjectsByUser($loggedInUser['UserID']);
            $projectss = $projectModel->getSharedProjectsByUser($loggedInUser['UserID']);
        }
 

 

        require_once "../app/Views/project/index.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}
?>
