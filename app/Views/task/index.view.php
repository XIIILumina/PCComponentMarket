<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>

<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold mb-4">Task List</h1>

    <!-- Form for creating a new task -->
    <form action="/task/create" method="POST" class="mb-4">
        <div class="flex items-center">
            <input type="text" name="title" placeholder="Enter Task Title" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
        </div>
    </form>

    <!-- Task listing -->
    <ul class="divide-y divide-gray-300">
        <?php foreach ($tasks as $task): ?>
            <li class="py-4">
                <span><?php echo $task['Title']; ?></span>
                <div class="flex justify-end">
                    <a href="/task/delete?id=<?php echo $task['TaskID']; ?>" class="text-red-500 mr-4 hover:text-red-700">Delete</a>
                    <a href="/task/edit?id=<?php echo $task['TaskID']; ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<?php require_once "../app/Views/Components/footer.php"; ?>
