<?php

session_start();

//connection
require('../../config/connect.php');

if (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../../')</script>";
}

if ($_SESSION['user_type'] == "user") {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Ini'); window.location.assign('../')</script>";
} else {

    //ambil data yang akan dihapus
    $nomor_barang = $_GET['nomor_barang'];
    mysqli_query($conn, "DELETE FROM data_bahan WHERE nomor_barang = $nomor_barang");
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>alert('Berhasil Menghapus Data!'); window.location.href = '../index.php';</script>";
    } else {
        echo "<script>alert('Gagal Menghapus Data!'); window.location.href = '../index.php';</script>";
    }
}
?>