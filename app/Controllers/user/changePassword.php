<?php
require "../app/Models/user.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $userModel = new userModel;
    $errors = [];

    if(!isset($_SESSION["user"])) {
        header("Location: /user/login");
    }

    if(!isset($_POST["userID"]) || !isset($_POST["username"]) || !isset($_POST["oldPassword"]) || !isset($_POST["newPassword"])) {
        $errors[] = 'Not all the info was provided';
    }else{

        $oldPassword = trim($_POST["oldPassword"]);
        $newPassword = trim($_POST["newPassword"]);

        if(!Validator::Number($_POST["userID"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(!Validator::String($_POST["username"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(!Validator::Password($oldPassword)) {
            $errors[] = 'Not all the info was provided';
        }

        if(!Validator::Password($newPassword)) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(empty($error)) {
            $response = $userModel->userChangePassword($_POST["userID"], $_POST["username"], $_POST["oldPassword"],$_POST["newPassword"]);

            if($response) {
                header("Location: /user/logout");
                die();
            } else {
                $errors['oldPassword'] = 'Failed to change password old password is not correct';
                require "../app/Views/user/userSettings.view.php";
            }
        }

    }

}


