<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>

<body class="bg-gray-100">
<div class="h-screen">
        <h1 class="text-3xl font-bold mb-4"><?= $pageTitle ?></h1>

        <!-- Form for editing project -->
        <form method="POST" action="/project/update">
            <input type="hidden" name="project_id" value="<?= $projectID ?>">
            <input type="text" name="Title" value="<?= $projectTitle ?>" placeholder="Project Name" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
            <input type="text" name="Description" value="<?= $projectDescription ?>" placeholder="Project Description" class="px-4 py-2 border border-gray-300 mr-2 rounded-lg">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Update Project</button>
        </form>
    </div>
</body>

<?php require_once "../app/Views/Components/footer.php"; ?>
