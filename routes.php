<?php
return [
    '/' => 'controllers/index.php',
    '/login' => 'controllers/AuthConfirm/login.php',
    '/logout' => 'controllers/AuthConfirm/logout.php',
    '/signup' => 'controllers/signup.php',
    '/signup/create' => 'controllers/accounts/create.php',

    '/show' => 'controllers/boards/show.php',
    '/boards/create' => 'controllers/boards/create.php',
    '/boards/edit' => 'controllers/boards/edit.php',
    '/boards/edit_show' => 'controllers/boards/edit_show.php',
    '/boards/delete' => 'controllers/boards/delete.php',

    '/accounts' => 'controllers/accounts/show.php',
    '/accounts/edit' => 'controllers/accounts/edit.php',
    '/accounts/edit_show' => 'controllers/accounts/edit_show.php',
    '/accounts/delete' => 'controllers/accounts/delete.php',
];