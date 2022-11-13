<?php

session_start();

if (!isset($_SESSION['login'])) {
    echo "<script>alert('Anda Harus Login Terlenbih Dahulu'); window.location.assign('../../')</script>";
}

if ($_SESSION['user_type'] == "user") {
    echo "<script>alert('Anda Tidak Memiliki Akses Untuk Ini'); window.location.assign('../')</script>";
} else {

    //connection with PDO
    $conn = new PDO("mysql:host=127.0.0.1;dbname=db_inventaris;", "root", "");

    //ambil data dari nomor barang
    $nomor_barang = $_GET['nomor_barang'];
    $query = $conn->prepare("SELECT * FROM data_bahan WHERE nomor_barang = :nomor_barang");
    $query->bindParam(":nomor_barang", $nomor_barang);
    $query->execute();
    $barang = $query->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['ubah'])) {
        //tampung data yang akan diubah
        $nomor_barang = htmlspecialchars($_POST['nomor_barang']);
        $nama_barang = htmlspecialchars($_POST['nama_barang']);
        $spesifikasi = htmlspecialchars($_POST['spesifikasi']);
        $jumlah_barang = htmlspecialchars($_POST['jumlah_barang']);
        $kondisi = htmlspecialchars($_POST['kondisi']);
        $keterangan = htmlspecialchars($_POST['keterangan']);

        $data = [
            'nomor_barang' => $nomor_barang,
            'nama_barang' => $nama_barang,
            'spesifikasi' => $spesifikasi,
            'jumlah_barang' => $jumlah_barang,
            'kondisi' => $kondisi,
            'keterangan' => $keterangan,
        ];
        $query_update = $conn->prepare("UPDATE data_bahan SET nomor_barang = $nomor_barang, nama_barang = '$nama_barang', spesifikasi = '$spesifikasi', jumlah_barang = '$jumlah_barang', kondisi = '$kondisi', keterangan = '$keterangan' WHERE nomor_barang = $nomor_barang");
        $query_update->execute();
        //cek berhasil ubah atau tidak
        if ($query_update) {
            echo "<script>alert('Berhasil Mengubah Data!'); window.location.assign('../');</script>";
        } else {
            echo "<script>alert('Gagal Mengubah Data!');</script>";
        }
    }


    //kembali
    if (isset($_POST['kembali'])) {
        //echo "<script>window.location.href = '../index.php';</script>";
        echo "<script>window.location.assign('../');</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ubah Data</title>
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
                    <input class="uk-input nomor_barang" name="nomor_barang" id="form-stacked-text" type="number"
                        value="<?= $barang['nomor_barang']; ?>" readonly="true">
                    <script>
                        let nomorBarang = document.querySelector('.nomor_barang');
                        nomorBarang.addEventListener('click', () => {
                            alert('Nomor Barang Tidak Bisa Diubah!')
                        })
                    </script>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">NAMA BARANG</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="nama_barang" id="form-stacked-text" type="text"
                        value="<?= $barang['nama_barang']; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">SPESIFIKASI</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="spesifikasi" id="form-stacked-text" type="text"
                        value="<?= $barang['spesifikasi']; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">JUMLAH BARANG</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="jumlah_barang" id="form-stacked-text" type="number"
                        value="<?= $barang['jumlah_barang']; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">KONDISI</label>
                <div class="uk-form-controls">
                    <input class="uk-input" name="kondisi" id="form-stacked-text" type="text"
                        value="<?= $barang['kondisi']; ?>">
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-text">KETERANGAN</label>
                <div class="uk-form-controls">
                    <textarea name="keterangan" id="form-stacked-text"
                        style="width: 90%; height: 200px; padding: 15px; outline: none; border: 0.50px solid rgba(0,0,0,0.1);"><?= $barang['keterangan'] ?></textarea>
                </div>
            </div>
            <div class="uk-margin uk-margin-small">
                <button type="submit" name="ubah" class="uk-button uk-button-primary">Ubah</button>
                <button type="submit" name="kembali" class="uk-button uk-button-danger btn-kembali">Kembali</button>
            </div>
        </form>
    </div>

</body>

</html>
<?php } ?>