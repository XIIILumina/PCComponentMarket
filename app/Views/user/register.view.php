<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>
<div class="h-screen content-center items-center grid bg-gradient-to-r from-blue-200 from-20% via-gray-100 via%60 to-blue-300 bg-cover bg-no-repeat backdrop-blur-2xl bckdrop-rounded-3xl">
    <div class=" backdrop-blur-xl p-4 bg-white/30 container mx-auto w-4/12">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Register</h1>
        </div>

        <form class="max-w-md mx-auto" method="post">
            <div class="mb-4">
                <label for="username" class="block text-sm font-semibold mb-2">Username:</label>
                <input type="text" value="<?= $_POST["username"] ?? null?>" id="username" name="username" required class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500">
                <!-- Added border class -->
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-2">Email:</label>
                <input type="email" value="<?= $_POST["email"] ?? null?>" id="email" name="email" required class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500">
                <!-- Added border class -->
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold mb-2">Password:</label>
                <input type="password" value="<?= $_POST["password"] ?? null?>"  id="password" name="password" required class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500">
                <!-- Added border class -->
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">Register</button>
        </form>

        <?php
            if (isset($errors) && $errors != []) {
                foreach ($errors as $error) {
                    echo "<p class='text-red-500'>$error</p>";
                }
            }
        ?>
        <a href="/login"><p class="text-blue-500 decoration-underline text-center">Have a account?</p></a>
    </div>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>
