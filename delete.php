<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: /login.php");
}

if (isset($_GET['name'])) {
    unlink('files/' . $_GET['name']);
}

header("Location: /file.php");
