<?php
@$name = htmlspecialchars($_SESSION['name']);
@$level = htmlspecialchars($_SESSION['level']);
//    dd($_SESSION);
if ($name && $level == '2') {
    echo "<a href='/accounts'>會員總覽</a>";
    echo "<a href='/show'>管理留言</a>";
    echo "<a href='/boards/create'>留言不流涎</a>";
    echo "<a href='/logout'>登出</a>";

}   elseif ($name && $level == '1') {
    echo "<a href='/showAll'>全部留言</a>";
    echo "<a href='/show'>已發布留言</a>";
    echo "<a href='/boards/create'>留言不流涎</a>";
    echo "<a href='/logout'>登出</a>";
}
else {
    echo "<a href='/visit'>訪客瀏覽</a>";
    echo "<a href='/'>登入</a>";
    echo "<a href='/signup'>註冊會員</a>";
}
