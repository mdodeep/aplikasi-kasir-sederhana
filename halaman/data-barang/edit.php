<?php
$get_id_data_barang = abs((int)$_GET['ubah']);

// Mendapatkan Data Barang
$get_data_barang_dengan_id = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_data_barang='$get_id_data_barang'");
$cek_id_data_barang = mysqli_num_rows($get_data_barang_dengan_id);
if ($cek_id_data_barang == 1) {
    $get_data_barang_edit = mysqli_fetch_assoc($get_data_barang_dengan_id);

    if ($get_data_barang_edit['kategori_barang'] == "Barang") {
        $val = '<option value="Barang">Barang</option> <option value="Layanan">Layanan</option>';
    } else {
        $val = '<option value="Layanan">Layanan</option> <option value="Barang">Barang</option>';
    }

    if (isset($_POST['ubah_data_barang'])) {
        $nama_data_barang = $_POST['nama_data_barang'];
        $nomor_data_barang = $_POST['nomor_data_barang'];
        $kategori_data_barang = $_POST['kategori_data_barang'];
        $stok_data_barang = $_POST['stok_data_barang'];
        $harga_data_barang = $_POST['harga_data_barang'];

        mysqli_query($conn, "UPDATE data_barang SET nomor_barang='$nomor_data_barang',nama_barang='$nama_data_barang',kategori_barang='$kategori_data_barang',stok_barang='$stok_data_barang',harga_barang='$harga_data_barang' WHERE id_data_barang='$get_id_data_barang'");
        echo "<script> location.replace('?halaman=data-barang'); </script>";
    }


?>
    <h6 class="mb-0 text-uppercase">Edit Data</h6>
    <hr>

    <div class="table-responsive mt-3">
        <table class="table align-middle table-striped">
            <form method="post" action="">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>
                            <input type="text" class="form-control" name="nama_data_barang" placeholder="Masukan Nama" value="<?php echo $get_data_barang_edit['nama_barang']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Nomor</td>
                        <td>
                            <input type="text" class="form-control" name="nomor_data_barang" placeholder="Masukan Nomor" value="<?php echo $get_data_barang_edit['nomor_barang']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select class="form-select" id="selectkategori" name="kategori_data_barang">
                                <?php echo $val; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td>
                            <input type="number" class="form-control" name="stok_data_barang" placeholder="Masukan Stok" value="<?php echo $get_data_barang_edit['stok_barang']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>
                            <input type="number" class="form-control" name="harga_data_barang" placeholder="Masukan Harga" value="<?php echo $get_data_barang_edit['harga_barang']; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-end"><a href="?halaman=data-barang" class="btn btn-danger mx-3">Batalkan</a><button type="submit" name="ubah_data_barang" class="btn btn-primary">Ubah Data</button></td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
<?php } else {
    echo '<div class="alert border-0 bg-light-danger fade show py-2"> <div class="d-flex align-items-center"> <div class="fs-3 text-danger"><i class="bi bi-x-circle-fill"></i> </div> <div class="ms-3"> <div class="text-danger">Data Tidak Ditemukan !</div> </div></div></div><div class="text-center"><a href="?halaman=data-barang" class="btn btn-sm btn-danger">Kembali</a></div>';
} ?>