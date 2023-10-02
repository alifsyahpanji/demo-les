<?php


include("../env.php");

$sql_get_data = "SELECT pembayaran.tanggal, pembayaran.jumlah, pembayaran.metode_pembayaran, akun.nama_anak, akun.nama_ortu, akun.telepon FROM pembayaran INNER JOIN akun ON pembayaran.id_akun = akun.id WHERE stat_pembayaran = 'terima' ORDER BY pembayaran.id DESC LIMIT 20";
$run_get_data = mysqli_query($conn, $sql_get_data);
$count_get_data = mysqli_num_rows($run_get_data);



?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style.css">
</head>

<body>
    <div>

        <nav class="navbar">
            <a href="index.php">
                <div class="d-flex align-items-center fw-bolder">
                    <img src="../assets/image/home.png" class="img-nav-icon me-2" alt="home">
                    <div class="ms-2">Home</div>
                </div>
            </a>

            <a href="logout.php">
                <div class="d-flex align-items-center fw-bolder">
                    <img src="../assets/image/logout.png" class="img-nav-icon me-2" alt="home">
                    <div class="ms-2">Logout</div>
                </div>
            </a>
        </nav>

        <div class="container-fluid mt-5 mb-5">



            <div class="card mb-5">
                <h5 class="card-header fw-bolder">
                    Riwayat Pembayaran
                </h5>
                <div class="card-body">
                    <p class="card-text">Ini adalah menu riwayat pembayaran yang sudah diterima.</p>

                    <form action="hitungpendapatan.php" method="post">
                        <div class="mt-3">
                            <label for="tanggalawal" class="form-label">Tanggal awal</label>
                            <input type="date" class="form-control" id="tanggalawal" name="tanggalawal">
                        </div>

                        <div class="mt-3">
                            <label for="tanggalakhir" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggalakhir" name="tanggalakhir">
                        </div>

                        <button type="submit" class="btn btn-success mt-3 mb-3">Hitung Pendapatan</button>
                    </form>


                </div>
            </div>



            <?php
            if ($count_get_data > 0) {
                while ($row_pembayaran = mysqli_fetch_assoc($run_get_data)) {
                    ?>
                    <div class="card mt-3 mb-4">
                        <h5 class="card-header fw-bolder">
                            <?php echo $row_pembayaran["nama_anak"]; ?>
                        </h5>
                        <div class="card-body">
                            <div class="card-text fw-bolder">

                                <div class="mt-2">Tanggal:
                                    <?php echo $row_pembayaran["tanggal"]; ?>
                                </div>
                                <div class="mt-2">Telepon:
                                    <?php echo $row_pembayaran["telepon"]; ?>
                                </div>
                                <div class="mt-2">Nama Ortu:
                                    <?php echo $row_pembayaran["nama_ortu"]; ?>
                                </div>
                                <div class="mt-2">Jumlah:
                                    <?php echo $row_pembayaran["jumlah"]; ?>
                                </div>
                                <div class="mt-2">Metode:
                                    <?php echo $row_pembayaran["metode_pembayaran"]; ?>
                                </div>


                            </div>
                        </div>
                    </div>

                    <?php

                }
            }
            ?>







        </div>
    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>