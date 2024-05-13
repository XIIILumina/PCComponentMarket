<?php require_once "../app/Views/Components/head.php"; ?>
<?php  require_once "../app/Views/Components/navbar.php"; ?> 

<body class="h-screen bg-gradient-to-r from-blue-200 from-20% via-gray-100 via%60 to-blue-300 bg-cover bg-no-repeat backdrop-blur-2xl bckdrop-rounded-3xl">
        
    <div class="flex justify-end p-5">
        <a href="/user/logout">
            <button class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Logout</button>   
        </a>
    </div>

        <div class="flex justify-center px-5 py-10">
            <div class="w-full max-w-4xl">
                <div class="bg-white dark:bg-zinc-800 shadow-lg p-6 space-y-6 rounded-lg">

                <h1 class="text-black dark:text-white text-3xl font-semibold">User Settings</h1>
                            
                <p class="text-black dark:text-white text-xl">Username: <?= $_SESSION['user']['Username'] ?? '' ?></p> <span id="usernameDisplay"> </span></p>
                 <p class="text-black dark:text-white text-xl">User email: <?= $_SESSION['user']['Email'] ?? '' ?></p> <span id="emailDisplay"></span></p>
                
                <form action="/user/changePassword" method="POST" class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                    <input type="hidden" id="userID" name="userID" value="<?= $_SESSION['user']['UserID'] ?? '' ?> ">
                    <input type="hidden" id="username" name="username" value="<?= $_SESSION['user']['Username'] ?? '' ?>">
                    <input type="password" name="oldPassword" placeholder="old Password" class="p-1 border border-blue-500 rounded-lg text-black" required>
                    <input type="password" name="newPassword" placeholder="New password" class="p-1 border border-blue-500 rounded-lg text-black" required>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-3 rounded-lg">Change Password</button>
                </form>
                <p class="text-red-500"><?=$errors['oldPassword'] ?? ''?><p>

                <form action="/user/changeEmail" method="POST" class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                    <input type="hidden" id="userID" name="userID" value="<?= $_SESSION['user']['UserID'] ?? '' ?> ">
                    <input type="email" id="newEmail" name="newEmail" placeholder="New Email" class="p-1 border border-blue-500 rounded-lg text-black" required>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-3 rounded-lg">Change Email</button>
                </form>
                <form action="/user/delete" method="POST" class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                    <input type="hidden" id="userID" name="userID" value="<?= $_SESSION['user']['UserID'] ?? '' ?> ">
                    <input type="hidden" id="username" name="username" value="<?= $_SESSION['user']['Username'] ?? '' ?>">
                    <input type="password" id="userPassword" name="userPassword" placeholder="Your password" class="p-1 border border-blue-500 rounded-lg text-black" required>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white p-3 rounded-lg">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</body>

