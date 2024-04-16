<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";

// Iekļaujam projektu modeli
require_once "../app/Models/project.php";
$projectModel = new projectModel();

?>

<body class="bg-gray-100">
    <div class="h-screen">
        <h1>Hello from projects</h1>

        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-bold mb-4">My Projects</h1>

            <!-- Form for adding new project -->
            <form method="POST" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="Title" placeholder="Project Name" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                    <input type="text" name="Description" placeholder="Project Description" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Add Project</button>
                </div>
            </form>
        </div>
    </div>
</body>

<?php require_once "../app/Views/Components/footer.php"; ?>
