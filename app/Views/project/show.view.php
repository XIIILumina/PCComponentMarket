<?php
require_once "../app/Views/Components/head.php";
require_once "../app/Views/Components/navbar.php";
?>

<body class="bg-gray-100">
<div class="h-screen">
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4">Project Details</h1>
        <div class="bg-white p-4 rounded-lg shadow-md">
            <?php if ($projectData) : ?>
                <h2 class="text-xl font-bold mb-2"><?php echo isset($projectData['Title']) ? $projectData['Title'] : ''; ?></h2>
                <p><?php echo isset($projectData['Description']) ? $projectData['Description'] : ''; ?></p>
                <p><strong>Deadline:</strong> <?php echo isset($projectData['Deadline']) ? $projectData['Deadline'] : ''; ?></p>
                <!-- Papildu informācija, kuru jūs vēlaties attēlot -->
            <?php else : ?>
                <p>Project not found</p>
            <?php endif; ?>
        </div>
    </div>
    </div>
</body>

<?php require_once "../app/Views/Components/footer.php"; ?>
