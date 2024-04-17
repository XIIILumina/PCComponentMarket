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
        <form method="POST" action="/project/create" class="mb-4">
            <div class="flex items-center">
                <input type="text" name="Title" placeholder="Project Name" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                <input type="text" name="Description" placeholder="Project Description" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Add Project</button>
            </div>
        </form>
        <!-- Display existing projects -->
        <div class="mt-4">
            <h2 class="text-xl font-bold mb-2">Existing Projects:</h2>
        </div>
        <?php
            // Iegūstam visus projektus un tos attēlojam
            $projects = $projectModel->getAllProjectsByUser($loggedInUser['UserID']);
            foreach ($projects as $project) {
                echo '<a href="/project/show?id=' . $project['ProjectID'] . '"><div class="p-4">';
                echo '<div class="bg-white p-8 rounded-lg shadow-lg relative hover:shadow-2xl transition duration-500">';
                echo '<h1 class="text-2xl text-gray-800 font-semibold mb-3">' . $project['Title'] . '</h1>';
                echo '<p class="text-gray-600 leading-6 tracking-normal">' . $project['Description'] . '</p>';
                echo '</div>';
                echo '</div></a>';
            }
        ?>
  </div>
</div>
        </div>
    </div>
    </div>
</body>

<?php require_once "../app/Views/Components/footer.php"; ?>