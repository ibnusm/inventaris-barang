<?php

session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../../')</script>";
}

if ($_SESSION['user_type'] == "user") {
	echo "<script>alert('Anda Tidak Memiliki Akses Untuk Ini'); window.location.assign('../')</script>";
} else {

	require("../../config/connect.php");

	//set header
	header("Content-Type: application/force-download");
	header("Cache-Control: no-cache, must-revalidate");
	header("content-disposition: attachment;filename=data-barang.txt");

	$query = "SELECT * FROM data_bahan";
	$get_data = mysqli_query($conn, $query);
	while ($data = mysqli_fetch_assoc($get_data)) {

		$nomor = $data['nomor_barang'];
		$nama = $data['nama_barang'];
		$spek = $data['spesifikasi'];
		$jumlah = $data['jumlah_barang'];
		$kondisi = $data['kondisi'];
		$ket = $data['keterangan'];
		$tanggal = date("m-d-Y");

		//write data
		echo "[============[ DATA BARANG $nomor ]============]

Nomor Barang    : $nomor

Nama Barang     : $nama

Spesifikasi     : $spek

Jumlah barang   : $jumlah

Kondisi         : $kondisi

Keterangan      : $ket

Tanggal Export  : $tanggal

";
	}
}
?>