<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>

<div class="container mx-auto mt-8">
    <div class="text-center mb-8"> <!-- Added text-center class for center alignment -->
        <h1 class="text-3xl font-bold">Login</h1> <!-- Removed mb-4 class -->
    </div>

    <form class="max-w-md mx-auto" method="post"?>
        <div class="mb-4">
            <label for="username" class="block text-sm font-semibold mb-2">Username:</label>
            <input type="text" value="<?= $_POST["username"] ?? null?>" id="username" name="username" required class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500">
            <!-- Added border class -->
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold mb-2">Password:</label>
            <input type="password" value="<?= $_POST["password"] ?? null?>" id="password" name="password" required class="w-full px-4 py-2 border border-black rounded-md focus:outline-none focus:border-blue-500">
            <!-- Added border class -->
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">Login</button>
    </form>
    <?php
        if (isset($errors) && $errors != []) {
            foreach ($errors as $error) {
                echo "<p class='text-red-500'>$error</p>";
            }
        }
    ?>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>
