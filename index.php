<?php

session_start();

if (isset($_SESSION['login'])) {
    echo "<script>window.location.assign('./administrator/')</script>";
    exit;
}

//connection
require("./config/connect.php");

if (isset($_POST['btn-login'])) {
    $user = addslashes(trim($_POST['user']));
    $pass = addslashes(md5($_POST['pass']));

    //Get Username and Password
    $query = "SELECT * FROM users WHERE username = '$user' AND password ='$pass';";
    $login = mysqli_query($conn, $query);
    $user_data = mysqli_fetch_assoc($login);

    if (mysqli_num_rows($login) > 0) {
        $_SESSION['login'] = true;
        $_SESSION['nama_user'] = $user_data['nama_user'];
        $_SESSION['user_type'] = $user_data['user_type'];
        echo "<script>alert('Login Berhasil'); window.location.assign('./administrator/');</script>";
        exit;
    } else if (mysqli_num_rows($login) === 0) {
        echo "<script>alert('Login Gagal!!! Username atau Password Tidak Benar')</script>";
    } else {
        echo "<script>alert('Error: " . $query . "\n" . $conn->error . "')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Inventaris Barang</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="FORM LOGIN APLIKASI DATA INVENTARIS BARANG" />

    <!-- Icons -->
    <link rel="shortcut icon" href="./assets/icons/favicon.ico" type="image/x-icon">

    <!-- Uikit Framework -->
    <link rel="stylesheet" href="./lib/uikit/css/uikit.min.css" />
    <script src="./lib/uikit/js/uikit.min.js"></script>
    <script src="./lib/uikit/js/uikit-icons.js"></script>

    <!-- Native Css -->
    <link rel="stylesheet" href="./assets/css/login.css" />
</head>

<body>
    <header>
        <h1 class="uk-text-bold uk-text-center" style="font-size: 3.55vh;">APLIKASI
            INVENTARIS BARANG SMKN 1 PANGANDARAN</h1>
        <img src="./assets/img/logosmk.png" class="uk-align-center" alt="SMK">
    </header>
    <div class="form-box">
        <form action="" method="post" enctype="multipart/form-data" class="uk-form-horizontal uk-margin-large">
            <h1 class="uk-text-lead uk-text-bold uk-margin-top" style="font-size: 2vh;">Login</h1>
            <div class="uk-margin-small">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                    <input class="uk-input" name="user" type="text" placeholder="username" />
                </div>
            </div>
            <div class="uk-margin-small">
                <div class="uk-inline">
                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                    <input class="uk-input" name="pass" id="pass" type="password" placeholder="password" />
                </div>
            </div>
            <label class="uk-text-bold" style="font-size: 1.75vh;">Show Password&nbsp;<input class="uk-checkbox" type="checkbox"
                    onclick="showPass()"></label>
            <script>
                function showPass() {
                    var pass = document.getElementById("pass");
                    if (pass.type === "password") {
                        pass.type = "text";
                    } else {
                        pass.type = "password";
                    }
                }
            </script>
            <div class="uk-margin">
                <button type="submit" name="btn-login" style="font-size: 1.50vh;"
                    class="uk-button uk-button-primary uk-width-1-1 uk-text-bold">Login</button>
            </div>
        </form>
    </div>

    <!-- Javascript Murni -->
    <script src="./assets/js/index.js"></script>
</body>

</html>