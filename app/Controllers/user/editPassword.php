<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['email'])) {
        require "../app/Models/user.php"; // Iekļaujam UserModel klasi
        $userModel = new UserModel(); // Inicializējam UserModel objektu


    } else {
        // Kļūdas paziņojums, ja e-pasts nav norādīts
        $errorMessage = "Please enter your email address.";
    }
}

// Ielādējam lapu ar paroles maiņas veidlapu
$title = "Lost Password";
require "../app/Views/user/editPassword.view.php";


