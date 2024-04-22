<?php


// Iekļaujam nepieciešamās klases
require_once "../app/Core/DBConnect.php";
require_once "../app/Models/project.php";

// Pārbaudam, vai ir GET pieprasījums ar vaicājumu un vai sesija ir aktīva
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query']) && !empty($_GET['query']) && isset($_SESSION['user'])) {
    // Sagatavojam datus
    $searchQuery = $_GET['query'];
    $userID = $_SESSION['user']['UserID'];

    // Izveidojam savienojumu ar datubāzi un iegūstam projekta modeli
    $db = new DBConnect();
    $projectModel = new projectModel();

    // Veicam meklēšanu pēc projekta nosaukuma un atgriežam rezultātus
    $searchResults = $projectModel->searchProjectsByName($userID, $searchQuery);

    // Atgriežam rezultātus kā JSON
    header('Content-Type: application/json');
    echo json_encode($searchResults);
    exit;
} else {
    // Ja nav pareizi sagatavots GET pieprasījums, atgriežam tukšu JSON masīvu
    header('Content-Type: application/json');
    echo json_encode([]);
    exit;
}
?>
