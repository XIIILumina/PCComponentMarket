<?php
if (isset($_SESSION['user']['Username'])) {
    header("Location: /user/login");
    exit(); // Lai novērstu turpmāku kodu izpildi
}
$errors = [];
if($_SERVER["REQUEST_METHOD"] == "POST") {

    require "../app/Models/user.php";
    $userModel = new userModel ;

    if(isset($_POST['email'])) 
    {

        if(Validator::Email($_POST['email']))
        {
            $errors[] =  "Please enter a valid email address.";
        }

        if($userModel->checkIfUserExsistsByEmail($_POST['email']))
        {
            $errors[] =  "Please enter a valid email linked to a account";
        }
        
    } else {
        $errors[] =  "Please enter your email address.";
    }


    if(empty($errors))
    {
        header("Location: /user/editPassword");
    }

}

$title = "Lost Password";
require "../app/Views/user/lostPassword.view.php";
?>
