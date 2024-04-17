<?php
require_once "../app/Views/Components/head.php";
?>

<body class="bg-gray-100">
    <?php require_once "../app/Views/Components/navbar.php"; ?>

    <div class="h-screen">
        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-bold mb-4">Project Name : <?php echo isset($projectData['Title']) ? $projectData['Title'] : ''; ?></h1>

            <!-- Navbar -->
            <nav class="bg-gray-800 text-white p-4 mb-4">
                <ul class="flex">
                    <li class="mr-4"><a href="#">Edit</a></li>
                    <li class="mr-4"><a href="#">Create</a></li>
                    <li><a href="#">Delete</a></li>
                </ul>
            </nav>

        </div>
    </div>
</body>

<?php require_once "../app/Views/Components/footer.php"; ?>
