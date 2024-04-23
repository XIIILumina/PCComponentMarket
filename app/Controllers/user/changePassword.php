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
            $userModel->userChangePassword($_POST["userID"], $_POST["username"], $_POST["oldPassword"],$_POST["newPassword"]);
            header("Location: /user/logout");
            die();
        }

    }

}


