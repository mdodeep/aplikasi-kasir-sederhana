<?php

require('config.php');

/* Fungsi Time Zone */
date_default_timezone_set('Asia/Jakarta');

/* Start Get Table data_barang */
$get_table_data_barang = mysqli_query($conn, "SELECT * FROM data_barang");
$get_field_data_barang = mysqli_fetch_assoc($get_table_data_barang);
/* End Get Table data_barang */

/* Start Fungsi Hapus Data Barang */
if (isset($_GET['hapus'])) {
    $id_hapus_data = $_GET['hapus'];
    if ($_GET['halaman'] == "transaksi") {
        $hapus_data_nomor_transaksi = $_GET['nomor'];
        mysqli_query($conn, "DELETE FROM data_transaksi WHERE id_data_barang='$id_hapus_data' AND nomor_transaksi='$hapus_data_nomor_transaksi'");
        echo "<script> location.replace('?halaman=transaksi&nomor=$hapus_data_nomor_transaksi'); </script>";
    } else {
        mysqli_query($conn, "DELETE FROM data_barang WHERE id_data_barang='$id_hapus_data'");
        echo "<script> location.replace('?halaman=data-barang'); </script>";
    }
}
/* End Fungsi Hapus Data Barang */

/* Start Fungsi Tambah Data Barang */
if (isset($_POST['tambah_data_barang'])) {
    $nama_data = $_POST['nama_data_barang'];
    $nomor_data = $_POST['nomor_data_barang'];
    $kategori_data = $_POST['kategori_data_barang'];
    $stok_data = $_POST['stok_data_barang'];
    $harga_data = $_POST['harga_data_barang'];

    $tambah_data = mysqli_query($conn, "INSERT INTO data_barang VALUES ('','$nomor_data','$nama_data','$kategori_data','$stok_data','$harga_data')");
    echo "<script> location.replace('?halaman=data-barang'); </script>";
}
/* End Fungsi Tambah Data Barang */

/* Mendapatkan Total Data Barang */
$total_data_barang = mysqli_num_rows($get_table_data_barang);

/* Mendapatkan Total Status Aman Pada Barang */
$get_status_aman = mysqli_query($conn, "SELECT * FROM data_barang WHERE stok_barang >= 15");
$total_status_aman = mysqli_num_rows($get_status_aman);

/* Mendapatkan Total Status Stok Menipis Pada Barang */
$get_status_stok_menipis = mysqli_query($conn, "SELECT * FROM data_barang WHERE stok_barang BETWEEN 10 AND 14");
$total_status_stok_menipis = mysqli_num_rows($get_status_stok_menipis);

/* Mendapatkan Total Status Segera Stok Ulang Pada Barang */
$get_status_segera_stok_ulang = mysqli_query($conn, "SELECT * FROM data_barang WHERE stok_barang < 10");
$total_status_segera_stok_ulang = mysqli_num_rows($get_status_segera_stok_ulang);

/* Start Get Table data_transaksi */
$get_table_data_transaksi = mysqli_query($conn, "SELECT * FROM data_transaksi ORDER BY id_transaksi DESC");
$get_field_data_transaksi = mysqli_fetch_assoc($get_table_data_transaksi);
/* End Get Table data_transaksi */

/* Start Get Table laporan_transaksi */
$get_table_laporan_transaksi = mysqli_query($conn, "SELECT * FROM laporan_transaksi");
$get_field_laporan_transaksi = mysqli_num_rows($get_table_laporan_transaksi);
/* End Get Table laporan_transaksi */

/* Start Fungsi Pendapatan Hari Ini */
$tanggal_sekarang = date('d');
$bulan_sekarang = date('F');
$tahun_sekarang = date('Y');
$get_field_pendapatan_hari_ini = mysqli_query($conn, "SELECT SUM(total_tagihan) AS transaksi_hari_ini FROM laporan_transaksi WHERE tanggal_bayar='$tanggal_sekarang' AND bulan_bayar='$bulan_sekarang' AND tahun_bayar='$tahun_sekarang'");
$get_data_field_pendapatan_hari_ini = mysqli_fetch_assoc($get_field_pendapatan_hari_ini);
$pendapatan_hari_ini = $get_data_field_pendapatan_hari_ini['transaksi_hari_ini'];
/* End Fungsi Pendapatan Hari Ini */


/* Start Parameter Nomor Transaksi */
if (empty($get_field_data_transaksi['nomor_transaksi'])) {
    $nomor_transaksi = "SM00001";
} else {
    $prefix_nomor_transaksi = substr($get_field_data_transaksi['nomor_transaksi'], 0, 2);
    $sufix_nomor_transaksi = substr($get_field_data_transaksi['nomor_transaksi'], 2, 5);
    $nomor_transaksi = "SM" . str_repeat("0", 5 - strlen($sufix_nomor_transaksi + 1)) . ($sufix_nomor_transaksi + 1);
}
/* End Parameter Nomor Transaksi */

/* Start Deklarasi Parameter "Nomor" Untuk Mengambil Data */
if (isset($_GET['nomor'])) {
    $ambil_nomor_transaksi = $_GET['nomor']; // Mengambil Data Nomor Dengan Parameter GET

    // Mengambil Data Transaksi Sesuai Nomor
    $get_data_nomor_transaksi = mysqli_query($conn, "SELECT * FROM data_transaksi WHERE nomor_transaksi='$ambil_nomor_transaksi'");
    $rows_data_nomor_transaksi = mysqli_num_rows($get_data_nomor_transaksi);
    if ($rows_data_nomor_transaksi == 0) {
        //
    } else {
        $ambil_data_nomor_transaksi = mysqli_fetch_assoc($get_data_nomor_transaksi);
    }

    /* Start Deklarasi Fungsi Untuk Menghitung Total Harga */
    $get_jumlah_total_harga = mysqli_query($conn, "SELECT SUM(total_harga_barang) AS transaksi_jumlah_harga_total FROM data_transaksi WHERE nomor_transaksi='$ambil_nomor_transaksi'");
    $get_hitung_jumlah_total_harga = mysqli_num_rows($get_jumlah_total_harga);
    if (!empty($get_hitung_jumlah_total_harga)) {
        $get_data_jumlah_total_harga = mysqli_fetch_assoc($get_jumlah_total_harga);
        $tampil_jumlah_total_harga = $get_data_jumlah_total_harga['transaksi_jumlah_harga_total'];
    } else {
        $tampil_jumlah_total_harga = 0;
    }
    /* End Deklarasi Fungsi Untuk Menghitung Total Harga */

    /* Start Fungsi Tampil Kembalian */
    $get_table_data_laporan_transaksi = mysqli_query($conn, "SELECT * FROM laporan_transaksi WHERE nomor_transaksi='$ambil_nomor_transaksi'");
    $get_field_data_laporan_transaksi = mysqli_fetch_assoc($get_table_data_laporan_transaksi);

    if (empty($get_field_data_laporan_transaksi['nominal_kembalian'])) {
        $tampil_kembalian = 0;
    } else {
        $tampil_kembalian = $get_field_data_laporan_transaksi['nominal_kembalian'];
    }

    /* End Fungsi Tampil Kembalian */
}


/* End Get Table data_transaksi Sesuai Nomor Transaksi*/

/* Start Tambah Data Barang Pada Transaksi */
if (isset($_POST['tambah_data_barang_transaksi'])) {
    //$input_nomor_transaksi = $_POST['nomor_transaksi'];
    $input_id_data = $_POST['id_data_barang_transaksi'];
    $input_nama_data = $_POST['nama_data_barang_transaksi'];
    $input_nomor_data = $_POST['nomor_data_barang_transaksi'];
    $input_kategori_data = $_POST['kategori_data_barang_transaksi'];
    $input_jumlah_data = 1;
    $input_harga_data = $_POST['harga_data_barang_transaksi'];
    $input_total_harga = $input_harga_data * $input_jumlah_data;


    mysqli_query($conn, "INSERT INTO data_transaksi VALUES ('','$ambil_nomor_transaksi','$input_id_data','$input_nama_data','$input_nomor_data','$input_kategori_data','$input_jumlah_data','$input_harga_data','$input_total_harga')");
    echo "<script> location.replace('?halaman=transaksi&nomor=" . $ambil_nomor_transaksi . "'); </script>";
}
/* End Tambah Data Barang Pada Transaksi */

/* Start Ajax Untuk Mencari Barang */
if (!empty($_POST['keyword'])) {
    include "config.php";

    $cari = trim(strip_tags($_POST['keyword']));

    // Mendapatkan Data Barang
    $get_barang = mysqli_query($conn, "SELECT * FROM data_barang WHERE (nama_barang LIKE '%$cari%' OR nomor_barang LIKE '%$cari%')");

    if (mysqli_num_rows($get_barang) > 0) { ?>
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered display text-center" width="100%">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Sisa Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($get_barang as $row) { ?>
                        <tr>
                            <td><?php echo $row['nomor_barang']; ?></td>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td><?php echo $row['kategori_barang']; ?></td>
                            <td><?php echo $row['stok_barang']; ?></td>
                            <td><?php echo $row['harga_barang']; ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" value="<?php echo $row['id_data_barang']; ?>" name="id_data_barang_transaksi">
                                    <input type="hidden" value="<?php echo $row['nama_barang']; ?>" name="nama_data_barang_transaksi">
                                    <input type="hidden" value="<?php echo $row['nomor_barang']; ?>" name="nomor_data_barang_transaksi">
                                    <input type="hidden" value="<?php echo $row['kategori_barang']; ?>" name="kategori_data_barang_transaksi">
                                    <input type="hidden" value="<?php echo $row['harga_barang']; ?>" name="harga_data_barang_transaksi">
                                    <button type="submit" name="tambah_data_barang_transaksi" class="btn btn-sm btn-success">Tambah</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
<?php } else {
        echo '<div class="alert border-0 bg-light-danger fade show py-2"> <div class="d-flex align-items-center"> <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i> </div> <div class="ms-3"> <div class="text-danger">Data Tidak Ditemukan !</div> </div></div></div>';
    }
}
/* End Ajax Untuk Mencari Barang */

/* Start Ubah Data Jumlah dan Harga Pada Item Transaksi */
if (isset($_POST['ubah_data_transaksi'])) {
    $input_id_data = $_POST['id_data_transaksi'];
    $input_jumlah_data = $_POST['jumlah_data'];
    $input_harga_data = $ambil_data_nomor_transaksi['harga_barang'];

    $input_total_harga = $input_harga_data * $input_jumlah_data;

    mysqli_query($conn, "UPDATE data_transaksi SET jumlah_barang='$input_jumlah_data',total_harga_barang='$input_total_harga' WHERE id_data_barang='$input_id_data' AND nomor_transaksi='$ambil_nomor_transaksi'");
    echo "<script> location.replace('?halaman=transaksi&nomor=" . $ambil_nomor_transaksi . "'); </script>";
}
/* End Ubah Data Jumlah dan Harga Pada Item Transaksi */

/* Start Fungsi Pembayaran Tagihan */
if (isset($_POST['bayar_tagihan'])) {
    //echo '<script>alert("Hello! I am an alert box!!");</script>';
    $input_bayar = $_POST['uang_bayar'];
    if ($input_bayar < $tampil_jumlah_total_harga) {
        echo '<script>alert("Uang Pembayaran Kurang !!");</script>';
    } else {
        for ($i = 1; $i <= $rows_data_nomor_transaksi; $i++) {
            $id_data = $_POST['id_data' . $i];
            $jumlah_data = $_POST['jumlah_data' . $i];

            $get_table_data_barang_dengan_id = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_data_barang='$id_data'");
            $ambil_table_data_barang_dengan_id = mysqli_fetch_assoc($get_table_data_barang_dengan_id);

            $update_stok_transaksi = $ambil_table_data_barang_dengan_id['stok_barang'] - $jumlah_data;

            mysqli_query($conn, "UPDATE data_barang SET stok_barang='$update_stok_transaksi' WHERE id_data_barang='$id_data'");
        }
        $tanggal_bayar = date('d');
        $bulan_bayar = date('F');
        $tahun_bayar = date('Y');
        $tanggal_bulan_tahun = $tanggal_bayar . $bulan_bayar . $tahun_bayar;

        $kembalian = $input_bayar - $tampil_jumlah_total_harga;

        mysqli_query($conn, "INSERT INTO laporan_transaksi VALUES ('','$ambil_nomor_transaksi','$tampil_jumlah_total_harga','$input_bayar','$kembalian','Sudah Bayar','$tanggal_bayar','$bulan_bayar','$tahun_bayar')");
        echo "<script> location.replace('?halaman=transaksi&nomor=" . $ambil_nomor_transaksi . "'); </script>";
    }
}
/* End Fungsi Pembayaran Tagihan */

/* Start Fungsi Simpan Tagihan */
if (isset($_POST['simpan_tagihan'])) {
    mysqli_query($conn, "INSERT INTO laporan_transaksi VALUES ('','$ambil_nomor_transaksi','$tampil_jumlah_total_harga','','','0','','','')");
}
/* Start Fungsi Simpan Tagihan */

/* Start Fungsi Tampil Notif Pembayaran */
if (empty($get_field_data_laporan_transaksi['status_tagihan'])) {
    $tampilan_notif = '<div class="row"><div class="col-lg col-md"> <div class="card radius-10 bg-danger"> <div class="card-body"> <div class="d-flex align-items-center"> <div class=""> <p class="mb-1 text-white"></p> <h4 class="mb-0 text-white">Tagihan Ini Belum Dibayar</h4> </div> <div class="ms-auto fs-2 text-white"> <i class="bi bi-exclamation-circle-fill"></i> </div> </div> </div> </div></div></div>';
} else {
    $tampilan_notif = '<div class="row"><div class="col-lg col-md"> <div class="card radius-10 bg-success"> <div class="card-body"> <div class="d-flex align-items-center"> <div class=""> <p class="mb-1 text-white"></p> <h4 class="mb-0 text-white">Tagihan Ini Sudah Dibayar</h4> </div> <div class="ms-auto fs-2 text-white"> <i class="bi bi-check-circle-fill"></i> </div> </div> </div> </div></div></div>';
}
/* End Fungsi Tampil Notif Pembayaran */