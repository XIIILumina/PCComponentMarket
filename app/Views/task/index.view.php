<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>

<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4">Task List</h1>

    <!-- Form for creating a new task -->
    <form action="/task/create" method="POST" class="mb-4">
        <div class="flex items-center">
            <input type="text" name="title" placeholder="Enter Task Title" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
            <input type="date" name="deadline" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
            <select name="status" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="Pabeigts">Pabeigts</option>
                <option value="Nepabeigts" selected>Nepabeigts</option>
            </select>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
        </div>
    </form>

    <!-- Task listing -->
    <ul class="divide-y divide-gray-300">
        <!-- <?php foreach ($tasks as $task): ?>
            <li class="py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="font-bold"><?php echo htmlspecialchars($task['Title']); ?></span>
                        <span class="ml-2 text-sm">(Deadline: <?php echo $task['Deadline']; ?>)</span>
                    </div>
                    <div>
                        <span class="text-sm <?php echo ($task['Status'] === 'Pabeigts') ? 'text-green-500' : 'text-red-500'; ?>"><?php echo $task['Status']; ?></span>
                        <a href="/task/edit?id=<?php echo $task['TaskID']; ?>" class="ml-4 text-blue-500 hover:text-blue-700">Edit</a>
                        <a href="/task/delete?id=<?php echo $task['TaskID']; ?>" class="ml-4 text-red-500 hover:text-red-700">Delete</a>
                    </div>
                </div>
            </li>
        <?php endforeach; ?> -->
    </ul>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>
