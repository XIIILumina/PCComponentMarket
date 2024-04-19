<?php
$title = "Project/Create";

require_once "../app/Models/project.php";
require_once "../app/Core/Validator.php";

$errors = [];

if (isset($_SESSION['user'])) {
    $loggedInUser = $_SESSION['user'];

    // Pārbaudiet, vai lietotājs ir pieslēdzies
    if (isset($loggedInUser['UserID'])) {
        $userID = $loggedInUser['UserID'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['Title'];
            $description = $_POST['Description'];

            // Validējam ievadītos datus
            if (!Validator::String($title, 4, 100)) {
                $errors[] = "Title must be between 4 and 100 characters";
            }

            if (!Validator::String($description, 10, 255)) {
                $errors[] = "Description must be between 10 and 255 characters";
            }

            // Ja nav validācijas kļūdu, izveidojam projektu
            if (empty($errors)) {
                $projectModel = new projectModel;
                $projectModel->createProject($userID, $title, $description);
                header("Location: /project");
                exit; // Pārliecināsimies, ka turpmāka koda izpildīšana tiek pārtraukta
            }else{
                header("Location: /project");
                exit; // Pārliecināsimies, ka turpmāka koda izpildīšana tiek pārtraukta
            }
        }
    } else {
        echo "Invalid session data";
    }
} else {
    header("Location: /");
}
require_once "../app/Views/project/index.view.php";
?>

