<?php
// task/create.php

// Pārbaude, vai forma ir iesniegta
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'], $_POST['deadline'], $_POST['status'])) {
    // Iekļaujam modeli
    require_once "../app/Models/task.php";
    
    // Izveidojam jaunu instanci no taskModel
    $taskModel = new taskModel();
    
    // Pārbaudam sesiju un iegūstam lietotāja ID
    if (isset($_SESSION['user']['UserID'])) {
        $userID = $_SESSION['user']['UserID'];
        
        if (isset($_POST['project_id']) && !empty($_POST['project_id'])) {
            $projectID = intval($_POST['project_id']); // Pārveidojam par veselu skaitli
        } else {
            echo "<p>Error: Project ID not provided or invalid.</p>";
            exit(); // Pārtraucam skriptu
        }
        // Iegūstam datus no formas
        $title = $_POST['title'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];
        $projectID = $_POST['project_id']; // Šeit iegūstam izvēlēto projekta ID
        
        // Saglabājam uzdevumu datubāzē
        $result = $taskModel->createTask($userID, $projectID, $title, $deadline, $status);
        
        // Pārbaudam, vai uzdevums tika veiksmīgi saglabāts
        if ($result) {
            // Veiksmīga saglabāšanas ziņojums vai pāradresācija uz citu lapu
            header("Location: /project/show?id=" . $projectID);
        } else {
            echo "<p>Failed to create task.</p>";
        }
    } else {
        echo "<p>User ID not found.</p>";
    }
} else {
    echo "<p>Form not submitted.</p>";
}
?>
