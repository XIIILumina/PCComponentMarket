<?php
    require_once "../app/Models/project.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectID = $_POST['project_id'] ?? null;
    $title = $_POST['Title'] ?? '';
    $description = $_POST['Description'] ?? '';

    // Validējam ievadītos datus
    if (empty($projectID)) {
        $errors[] = "Project ID is required";
    }

    if (empty($title)) {
        $errors[] = "Title is required";
    }

    // Pārbaudam, vai nav validācijas kļūdu
    if (empty($errors)) {
        // Veicam datu atjaunināšanu, izmantojot modeli
        $projectModel = new projectModel();
        $result = $projectModel->updateProject($projectID, $title, $description);

        if ($result) {
            // Atjaunināšana veiksmīga, pāradresējam uz sākumlapu vai citu lapu
            header("Location: /project");
            exit;
        } else {
            $errors[] = "Failed to update project";
        }
    }
}

// Ja ir kļūdas vai nav POST pieprasījums, atgriežamies atpakaļ uz edit lapu
// un parādām kļūdas vai citus paziņojumus
$pageTitle = "Edit Project";
require_once "../app/Views/project/edit.view.php";
?>
