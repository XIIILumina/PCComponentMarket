<?php
// Pielāgojam šo kodu atbilstoši jūsu kontroliera loģikai un datubāzes pieprasījumiem
require_once "../app/Models/project.php";

// Iegūstam projektu informāciju pēc ID
$projectID = $_POST['project_id'] ?? null;
if (!$projectID) {
    // Varat izvadīt kļūdu vai pāradresēt uz kaut ko citu
    die("Error: Project ID not provided");
}

$projectModel = new projectModel();
$project = $projectModel->getProjectByID($projectID);

// Padodam nepieciešamos datus skatam
$pageTitle = "Edit Project";
$projectID = $project['ProjectID'] ?? '';
$projectTitle = $project['Title'] ?? '';
$projectDescription = $project['Description'] ?? '';

// Iekļaujam skatu
require_once "../app/Views/project/edit.php";
?>





