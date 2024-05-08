<?php require_once "../app/Views/Components/head.php"; ?>
<?php  require_once "../app/Views/Components/navbar.php"; ?> 

<body class="h-screen  bg-gradient-to-r from-blue-200 from-20% via-gray-100 via%60 to-blue-300 bg-cover bg-no-repeat backdrop-blur-2xl bckdrop-rounded-3xl">
        
    <div class="flex justify-end p-5">
            <a href="/user/logout">
                <button class="text-white bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded">Logout</button>   
            </a>
        </div>
    </div>
    
    <div class="flex justify-center px-5 py-10">
        <div class="w-full max-w-4xl">
            <div class="bg-white dark:bg-zinc-800 shadow-lg p-6 space-y-6 rounded-lg">
                <h1 class="text-black dark:text-white text-3xl font-semibold">User Settings</h1>
                
                <p class="text-black dark:text-white text-xl">Username: <span id="usernameDisplay"></span></p>
                <p class="text-black dark:text-white text-xl">User email: <span id="emailDisplay"></span></p>

                <div class="space-y-4">
                    <form action="/user/changePassword" method="POST" class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                        <input type="hidden" id="userID" name="userID" value="12345">
                        <input type="hidden" id="username" name="username" value="User123">
                        <input type="password" name="oldPassword" placeholder="Old Password" class="p-3 border border-blue-500 rounded-lg" required>
                        <input type="password" name="newPassword" placeholder="New Password" class="p-3 border border-blue-500 rounded-lg" required>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-3 rounded-lg">Change Password</button>
                    </form>
                    <p class="text-red-500"></p>
                    <form action="/user/changeEmail" method="POST" class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                        <input type="hidden" id="userID" name="userID" value="12345">
                        <input type="email" name="newEmail" placeholder="New Email" class="p-3 border border-blue-500 rounded-lg" required>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white p-3 rounded-lg">Change Email</button>
                    </form>
                    <form action="/user/delete" method="POST" class="flex flex-col space-y-2 md:flex-row md:space-x-3 md:space-y-0">
                        <input type="hidden" name="userID" value="12345">
                        <input type="password" placeholder="Your password" class="p-3 border border-blue-500 rounded-lg" required>
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white p-3 rounded-lg">Delete Account</button>
                    </form>
                    <p class="text-red-500"></p>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- <php require_once "../app/Views/Components/footer.php"; ?> -->