<?php
$title = "Projects";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];

        require_once "../app/Core/DBConnect.php";
        require_once "../app/Models/project.php";
        require_once "../app/Models/user.php";
        
        $userModel = new userModel();
        $projectModel = new projectModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchInput'])) {
            $searchValue = $_POST['searchInput'];
            $projectss = $projectModel->searchProjectsByName($loggedInUser['UserID'], $searchValue);
        } else {
            $projectss = $projectModel->getSharedProjectsByUser($loggedInUser['UserID']);
        }

        // Loop through projects to get users for each project
        foreach ($projectss as &$project) {
            $projectID = $project['ProjectID'];
            $users = $userModel->getUsersByProjectID($projectID);
            $project['Users'] = $users;
        }

        require_once "../app/Views/project/index.view.php";
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}
?>
