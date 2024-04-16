<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>
<div class="h-screen content-center items-center grid bg-gradient-to-r from-blue-200 from-20% via-gray-100 via%60 to-blue-300 bg-cover bg-no-repeat backdrop-blur-2xl bckdrop-rounded-3xl" >
    <div class="container mx-auto w-4/12  ">    
        <div class="backdrop-blur-xl bg-white/30  ...">
        <div class="text-center mb-8"> <!-- Added text-center class for center alignment -->
            <h1 class="text-3xl mb-4 p-4 font-bold">Login</h1> <!-- Removed mb-4 class -->
        </div>
            <form class="max-w-md mx-auto" method="post"?>
                <div class="mb-4">
                    <label for="username" class="block text-sm font-semibold mb-2">Username:</label>
                    <input type="text" value="<?= $_POST["username"] ?? null?>" id="username" name="username" required class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500">
                    <!-- Added border class -->
                </div>

                <div class="mb-4 ">
                    <label for="password" class="block text-sm font-semibold mb-2">Password:</label>
                    <input type="password" value="<?= $_POST["password"] ?? null?>" id="password" name="password" required class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500">
                    <a href="/lostPassword"><p class="text-blue-500 decoration-underline text-right ms-20">Forgot your password?</p></a>
                    <!-- Added border class -->
                </div>

                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">Login</button>
                <a href="/register"><p class="text-blue-500 decoration-underline text-left ">Dont have an account?</p></a> 
            </form>
            <?php
                if (isset($errors) && $errors != []) {
                    foreach ($errors as $error) {
                        echo "<p class='text-red-500'>$error</p>";
                    }
                }
            ?>
            
            <br><Br>    
        </div>

    </div>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>