<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";

// Iekļaujam projektu modeli


?>

<body class="bg-gray-100">
    <div class="h-full">
    <form id="searchForm" class="mb-4" method="POST" action="">
            <input type="text" name="searchInput" placeholder="Atrodi savu projektu" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
        </form>

        <div class="container mx-auto mt-8">
            <h1 class="text-3xl font-bold mb-4">My Projects</h1>
            <p>Title must be between 4 and 100 characters</p>
            <p>Description must be between 10 and 255 characters</p>

            <!-- Form for adding new project -->
            <form method="POST" action="/project/create" class="mb-4">
                <div class="flex items-center">
                    <input type="text" name="Title" value="<?= $_POST["Title"] ?? null ?>" placeholder="Project Name" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                    <input type="text" name="Description" value="<?= $_POST["Description"] ?? null ?>" placeholder="Project Description" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Add Project</button>
                </div>
                <?php
                if (isset($errors) && $errors != []) {
                    foreach ($errors as $error) {
                        echo "<p class='text-red-500'>$error</p>";
                    }
                }
                ?>
            </form>

            <!-- Display existing projects -->
            <div class="mt-4">
                <h2 class="text-xl font-bold mb-2">Existing Projects:</h2>
            </div>
            <?php
            // Iegūstam visus projektus un tos attēlojam

            
            if (!empty($projectss)) {
                foreach ($projectss as $projects) {
                    echo '<a href="/project/show?id=' . $projects['ProjectID'] . '">';
                    echo '<div class="p-4">';
                    echo '<div class="bg-white p-8 rounded-lg shadow-lg relative hover:shadow-2xl transition duration-500">';
                    echo '<h1 class="text-2xl text-gray-800 font-semibold mb-3">' . $projects['Title'] . '</h1>';
                    echo '<p class="text-gray-600 leading-6 tracking-normal">' . $projects['Description'] . '</p>';
  
                    echo "<ul>";
                    foreach ($projects['Users'] as $user) {

      





                        echo '<form method="POST" action="/project/removeuser" class="mb-2">';
                        echo "<li>{$user['Username']}</li>";
                        echo '<input type="hidden" name="project_id" value="' . $projects['ProjectID'] . '">';
                        echo '<button type="submit" class="text-red-500 hover:text-red-900 font-bold bg-transparent border-none">Noņemt user</button>';
                        echo '</form>';



                    }
                    echo "</ul>";

                    
                    // Pogas tiek pārkārtotas tā, lai katras pogas bloks būtu viens pēc otra vertikāli labajā augšējā stūrī
                    echo '<div class="flex flex-col-reverse items-end">';
                    echo '<form method="POST" action="/project/delete" class="mb-2">';
                    echo '<input type="hidden" name="project_id" value="' . $projects['ProjectID'] . '">';
                    echo '<button type="submit" class="text-red-500 hover:text-red-900 font-bold bg-transparent border-none">Delete</button>';
                    echo '</form>';
                    
                    echo '<form method="POST" action="/project/adduser?id=' . $projects['ProjectID'] . '" class="mb-2">';
                    echo '<input type="hidden" name="project_id" value="' . $projects['ProjectID'] . '">';
                    echo '<button type="submit" class="text-orange-500 hover:text-orange-700 font-bold bg-transparent border-none">Add User</button>';
                    echo '</form>';
                    
                    echo '<form method="POST" action="/project/edit">';
                    echo '<input type="hidden" name="project_id" value="' . $projects['ProjectID'] . '">';
                    echo '<button type="submit" class="text-green-600 hover:text-green-800 font-bold bg-transparent border-none">Edit</button>';
                    echo '</form>';
                    echo '</div>'; // Beidzas flex div
                    echo '</div>'; // Beidzas p-8 div
                    echo '</div>'; // Beidzas p-4 div
                    echo '</a>';
                }
            
            } else {
                echo '<h2>No projects found</h2>';
            }
            
            
            
            
            ?>
        </div>

    </div>

</body>
<?php require_once "../app/Views/Components/footer.php"; ?>

