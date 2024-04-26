<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>

<div class="h-screen content-center items-center grid bg-gradient-to-r from-blue-200 from-20% via-gray-100 via%60 to-blue-300 bg-cover bg-no-repeat backdrop-blur-2xl bckdrop-rounded-3xl" >
    <div class="container mx-auto w-4/12  ">
    <div class="backdrop-blur-xl p-4 bg-white/30 shadow-inner shadow-xl ...">
        <div class="text-center mb-8">
            <h1 class="text-xl text-b"><b>Change your Password</b> <h1>
            </div>
            <form class="max-w-md mx-auto" method="post"?>
            <p class="text-align-left "> Password</p>
                <div class="mb-4 ">
                    <form action="/user/changePassword" method="POST">
        <input type="password" name="newPassword" placeholder="New password" class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500" required>
        <button type="submit" class="mt-1 w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline" href="/user/login">Change Password</button>
    </form>
    <p class="text-red-500"><?=$errors['oldPassword'] ?? ''?><p>
            </div>
            </form>
            <?php
                if (isset($errors) && $errors != []) {
                    foreach ($errors as $error) {
                        echo "<p class='text-red-500'>$error   yo balls are black like</p>";
                    }
                }
            ?>
        </div>
        </div>
        
        <p>GG</p>
    </div>
</div>


    </div>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>