<?php

session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../../')</script>";
}

if ($_SESSION['user_type'] == "user") {
	echo "<script>alert('Anda Tidak Memiliki Akses Untuk Ini'); window.location.assign('../')</script>";
} else {

//connection
require('../../config/connect.php');

//menambahkan data
if (isset($_POST['tambah'])) {
	//tampung data
	$nomor_barang = htmlspecialchars($_POST['nomor_barang']);
	$nama_barang = htmlspecialchars($_POST['nama_barang']);
	$spesifikasi = htmlspecialchars($_POST['spesifikasi']);
	$jumlah_barang = htmlspecialchars($_POST['jumlah_barang']);
	$kondisi = htmlspecialchars($_POST['kondisi']);
	$keterangan = htmlspecialchars($_POST['keterangan']);

	$all = $nomor_barang && $nama_barang && $spesifikasi && $jumlah_barang && $kondisi && $keterangan;
	if ($all == '') {
		echo "<script>alert('Mohon Isi Dengan Benar');</script>";
	} else {
		global $conn;
		$query = "INSERT INTO data_bahan VALUES
		('$nomor_barang', '$nama_barang', '$spesifikasi', '$jumlah_barang', '$kondisi', '$keterangan')
		";
		mysqli_query($conn, $query);

		//cek berhasil tambah atau tidak
		if (mysqli_affected_rows($conn) > 0) {
			echo "<script>alert('Berhasil Menambah Data!'); window.location.assign('../');</script>";
		} else {
			echo "<script>alert('Gagal Menambah Data!');</script>";
			echo mysqli_error($conn);
		}
	}
}

//kembali
if (isset($_POST['kembali'])) {
	echo "<script>window.location.assign('../');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tambah Data Bahan</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Uikit Css -->
	<link rel="stylesheet" href="../../lib/uikit/css/uikit.min.css">

	<!-- Uikit Js & Icons -->
	<script src="../../lib/uikit/js/uikit.min.js"></script>
	<script src="../../lib/uikit/js/uikit-icons.min.js"></script>

</head>

<body>

	<div class="form-tambah uk-padding-small" style="width: 90%;">
		<form action="" method="post" class="uk-form-stacked" style="width: 90%;">
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">NOMOR BARANG</label>
				<div class="uk-form-controls">
					<input class="uk-input" name="nomor_barang" id="form-stacked-text" type="number" placeholder="0">
				</div>
			</div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">NAMA BARANG</label>
				<div class="uk-form-controls">
					<input class="uk-input" name="nama_barang" id="form-stacked-text" type="text" placeholder="Nama Barang">
				</div>
			</div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">SPESIFIKASI</label>
				<div class="uk-form-controls">
					<input class="uk-input" name="spesifikasi" id="form-stacked-text" type="text" placeholder="Spesifikasi">
				</div>
			</div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">JUMLAH BARANG</label>
				<div class="uk-form-controls">
					<input class="uk-input" name="jumlah_barang" id="form-stacked-text" type="number" placeholder="0">
				</div>
			</div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">KONDISI</label>
				<div class="uk-form-controls">
					<input class="uk-input" name="kondisi" id="form-stacked-text" type="text" placeholder="Kondisi">
				</div>
			</div>
			<div class="uk-margin">
				<label class="uk-form-label" for="form-stacked-text">KETERANGAN</label>
				<div class="uk-form-controls">
					<textarea name="keterangan" id="form-stacked-text" placeholder="Keterangan Barang" style="width: 90%; height: 200px; padding: 15px; outline: none; border: 0.50px solid rgba(0,0,0,0.1);"></textarea>
				</div>
			</div>
			<div class="uk-margin uk-margin-small">
				<button type="submit" name="tambah" class="uk-button uk-button-primary">Tambah</button>
				<button type="submit" name="kembali" class="uk-button uk-button-danger btn-kembali" style="font-weight: 600; font-size: 1.75vh;">Kembali</button>
			</div>
		</form>
	</div>

</body>

</html>
<?php } ?>