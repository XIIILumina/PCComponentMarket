<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>

<div class="h-screen">
    <h1 class="text-3xl font-bold mb-4">Task List</h1>

    <!-- Form for creating a new task -->
    <!-- Forma ar dinamisku projekta izvēli -->
<form action="/task/create" method="POST" class="mb-4">
    <div class="flex items-center">
        <input type="text" name="title" placeholder="Enter Task Title" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
        <input type="date" name="deadline" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
        <select name="status" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
            <option value="Pabeigts">Pabeigts</option>
            <option value="Nepabeigts" selected>Nepabeigts</option>
        </select>
        <!-- Projekta izvēle -->
        <select name="project_id" class="border border-gray-300 px-4 py-2 mr-2 rounded-lg focus:outline-none focus:border-blue-500">
            <?php foreach ($projects as $project): ?>
                <option value="<?php echo $project['ProjectID']; ?>"><?php echo htmlspecialchars($project['Title']); ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
    </div>
</form>

</div>

<?php require_once "../app/Views/Components/footer.php"; ?>
