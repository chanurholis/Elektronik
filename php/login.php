<?php

// Memulai session
session_start();

// Menghubungkan ke file config.php untuk koneksi ke database
include_once("php/config.php");

// Query
$result = mysqli_query($mysqli, "SELECT * FROM tbl_barang ORDER BY barang_id DESC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <title>Login | Admin</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-light" href="<?= "../index.php" ?>">Elektronik</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                </li>
            </ul>
            <a style="text-decoration:none;" class="nav-link text-light text-left" href="<?= "php/login.php" ?>">
                Login
            </a>
        </div>
    </nav>

    <div class="container">
        <div class="mt-4">

            <!-- Sub judul -->
            <h1 class="text-center">Form Login</h1>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control rounded-0" id="username" autofocus>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control rounded-0" id="exampleInputPassword1">
                </div>
                <button type="submit" name="login" class="btn btn-primary rounded-0">Login</button>
            </form>

        </div>
    </div>

</body>

</html>

<!-- PHP -->
<?php
if (isset($_POST['login'])) {

    // Mengisis variabel username dengan value yan diinputkan user di kolom username
    $username = htmlspecialchars($_POST['username']);
    // Mengisis variabel password dengan value yan diinputkan user di kolom password
    $password = htmlspecialchars($_POST['password']);

    // Menghubungkan ke file config.php untuk koneksi ke database
    include_once("config.php");

    // Mengambil data dari database
    $user = mysqli_query($mysqli, "SELECT * FROM tbl_users WHERE username='$username'");

    // Variabel row diisi dengan data yang sudah diambil dari database
    $row = mysqli_fetch_array($user);

    // Jika data ada
    if ($row) {
        // Jika is_active sama dengan 1 maka lanjutkan
        if ($row['is_active'] == 1) {
            if (password_verify($password, $row['password'])) {

                // Membuat session dari value yang diisi oleh user
                $_SESSION['username'] = $row['username'];
                $_SESSION['status'] = 'login';

                header('location: admin.php');
            } else {
                echo '<br><div class="alert alert-danger rounded-0 col-8 m-auto text-center" role="alert">
                Terjadi Kesalahan!</div>';
            }
        } else {
            echo '<br><div class="alert alert-danger rounded-0 col-8 m-auto text-center" role="alert">
            Terjadi Kesalahan!</div>';
        }
    } else {
        echo '<br><div class="alert alert-danger rounded-0 col-8 m-auto text-center" role="alert">
        Terjadi Kesalahan!</div>';
    }
}

?>