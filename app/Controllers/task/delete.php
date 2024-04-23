<?php



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../app/Models/task.php";
    
    $taskModel = new taskModel();
    
    if (isset($_SESSION['user'])) {

        if(isset($_POST["taskID"]) && isset($_POST["projectID"]) && !empty($_POST["taskID"]) && Validator::Number($_POST["taskID"])){
            $taskID = $_POST["taskID"];
            $projectID = $_POST["projectID"];
            $taskModel->deleteTaskByID($taskID);
            header("Location: /project/show?id=" . $projectID);
        }else{
            echo "<p>Error: Task ID not provided.</p>";
        }

    }else{
        header("Location: /user/login");
    }
    
} else {
    echo "<p>Form not submitted.</p>";
}
?>
