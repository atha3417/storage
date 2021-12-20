<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: /login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Penyimpanan File</title>
</head>

<body>

    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-10 float-start">
                    <h1 class="m-3">Daftar File</h1>
                </div>
                <div class="col-2 text-end">
                    <a href="/logout.php" class="m-3 btn btn-warning btn-sm">Keluar</a>
                </div>
            </div>
            <a href="/upload.php" class="btn btn-primary m-3">Unggah File Baru</a>

            <ul class="list-group">
                <?php
                $files = scandir('files');
                unset($files[0]);
                unset($files[1]);
                ?>
                <?php foreach ($files as $file) : ?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-11">
                                <a href="/files/<?= $file; ?>" class="list-group-item list-group-item-action list-group-item-primary">
                                    <?= $file; ?>
                                </a>
                            </div>
                            <div class="col-1 text-center">
                                <a href="/delete.php?name=<?= $file; ?>" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin mau menghapus <?= $file ?>?')">
                                    Hapus
                                </a>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>