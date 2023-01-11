<?php

//錯誤顯示（開發暫時使用）
ini_set('display_errors','1');
error_reporting(E_ALL);

const BATH_PATH = __DIR__ . '/../';

require BATH_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {

    $class = str_replace('\\',DIRECTORY_SEPARATOR,$class);

    require base_path("{$class}.php");
});

require base_path('Core/router.php');