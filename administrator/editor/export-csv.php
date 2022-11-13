<?php

session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../../')</script>";
}

if ($_SESSION['user_type'] == "user") {
	echo "<script>alert('Anda Tidak Memiliki Akses Untuk Ini'); window.location.assign('../')</script>";
} else {

	require("../../config/connect.php");

	$tanggal = date("m-d-Y");
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data-barang-' . $tanggal . '.csv');

	$out = fopen("php://output", "w");
	fputcsv($out, array('Nomor Barang', 'Nama Barang', 'Spesifikasi', 'Jumlah Barang', 'Kondisi', 'Keterangan'));
	$query = "SELECT * FROM data_bahan ORDER BY nomor_barang ASC";
	$get_data = mysqli_query($conn, $query);
	while ($data = mysqli_fetch_assoc($get_data)) {
		fputcsv($out, $data);
	}

	fclose($out);
}
?>