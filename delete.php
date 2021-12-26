<?php
session_start();

require_once __DIR__ . '/modules/db.php';

if (!isset($_SESSION['login'])) {
    header("Location: /login.php");
}

if (isset($_GET['token'])) {
    unlink('files/' . $_GET['token']);
    prepare("DELETE FROM files WHERE token = :token");
    execute([
        ':token' => $_GET['token']
    ]);
}

header("Location: /file.php");
