<?php

session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>window.location.assign('../')</script>";
}

require('../config/connect.php');

if (isset($_POST['kembali'])) {
	echo "<script>window.location.assign('./')</script>";
}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventaris Barang</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="APLIKASI DATA INVENTARIS BARANG">

    <!-- Uikit Framework -->
    <link rel="stylesheet" href="../lib/uikit/css/uikit.min.css">
    <script src="../lib/uikit/js/uikit.min.js"></script>
    <script src="../lib/uikit/js/uikit.icons.min.js"></script>
    
    <!-- Native Css -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="data uk-overflow-auto">
        <div class="uk-margin uk-width-auto uk-flex">
            <form action="" method="post" class="uk-padding uk-flex uk-flex-column">
        		<h1 style="font-size: 1.75vh; font-weight: 600;">Hasil Pencarian Dari: <?= htmlentities($_GET['q']); ?></h1>
        		<button type="submit" name="kembali" class="btn-kembali">Kembali</button>
        		<style>
        			.btn-kembali {
        				background: rgba(88,91,102,0.50);
        				padding: 10px;
        				border: none;
        				border-radius: 20px;
        				outline: none;
        				font-weight: 600;
        				font-size: 1.75vh;
        				letter-spacing: 1.5px;
        			}
                    .btn-kembali:hover {
                        background: rgba(0,0,0,0.50);
                    }
				</style>
    		</form>
        </div>
        <table class="uk-table uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>NOMOR BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>SPESIFIKASI</th>
                    <th>JUMLAH BARANG</th>
                    <th>KONDISI</th>
                    <th>KETERANGAN</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
            	<?php 
            		if (isset($_GET['cari'])) {
					//echo "<script>alert('".$_GET['q']."')</script>";
					$q = htmlentities($_GET['q']);
					$search_query = "SELECT * FROM data_bahan WHERE nama_barang LIKE '%$q%' OR nomor_barang LIKE '%$q%'";
					$search_data = mysqli_query($conn, $search_query);
					if (mysqli_affected_rows($conn) == 0) {
        				echo "<script>alert('Data Tidak Ditemukan');</script>";
    				}
					while ($show_data = mysqli_fetch_array($search_data)) {
            	?>
                    <tr>
                        <td><?php echo $show_data['nomor_barang']; ?></td>
                        <td><?php echo $show_data['nama_barang']; ?></td>
                        <td><?php echo $show_data['spesifikasi']; ?></td>
                        <td><?php echo $show_data['jumlah_barang']; ?></td>
                        <td><?php echo $show_data['kondisi']; ?></td>
                        <td><?php echo $show_data['keterangan']; ?></td>
                        <td>
                            <a href="./editor/ubah-data.php?nomor_barang=<?= $show_data['nomor_barang']; ?>"><button class="btn-action btn-ubah">Ubah</button></a>
                            <a href="./editor/hapus-data.php?nomor_barang=<?= $show_data['nomor_barang']; ?>"><button class="btn-action btn-hapus">Hapus</button></a>
                            <style>
                                .btn-action {
                                    font-weight: 700;
                                    font-size: 1.75vh;
                                    padding: 3px 5px 3px;
                                    margin: 2px;
                                    outline: none;
                                    border: 0.50px solid rgba(0,0,0,0.50);
                                    border-radius: 5px;
                                }
                                .btn-ubah {
                                    background: rgba(89, 240, 184, 0.75);
                                }
                                .btn-hapus {
                                    background: rgba(240, 86, 127, 0.75);
                                }
                                .btn-action:hover {
                                    background: rgba(88,91,102,0.50);
                                }
                            </style>
                        </td>
                    </tr>
            </tbody>
        <?php } } ?>
        </table>
    </div>

    <!-- Live-Search Plugins -->
    <!--<script src="./lib/plugins/live-search/jquery-3.6.1.min.js"></script>
    <script src="./lib/plugins/live-search/script.js"></script>-->

    <!-- Javascript Murni -->
    <script src="../assets/js/index.js"></script>

</body>

</html>