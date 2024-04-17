<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>
<div class="h-screen bg-white shadow-xl h-6 w-auto grid content-right text-white py-1 px-1 hover:shadow-3xl transition duration-500">

    <a href="/logout"><button class="bg-blue-500 p-1 border border-blue-500 rounded-lg">Logout</button></a>
    <from method="POST">
        <button class="bg-blue-500 text-white p-1 border border-blue-500 rounded-lg">Change Password</button>
    </from>
    <from method="POST">
        <button class="bg-blue-500 text-white p-1 border border-blue-500 rounded-lg">Change Email</button>
    </from>
    <from method="POST">
        <button class="bg-red-500 text-white p-1 border-red-500 rounded">Delete Account</button>
    </from>

</div>
<?php require_once "../app/Views/Components/footer.php"; ?>