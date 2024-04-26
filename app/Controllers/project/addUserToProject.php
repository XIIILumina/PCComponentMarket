<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = [];
    if(!isset($_POST['userID']) || !isset($_POST['projectID'])) {

        require_once "../app/Models/user.php";
        $userModel = new userModel();

        $userID = $_POST['UserID'];
        $projectID = $_POST['projectID'];

        // if(!Validator::Number($userID)){
        //     $error[] = "UserID error";
        // }
        // if(!Validator::Number($projectID)){
        //     $error[] = "ProjectId error";
        // }
                
        if(empty($error)) {
            $userModel->addUserToProject($userID, $projectID);
            header("Location: /project/");
        }else{
            echo "<p>Error: UserID or ProjectID not provided.</p>";
        }

    }
}