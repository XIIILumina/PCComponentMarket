<?php
require "../app/Models/user.php";
require "../app/Core/Validator.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usermodel = new userModel;

    if(!isset($_POST["username"]) || !isset($_POST["password"])){
        $errors[] = "All fields are required";
    }

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if(!Validator::String($username)){
        $errors[] = "Email is not username";
    }

    if(!Validator::String($password)){
        $errors[] = "Email is not password";
    }

    if($usermodel->checkIfUserExsistsByUsername($username)){
        $errors[] = "No user with that username exists";
    }

    if(empty($errors)){

        $user = $usermodel->loginUser($username , $password);

        if($user != false){
            $_SESSION["user"] = $user;
            header("Location: /");
        }else{
            $errors[] = "Invalid password";
        }

    }

}

// Load the login view file
$title = "Login";
require_once "../app/Views/login.view.php";
?>
