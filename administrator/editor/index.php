<?php
session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../../')</script>";
}

echo "<h1>Forbidden!</h1>";

?>