<!doctype html>
<html lang="zh-TW" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <title><?= $heading ?? '西斯寵物聯誼Orz' ?></title>
</head>
<?php
    include base_path('style.html');
    if (!isset($_SESSION)) {
        session_start();
    }
?>
<body>
<div class="flex-center position-ref full-height">