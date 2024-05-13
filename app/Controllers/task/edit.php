<?php
// task/edit.php
require_once "../app/Models/task.php";
$taskModel = new taskModel();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'], $_POST['deadline'], $_POST['status'])) {
    // Iekļaujam modeli
    
    // Pārbaudam sesiju un iegūstam lietotāja ID
    if (isset($_SESSION['user']['UserID'])) {
        $userID = $_SESSION['user']['UserID'];
        
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $projectID = intval($_POST['id']); // Pārveidojam par veselu skaitli
        }

        // Iegūstam datus no formas
        $title = $_POST['title'];
        $deadline = $_POST['deadline'];
        $status = $_POST['status'];
        $projectID = $_POST['id']; // Šeit iegūstam izvēlēto projekta ID
        
        // Saglabājam uzdevumu datubāzē
        $taskModel->updateTaskByID($projectID, $title, $deadline, $status);
        header("Location: /project/show?id=" . intval($_POST['project_id']));
        die();
    } else {
        echo "<p>User ID not found.</p>";
    }
} else {
    $task = $taskModel->getTaskByID($_GET['id']);
    require_once "../app/Views/task/edit.view.php";
}
?>
