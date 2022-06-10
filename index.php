<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    die();
} else {
    require('functions.php');
    require('template/header.php');
    require('template/sidebar.php');

    /* Fungsi Mengambil Halaman - > Mulai */
    if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == "data-barang") {
            require('halaman/data-barang/index.php');
        } elseif ($_GET['halaman'] == "stock-opname") {
            require('halaman/stock-opname/index.php');
        } elseif ($_GET['halaman'] == "transaksi") {
            require('halaman/transaksi/index.php');
        } elseif ($_GET['halaman'] == "laporan-transaksi") {
            require('halaman/laporan-transaksi/index.php');
        } else {
            require('template/404.php'); // Jika user memasukan parameter lain pada GET "halaman" makan akan Eror.
        }
    } else {
        require('template/dashboard.php');
    }
    /* Fungsi Mengambil Halaman - > Selesai */

    require('template/footer.php');
}
