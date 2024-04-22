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

    
        if(!Validator::Email($_POST["newEmail"])) {
            $errors[] = 'Not Valid Email';
        }
    
        if(empty($error)) {
            $userModel->userChangeEmail($_POST["userID"], $_POST["newEmail"]);
            header("Location: /logout");
            die();
        }
        dd($errors);

    }

}


