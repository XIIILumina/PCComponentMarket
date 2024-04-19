<?php
$title = "Project/Create";


if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Check if the 'Username' key exists in the user data
    if (isset($loggedInUser['Username'])) {
        $username = $loggedInUser['Username'];
        echo "Logged in as: " . htmlspecialchars($username);
        require_once "../app/Models/project.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {

            $UserID = $_SESSION['user']['UserID']; // Pielāgojiet šo atbilstoši jūsu sesijas struktūrai
            $Title = $_POST['Title'];
            $Description = $_POST['Description'];



            $projectModel = new projectModel;
            $projectModel->createProject($UserID, $Title, $Description);
            header("Location: /project");
        }
    } else {
        echo "Username not found in session";
    }
} else {
    header("Location: /");
}
?>
