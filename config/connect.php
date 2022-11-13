<?php

/*
=============
| Ibnu Said |
=============
*/

//setup connect
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db = "db_inventaris";

//connect database
$conn = mysqli_connect($host, $user, $pass, $db);

//jika connect error
if (!$conn) {
    die('<h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">Gagal Tersambung Ke Database :(</h1>');
}
