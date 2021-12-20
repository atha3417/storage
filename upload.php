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
    <title>Unggah File Baru</title>
</head>

<body>
    <div class="row">
        <div class="col-6 offset-3 mt-5 bg-dark text-light">
            <h1 class="mt-2">Unggah File Baru</h1>
            <!-- Upload Form -->
            <form id="upload_form" method="POST" enctype="multipart/form-data">
                <div class="mt-3 mb-1 form-group">
                    <label for="file" class="form-label">File</label>
                    <input type="file" class="form-control" id="files" name="files[]" multiple required>
                </div>
                <div class="mt-3">
                    <progress class="d-none" id="progressBar" value=" 0" max="100" style="width: 100%; height: 25px;"></progress>
                    <h3 id="status"></h3>
                    <p id="loaded_n_total"></p>
                </div>
                <div class="form-group mt-3 mb-3">
                    <button type="button" class="btn btn-info m-1" id="uploadBtn" onclick="uploadFile()">Unggah</button>
                    <a href="/file.php" class="btn btn-secondary m-1" id="backBtn">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>