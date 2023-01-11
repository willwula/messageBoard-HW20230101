<?php
$name = htmlspecialchars($_SESSION['name']);
$level = htmlspecialchars($_SESSION['level']);
//    dd($_SESSION);
if ($name && $level == '2') {
    echo "<a href='/accounts'>AccMGT</a>";
    echo "<a href='/show'>View</a>";
    echo "<a href='/boards/create'>Write some messages</a>";
    echo "<a href='/logout'>Log out</a>";

}   elseif ($name && $level == '1') {
    echo "<a href='/show'>View</a>";
    echo "<a href='/boards/create'>Write some messages</a>";
    echo "<a href='/logout'>Log out</a>";
}
else {
    echo "<a href='/'>Log in</a>";
}
