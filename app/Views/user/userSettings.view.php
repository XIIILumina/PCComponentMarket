<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>
<div class="h-screen">

    <a href="/logout"><button class="text-blue-500 border border-blue-500 rounded">Logout</button></a>
    <from method="POST">
        <button class="text-blue-500 border border-blue-500 rounded">Change Password</button>
    </from>
    <from method="POST">
        <button class="text-blue-500 border border-blue-500 rounded">Change Email</button>
    </from>
    <from method="POST">
        <button class="text-red-500 border border-red-500 rounded">Delete Account</button>
    </from>

</div>
<?php require_once "../app/Views/Components/footer.php"; ?>