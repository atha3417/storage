<?php
session_start();
require_once __DIR__ . '/modules/db.php';
require_once __DIR__ . '/modules/functions.php';

date_default_timezone_set("Asia/Jakarta");

if (!$_SESSION['login'] && !isset($_POST['upload'])) {
    header("Location: /login.php");
}

if (isset($_FILES['files'])) {
    $jumlahFile = count($_FILES['files']['name']);

    for (
        $i = 0;
        $i < $jumlahFile;
        $i++
    ) {
        $namafile = $_FILES['files']['name'][$i];
        $tmp = $_FILES['files']['tmp_name'][$i];
        $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
        $ukuran = $_FILES['files']['size'][$i];
        $namafile = date('d-m-Y H:i:s') . ' ' . $namafile;
        $token = hashFileNameAsToken($namafile) . '.' . $tipe_file;

        move_uploaded_file($tmp, 'files/' . $token);
        prepare("INSERT INTO files (name, token) VALUES (?, ?)");
        execute([$namafile, $token]);
    }
    echo 'Berhasil mengunggah file';
} else {
    echo 'Gagal mengunggah file';
}
