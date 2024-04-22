<?php require_once "../app/Views/Components/head.php"; ?>
<?php require_once "../app/Views/Components/navbar.php"; ?>
<div class="h-screen bg-white shadow-xl h-6 w-auto grid content-right text-white py-1 px-1 hover:shadow-3xl transition duration-500">

    <h1 class="text-black text-3xl">User Settings</h1>
    <p class="text-black text-2xl">Username: <?= $_SESSION['user']['Username'] ?? '' ?></p>
    <p class="text-black text-2xl">User email: <?= $_SESSION['user']['Email'] ?? '' ?></p>

    <from>
        <a href="/logout"><button class="bg-blue-500 p-1 border border-blue-500 rounded-lg">Logout</button></a>
    </from>

    <from action="/user/changePassword" method="POST">
        <input type="oldPassword" name="oldPassword" placeholder="old Password" class="p-1 border border-blue-500 rounded-lg" required>
        <input type="password" name="newPassword" placeholder="New password" class="p-1 border border-blue-500 rounded-lg" required>
        <button type="submit" class="bg-blue-500 text-white p-1 border border-blue-500 rounded-lg">Change Password</button>
    </from>

    <from action="/user/changeEmail" method="POST">
        <input type="email" name="newEmail" placeholder="New Email" class="p-1 border border-blue-500 rounded-lg" required>
        <button type="submit" class="bg-blue-500 text-white p-1 border border-blue-500 rounded-lg">Change Email</button>
    </from>

    <form action="/user/delete" method="POST">
        <input type="hidden" id="userID" name="userID" value="<?= $_SESSION['user']['UserID'] ?? '' ?>">
        <input type="hidden" id="username" name="username" value="<?= $_SESSION['user']['Username'] ?? '' ?>">
        <input type="hidden" id="userPassword" name="userPassword" value="<?= $_SESSION['user']['Password'] ?? '' ?>">
        <button type="submit" class="bg-red-500 text-white p-1 border-red-500 rounded-lg">Delete Account</button>
    </form>

</div>
<?php require_once "../app/Views/Components/footer.php"; ?>