<?php

session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../../')</script>";
}

require("../../config/connect.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>data-barang</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CETAK DATA INVENTARIS BARANG">

    <!-- Icons -->
    <link rel="shortcut icon" href="../../assets/icons/favicon.ico" type="image/x-icon">

    <!-- Uikit Framework -->
    <link rel="stylesheet" href="../../lib/uikit/css/uikit.min.css">

</head>

<body>
    <table class="tbl-barang uk-table uk-table-striped uk-table-hover uk-text-center">
        <thead>
            <tr>
                <th>NOMOR BARANG</th>
                <th>NAMA BARANG</th>
                <th>SPESIFIKASI</th>
                <th>JUMLAH BARANG</th>
                <th>KONDISI</th>
                <th>KETERANGAN</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //Ambil Data
                $query = mysqli_query($conn, "SELECT * FROM data_bahan");
                while ($data = mysqli_fetch_array($query)) {
                ?>
            <tr>
                <td><?php echo $data['nomor_barang'] ?></td>
                <td><?php echo $data['nama_barang'] ?></td>
                <td><?php echo $data['spesifikasi'] ?></td>
                <td><?php echo $data['jumlah_barang'] ?></td>
                <td><?php echo $data['kondisi'] ?></td>
                <td><?php echo $data['keterangan'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
    window.print();

    setTimeout(() => {
        alert('Kembali')
        window.history.back();
    }, 2500);
    </script>
</body>

</html>