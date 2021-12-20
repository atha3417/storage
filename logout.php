<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: /login.php");
}

$_SESSION['login'] = null;
$_SESSION = [];
session_destroy();
session_unset();

header("Location: /login.php");
