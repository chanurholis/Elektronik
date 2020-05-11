<?php

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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <title>Daftar Elektronik</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <a class="navbar-brand text-light" href="">Elektronik</a>

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
            <h1 class="text-center">Daftar Elektronik</h1>
            <div class="table-responsive">

                <!-- Form Pencarian atau filter data -->
                <form action="<?= "php/filter.php" ?>" method="POST">
                    <input type="text" name="keyword" style="height:38px;" class="rounded-0 col-4 mt-4" placeholder="Masukan keyword pencarian...">
                    <button class="btn btn-outline-primary rounded-0" name="cari">Cari</button>
                </form>

                <!-- Tabel daftar barang -->
                <table class="table table-bordered mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-left" scope="col">Nama Barang</th>
                            <th class="text-left" scope="col">Brand</th>
                            <th class="text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        <?php foreach ($result as $item) : ?>
                            <tr>
                                <td class="text-center" scope="row"><?= $no++ ?></td>
                                <td class="text-left"><?= $item['nama_barang'] ?></td>
                                <td class="text-left"><?= $item['brand_barang'] ?></td>
                                <td class="text-center"><a href="<?= "php/detail.php/" + $item['barang_id'] ?>" class="btn btn-outline-dark rounded-0">Detail</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>

</html>