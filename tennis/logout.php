<?php
// p280 リスト12-7
session_start();
if (isset($_SESSION['id'])) {
    unset($_SESSION['id']); // セッションをクリアする
}
header('Location: login.php');

// できた人は
// p282 check test

// Q1 ⇨ p260
// setcookie('name', '山田大介', time() + 60*30);
// Q2 ⇨ p275
// $_SESSION
// Q3 ⇨ p281
// session_destroy()
?>