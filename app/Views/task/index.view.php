<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>

<div class="h-screen">
    <h1 class="text-3xl font-bold mb-4">Task List</h1>

    <!-- Form for creating a new task -->
    <!-- Forma ar dinamisku projekta izvēli -->
    <form action="/task/create" method="POST" class="mb-4">
        <div class="flex flex-col md:flex-row items-start md:items-center">
            <!-- Ievades lauks - uzdevuma nosaukums -->
            <input type="text" name="title" placeholder="Enter Task Title" class="border border-gray-300 px-4 py-2 mb-2 md:mr-2 md:mb-0 rounded-lg focus:outline-none focus:border-blue-500">

            <!-- Ievades lauks - uzdevuma termiņš -->
            <input type="date" name="deadline" class="border border-gray-300 px-4 py-2 mb-2 md:mr-2 md:mb-0 rounded-lg focus:outline-none focus:border-blue-500">

            <!-- Ievades lauks - uzdevuma statuss -->
            <select name="status" class="border border-gray-300 px-4 py-2 mb-2 md:mr-2 md:mb-0 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="Pabeigts">Pabeigts</option>
                <option value="Nepabeigts" selected>Nepabeigts</option>
            </select>

            <!-- Projekta izvēle -->
            <input type="hidden" name="project_id" id="project_id" value="<?= $_GET['id']; ?>">

            <!-- Poga - Izveidot uzdevumu -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Task</button>
        </div>
    </form>

</div>

<?php require_once "../app/Views/Components/footer.php"; ?>
