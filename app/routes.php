<?php

/*
    Can add the routs and the conntroller
*/

return [
    '/' => '../app/Controllers/index.php',
    '/login' => '../app/Controllers/user/login.php',
    '/register' => '../app/Controllers/user/register.php',
    '/logout' => '../app/Controllers/user/logout.php',
    '/lostPassword' => '../app/Controllers/user/lostPassword.php',
    '/userSettings' => '../app/Controllers/user/userSettings.php',
    '/task' => '../app/Controllers/task/index.php',
    '/task/create' => '../app/Controllers/task/create.php',
    '/task/delete' => '../app/Controllers/task/index.php',
    '/task/show' => '../app/Controllers/task/index.php',
    '/task/edit' => '../app/Controllers/task/index.php',
    '/calander' => '../app/Controllers/calander/index.php',
    '/calander/create' => '../app/Controllers/calander/index.php',
    '/calander/delete' => '../app/Controllers/calander/index.php',
    '/calander/show' => '../app/Controllers/calander/index.php',
    '/calander/edit' => '../app/Controllers/calander/index.php',
    '/project' => '../app/Controllers/project/index.php',
    '/project/create' => '../app/Controllers/project/create.php',
    '/project/delete' => '../app/Controllers/project/delete.php',
    '/project/show' => '../app/Controllers/project/show.php',
    '/project/search' => '../app/Controllers/project/search.php',
    '/project/edit' => '../app/Controllers/project/edit.php',
];