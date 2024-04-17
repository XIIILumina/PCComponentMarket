<?php
$title = "Show";

require_once "../app/Core/Session.php";

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        echo "Logged in as: " . htmlspecialchars($username);
        require_once "../app/Models/project.php";

        // Pārbaudam vai ir norādīts projekta ID GET parametrā
        if (isset($_GET['id'])) {
            $projectID = $_GET['id'];
            $projectModel = new projectModel();
            $projectData = $projectModel->getProjectByID($projectID); // Jāpielāgo atbilstoši jūsu modeļiem

            if ($projectData) {
                require_once "../app/Views/project/show.view.php";
            } else {
                echo "Project not found";
            }
        } else {
            echo "Project ID not specified";
        }
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}

?>
