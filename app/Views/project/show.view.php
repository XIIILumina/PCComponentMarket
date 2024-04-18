<?php require_once "../app/Views/Components/head.php"; ?>

<body class="bg-gray-100">
    <?php require_once "../app/Views/Components/navbar.php"; ?>

    <div class="h-screen">
        <div class="container mx-auto mt-8">
        <div class="mb-4">
                <h1 class="text-3xl font-bold">Project Name: <?php echo isset($projectData['Title']) ? htmlspecialchars($projectData['Title']) : ''; ?></h1>
                <a href="/create-task.php" class="text-blue-500 ml-4">createTask</a>
            </div>

            <!-- Task listing -->
            <h2 class="text-2xl font-bold mb-2">Tasks:</h2>
            <ul class="bg-white p-4 rounded-lg shadow-md">
                <?php foreach ($tasks as $task): ?>
                    <li class="border-b border-gray-200 py-2 flex justify-between items-center">
                        <div>
                            <span class="font-bold"><?php echo htmlspecialchars($task['Title']); ?></span>
                            <span class="ml-2 text-sm">(Deadline: <?php echo $task['Deadline']; ?>)</span>
                        </div>
                        <div>
                            <span class="text-sm"><?php echo $task['Status']; ?></span>
                            <a href="/edit-task.php?id=<?php echo $task['TaskID']; ?>" class="ml-4 text-blue-500">Edit</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <?php require_once "../app/Views/Components/footer.php"; ?>
</body>
