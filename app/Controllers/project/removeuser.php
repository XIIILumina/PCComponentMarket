<?php
// removeuser.php

// Iekļaujam nepieciešamos failus un klases
require_once "../app/Models/user.php"; // Aizstājiet ceļu atbilstoši jūsu faila atrašanās vietai
$userModel = new userModel(); // Izveidojam userModel objektu

// Pārbaudām, vai ir saņemti POST dati
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['project_id']) && isset($_POST['username'])) {
    $projectID = $_POST['project_id'];
    $userID = $userModel->getUserIdByName($_POST['username'])['UserID'];
    // Izsaucam removeUserFromProject metodi, lai noņemtu lietotāju no projekta
    $result = $userModel->removeUserFromProject($userID, $projectID);

    // Pārbaudam rezultātu un veicam atbilstošas darbības
    if ($result) {
        // Ja lietotājs ir veiksmīgi noņemts, var izvadīt ziņojumu vai veikt kādas citas darbības
        header("Location: /project");
    } else {
        // Ja kaut kas nogāja greizi, var izvadīt kļūdas ziņojumu vai veikt nepieciešamās darbības
        echo "Error: Failed to remove user from project.";
    }
} else {
    // Ja nepieciešamie dati nav nodoti, izvadam kļūdas ziņojumu
    echo "Error: Required data not provided.";
}
?>
