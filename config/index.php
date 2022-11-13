<?php
session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>window.location.assign('../')</script>";
}

echo "<h1>Forbidden!</h1>";

?>