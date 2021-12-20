<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: /file.php");
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
    <title>Masuk</title>
</head>

<body>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;
        if ($username === 'athatsaqif' && $password === 'htmlcssjsphp') {
            $_SESSION['login'] = true;
            header("Location: /file.php");
        } else {
            echo '<script>alert("Username atau password salah!")</script>';
        }
    }

    ?>

    <div class="row">
        <div class="col-6 offset-3 mt-5 bg-dark text-light">
            <h1 class="mt-2">Masuk</h1>

            <!-- Login Form -->
            <form action="" method="POST">
                <div class="mt-4 mb-1 form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                </div>
                <div class="mb-3 mt-3 form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                </div>
                <div class="form-group mt-2 mb-3">
                    <button type="submit" class="btn btn-primary" name="login">Masuk</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>