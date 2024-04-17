<?php
require_once "../app/Views/Components/head.php";
?>

<body class="bg-gray-100">
    <?php require_once "../app/Views/Components/navbar.php"; ?>

    <div class="h-screen">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-bold mb-4">Project Name : <?php echo isset($projectData['Title']) ? $projectData['Title'] : ''; ?></h1>
            <!-- Navbar -->
            <nav class="bg-gray-800 text-white p-4 mt-8">
                <ul class="flex">
                    <li><a href="/task">Settings</a></li>
                </ul>
            </nav>
            <!-- Task listing -->
            <h2 class="text-2xl font-bold mb-2">Tasks:</h2>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li><?php echo $task['Title']; ?></li>
                <?php endforeach; ?>
            </ul>



        </div>
    </div>
</body>

<?php require_once "../app/Views/Components/footer.php"; ?>
