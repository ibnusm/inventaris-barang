<?php

session_start();

if (!isset($_SESSION['login'])) {
	echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../')</script>";
}


//connection
require('../config/connect.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventaris Barang</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="APLIKASI DATA INVENTARIS BARANG">

    <!-- Icons -->
    <link rel="shortcut icon" href="../assets/icons/favicon.ico" type="image/x-icon">

    <!-- Uikit Framework -->
    <link rel="stylesheet" href="../lib/uikit/css/uikit.min.css">
    <script src="../lib/uikit/js/uikit.min.js"></script>
    <script src="../lib/uikit/js/uikit.icons.js"></script>
    
    <!-- Native Css -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <header>
        <h1 class="uk-text-lead uk-text-center" style="font-family: 'Anton', sans-serif; font-size: 3.55vh;">APLIKASI INVENTARIS BARANG</h1>
        <p class="uk-text-meta uk-text-center" style="font-weight: 500; font-size: 2.55vh; color: var(--black-normal);">SMKN 1 PANGANDARAN</p>
        <img src="../assets/img/logosmk.png" class="uk-align-center" alt="SMK">
    </header>
    <hr />
    <div class="data">
    <div class="uk-margin uk-flex uk-flex-center">
        <div class="account uk-margin-bottom uk-margin uk-flex uk-flex-center uk-flex-column">
            <h3 class="uk-text-center">Account</h3>
            <div class="users">
                <img src="../assets/img/user.png" width="80px" alt="<?=$_SESSION['user_type'];?>">
                <div class="users-info uk-text-center uk-flex uk-flex-center uk-flex-column">
                    <span class="uk-text-bold"><?=$_SESSION['user_type'];?></span>
                    <span><?=$_SESSION['nama_user'];?></span>
                </div>
            </div>
        </div>
    </div>
        <div class="btn-crud uk-margin-large uk-width-auto uk-flex uk-flex-column">
        <?php if ($_SESSION['user_type'] == "admin") { ?>
        <div class="uk-margin uk-flex uk-flex-center uk-flex-nowrap">
            <button class="btn-tambah uk-button uk-margin-right" style="font-weight: 600; font-size: 1.75vh;">Tambah Data</button>
            <button class="btn-cetak uk-button uk-margin-left" style="font-weight: 600; font-size: 1.75vh;">Cetak Data</button>
        </div>
        <div class="uk-margin uk-flex uk-flex-center uk-flex-nowrap">
            <button class="btn-export-txt uk-button uk-margin-right" style="font-weight: 600; font-size: 1.75vh;">Export Data TXT</button>
            <button class="btn-export-csv uk-button uk-margin-left" style="font-weight: 600; font-size: 1.75vh;">Export Data CSV</button>
        </div>
            <button class="btn-logout uk-margin uk-button uk-button uk-button-secondary uk-flex uk-flex-center" style="font-weight: 600; font-size: 1.75vh;">Logout</button>
            <script>
            	let tambah = document.querySelector('.btn-tambah');
            	let cetak = document.querySelector('.btn-cetak');
            	let exportTxt = document.querySelector('.btn-export-txt');
            	let exportCsv = document.querySelector('.btn-export-csv');
            	let logout = document.querySelector('.btn-logout');
            	
                tambah.addEventListener('click', () => {
            		window.location.assign('./editor/tambah-data.php');
            	})
            	cetak.addEventListener('click', () => {
            		window.location.assign('./editor/cetak-data.php');
            	})
            	exportTxt.addEventListener('click', () => {
            		window.location.assign('./editor/export-txt.php');
            	})
            	exportCsv.addEventListener('click', () => {
            		window.location.assign('./editor/export-csv.php');
            	})
            	logout.addEventListener('click', () => {
            		window.location.assign('./logout.php');
            	})
            </script>
            <?php } else { ?>
                <div class="uk-flex uk-flex-center uk-flex-row">
                    <button class="btn-cetak uk-button" style="font-weight: 600; font-size: 1.75vh;">Cetak Data</button>
                    <button class="btn-logout uk-button uk-button-secondary uk-margin-left" style="font-weight: 600; font-size: 1.75vh;">Logout</button>
                </div>
            <script>
            	let logout = document.querySelector('.btn-logout');
            	let cetak = document.querySelector('.btn-cetak');

            	logout.addEventListener('click', () => {
            		window.location.assign('./logout.php');
            	})
                cetak.addEventListener('click', () => {
            		window.location.assign('./editor/cetak-data.php');
            	})
            </script>
        <?php } ?>
        	<style>
                .btn-tambah {
                    background: rgba(86, 130, 232, 0.5);
                    color: var(--black-normal);
                }
                .btn-tambah:hover {
                    background: rgba(86, 130, 232, 1);
                }
        		.btn-cetak {
        			background: rgba(242, 70, 70, 0.5);
        			color: var(--black-normal);
        		}
        		.btn-cetak:hover {
        			background: rgba(242, 70, 70, 1);
        		}
        		.btn-export-txt {
        			background: #eaeaea;
        			color: var(--black-normal);
        		}
        		.btn-export-txt:hover {
        			background: var(--black-semi-parent3);
        		}
        		.btn-export-csv {
        			background: rgba(25,255,147,0.514);
        			color: var(--black-normal);
        		}
        		.btn-export-csv:hover {
        			background: rgba(25,255,147,1);
        		}
        	</style>
        </div>
        <form action="search.php" method="get" class="form-search uk-search uk-search-default uk-margin uk-margin-left">
        	<span uk-search-icon></span>
    		<input class="uk-search-input" name="q" id="q" type="search" placeholder="Cari Data...">
    		<button type="submit" name="cari" class="btn-search">Cari</button>
    		<style>
    			.btn-search {
    				background: rgba(88,91,102,0.50);
    				margin: 0 1rem 0;
    				padding: 0 1rem 0;
    				border: none;
    				border-radius: 20px;
    				outline: none;
    				font-family: var(--font-anton);
    				font-weight: 600;
    				font-size: 1.55vh;
    				letter-spacing: 1.5px;
    			}
                .btn-search:hover {
                    background: rgba(0,0,0,0.50);
                }
			</style>
    	</form>
    	<style>
    		.form-search {
    			display: flex;
    			flex-direction: row;
    			flex-wrap: nowrap;
    		}
    	</style>
        <div id="tbl-data" class="uk-overflow-auto">
        <table class="uk-table uk-table-striped uk-table-hover">
            <thead>
                <tr>
                    <th>NOMOR BARANG</th>
                    <th>NAMA BARANG</th>
                    <th>SPESIFIKASI</th>
                    <th>JUMLAH BARANG</th>
                    <th>KONDISI</th>
                    <th>KETERANGAN</th>
                <?php if ($_SESSION['user_type'] == "admin") { ?>
                    <th>ACTION</th>
                <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                //Pagination
                $data_per_page = 5;
                $get_data = mysqli_query($conn, 'SELECT * FROM data_bahan');
                $total_data = mysqli_num_rows($get_data);
                $total_page = ceil($total_data / $data_per_page);
                $page_active = ( isset($_GET['page']) ) ? $_GET['page'] : 1;
                $first_data = ($data_per_page * $page_active) - $data_per_page;
                
                //Ambil Data
                $query = mysqli_query($conn, "SELECT * FROM data_bahan LIMIT $first_data, $data_per_page");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data['nomor_barang'] ?></td>
                        <td><?php echo $data['nama_barang'] ?></td>
                        <td><?php echo $data['spesifikasi'] ?></td>
                        <td><?php echo $data['jumlah_barang'] ?></td>
                        <td><?php echo $data['kondisi'] ?></td>
                        <td><?php echo $data['keterangan'] ?></td>
                        <?php if ($_SESSION['user_type'] == "admin") { ?>
                        <td>
                            <a href="./editor/ubah-data.php?nomor_barang=<?= $data['nomor_barang']; ?>"><button class="btn-action btn-ubah">Ubah</button></a>
                            <a href="./editor/hapus-data.php?nomor_barang=<?= $data['nomor_barang']; ?>"><button class="btn-action btn-hapus">Hapus</button></a>
                            <style>
                                .btn-action {
                                    font-weight: 700;
                                    font-size: 1.75vh;
                                    padding: 3px 5px 3px;
                                    margin: 5px;
                                    outline: none;
                                    border: none;
                                    border-radius: 5px;
                                }
                                .btn-ubah {
                                    background: rgba(89, 240, 184, 0.75);
                                }
                                .btn-ubah:hover {
                                    background: rgba(25, 255, 147, 1);
                                }
                                .btn-hapus {
                                    background: rgba(236, 100, 100, 0.75);
                                }
                                .btn-hapus:hover {
                                    background: rgba(236, 100, 100, 1);
                                }
                            </style>
                        </td>
                        <?php } ?>
                    </tr>
            </tbody>
        <?php } ?>
        </table>
        </div>
    </div>
    
    <div class="pagination uk-flex uk-flex-center uk-margin uk-text-large">
    <?php for($i = 1; $i <= $total_page; $i++) : ?>
    	<?php if($i == $page_active) : ?>
    		<a href="?page=<?=$i;?>" class="uk-text-bold uk-padding"><?=$i;?></a>
    	<?php else : ?>
    		<a href="?page=<?=$i;?>" class="uk-padding"><?=$i;?></a>
    	<?php endif;?>
    <?php endfor; ?>
    </div>
    
    <!-- Footer -->
    <div class="uk-width-auto">
        <div class="uk-light uk-padding-small uk-background-secondary uk-text-center">
            <span class="uk-text-bolder">Copyright &copy;2022 Ibnu Said.    Smkn 1 Pangandaran</span>
        </div>
    </div>
    
    <!-- Javascript Murni -->
    <script src="../assets/js/index.js"></script>

</body>

</html>