<?php
// delete.php

// Pārbaude, vai ir norādīts projekta ID
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['project_id'])) {
    require_once "../app/Models/project.php";
    $projectModel = new projectModel();

    // Iegūstam projekta ID no formas
    $projectID = $_POST['project_id'];

    // Veicam dzēšanas darbību, izmantojot modeli
    $result = $projectModel->deleteProjectByID($projectID);

    // Pārbaudam, vai dzēšana bija veiksmīga
    if ($result) {
        // Veiksmīgs ziņojums vai pāradresācija uz citu lapu, ja nepieciešams
        header("Location: /project");
    } else {
        echo "<p>Failed to delete project.</p>";
    }
} else {
    echo "<p>Project ID not provided.</p>";
}
?>
