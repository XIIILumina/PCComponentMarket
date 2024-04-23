<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../app/Models/user.php";
    $userModel = new userModel;
    $errors = [];

    if(!isset($_SESSION["user"])) {
        header("Location: /login");
    }

    if(!isset($_POST["userID"]) || !isset($_POST["newEmail"])) {
        $errors[] = 'Not all the info was provided';
    }else{

        $email = trim($_POST["newEmail"]);

        if(!Validator::Email($email)) {
            $errors[] = 'Not Valid Email';
        }

        if(!Validator::Number($_POST["userID"])) {
            $errors[] = 'Not Valid userID';
        }
    
        if(empty($error)) {
            $userModel->userChangeEmail($_POST["userID"], $email);
            header("Location: /logout");
            die();
        }

    }

}


