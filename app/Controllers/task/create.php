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
        $projectID = null;
        if (isset($_POST['project_id'])) {
            $projectID = strval($_POST['project_id']);
        }
        // Pārbaude, vai projekta ID ir iegūts
        if ($projectID === null) {
            echo "<p>Error: Project ID not provided.</p>";
            exit(); // Pārtrauc skripta izpildi
        }
        
        // Iegūstam datus no formas
        $title = $_POST['title'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];
        
        // Saglabājam uzdevumu datubāzē
        $result = $taskModel->createTask($userID, $projectID, $title, $deadline, $status);
        
        // Pārbaudam, vai uzdevums tika veiksmīgi saglabāts
        if ($result) {
            // Veiksmīga saglabāšanas ziņojums vai pāradresācija uz citu lapu
            header("Location: /project/show?id=" . $projectID);
            // Ja nepieciešams, varat izmantot header, lai pāradresētu uz citu lapu
            // header("Location: /success.php");
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
