<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    require "../app/Models/user.php";
    $userModel = new userModel;
    $errors = [];

    if(!isset($_SESSION["user"])) {
        header("Location: /login");
    }

    if(!isset($_POST["userID"]) || !isset($_POST["username"]) || !isset($_POST["userPassword"])) {
        $errors[] = 'Not all the info was provided';
    }else{

        if(!Validator::Number($_POST["userID"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(!Validator::String($_POST["username"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(!Validator::String($_POST["userPassword"])) {
            $errors[] = 'Not all the info was provided';
        }
    
        if(empty($error)) {
            $userModel->deleteUser($_POST["userID"], $_POST["username"], $_POST["userPassword"]);
            header("Location: /logout");
            die();
        }
        dd($errors);

    }

}


