<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";

// Iekļaujam projektu modeli

?>

<body class="bg-gray-100">
    <div class="h-screen">
        <?php require_once "../app/Views/Components/head.php"; ?>
        <?php require_once "../app/Views/Components/navbar.php"; ?>

        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-bold mb-4">Users:</h1>

            <form id="searchForm" class="mb-4" method="POST" action="">
                <input type="text" name="searchInputs" placeholder="Meklēt" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
            </form>

            <?php
            if (!empty($users)) {
                foreach ($users as $user) {
                    echo "<form action='' method='GET'>";
                    echo "<input type='hidden' name='id'>";
                    echo "<button type='submit' class='block mb-2 text-blue-500 hover:underline bg-blue-200 rounded px-4 py-2'>{$user['Username']}</button>";
                    echo "</form>";
                }
            } else {
                echo '<h2>No users found</h2>';
            }
            ?>
        </div>
    </div>

</body>
<?php require_once "../app/Views/Components/footer.php"; ?>
