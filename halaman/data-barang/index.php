<main class="page-content">
    <?php if (isset($_GET['ubah'])) {
        require('edit.php');
    } else {
    ?>
        <div class="row">

            <div class="col-lg-3 col-md-3">
                <div class="card radius-10 bg-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1 text-white">Tanggal Hari Ini</p>
                                <h4 class="mb-0 text-white"><?php echo date("d F Y"); ?></h4>
                            </div>
                            <div class="ms-auto fs-2 text-white">
                                <i class="bi bi-calendar-week-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="card radius-10 bg-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1 text-white">Status Aman</p>
                                <h4 class="mb-0 text-white"><?php echo $total_status_aman; ?></h4>
                            </div>
                            <div class="ms-auto fs-2 text-white">
                                <i class="bi bi-bookmark-check-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="card radius-10 bg-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1 text-white">Status Stok Menipis</p>
                                <h4 class="mb-0 text-white"><?php echo $total_status_stok_menipis; ?></h4>
                            </div>
                            <div class="ms-auto fs-2 text-white">
                                <i class="bi bi-bookmark-dash-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3">
                <div class="card radius-10 bg-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <p class="mb-1 text-white">Segera Stok Ulang !</p>
                                <h4 class="mb-0 text-white"><?php echo $total_status_segera_stok_ulang; ?></h4>
                            </div>
                            <div class="ms-auto fs-2 text-white">
                                <i class="bi bi-bookmark-x-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-end">
            <a href="" class="btn btn-success btn-sm"><i class="bi bi-arrow-clockwise mx-1"></i>Refresh</a>
            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahbarang"><i class="bi bi-plus mx-1"></i>Tambah Data</button>
        </div>
        <hr />

        <!-- Table Start -->
        <div class="table-responsive">
            <table id="dat2" class="table table-striped table-bordered display text-center" width="100%">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($get_table_data_barang as $row_data_barang) { ?>
                        <tr>
                            <td><?php echo $row_data_barang['nomor_barang']; ?></td>
                            <td><?php echo $row_data_barang['nama_barang']; ?></td>
                            <td><?php echo $row_data_barang['kategori_barang']; ?></td>
                            <td><?php echo $row_data_barang['stok_barang']; ?></td>
                            <td><?php echo "Rp " . number_format($row_data_barang['harga_barang'], 0, ",", "."); ?></td>
                            <td>
                                <?php
                                if ($row_data_barang['stok_barang'] >= 15) {
                                    echo '<span class="badge bg-success text-white">Stok Aman</span>';
                                } elseif ($row_data_barang['stok_barang'] >= 10 && $row_data_barang['stok_barang'] <= 14) {
                                    echo '<span class="badge bg-warning text-white">Stok Menipis</span>';
                                } else {
                                    echo '<span class="badge bg-danger text-white">Segera Stok !</span>';
                                }
                                ?>
                            </td>
                            <td><a href="?halaman=data-barang&ubah=<?php echo $row_data_barang['id_data_barang']; ?>" class="btn btn-primary btn-sm px-3 mx-2">Ubah Data</a><button type="button" class="btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#hapusdata<?php echo $row_data_barang['id_data_barang']; ?>">Hapus Data</button></td>
                        </tr>
                        <div class="modal fade" id="hapusdata<?php echo $row_data_barang['id_data_barang']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-white">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-white">
                                        <p>Data ini akan dihapus, apakah anda yakin untuk menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tidak</button>
                                        <a href="?halaman=data-barang&hapus=<?php echo $row_data_barang['id_data_barang']; ?>" class="btn btn-dark">Iya, Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Table End -->

        <!-- Modal Start -->
        <div class="modal fade" id="tambahbarang" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form method="POST" action="">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Data Bengkel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="namabarang" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama_data_barang" placeholder="Masukan Nama" required>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="nomorbarang" class="form-label">Nomor</label>
                                    <input type="text" class="form-control" name="nomor_data_barang" placeholder="Masukan Nomor" required>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="selectkategori" class="form-label">Kategori</label>
                                    <select class="form-select" id="selectkategori" name="kategori_data_barang">
                                        <option value="Barang">Barang</option>
                                        <option value="Layanan">Layanan</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="namabarang" class="form-label">Stok</label>
                                    <input type="number" class="form-control" name="stok_data_barang" placeholder="Masukan Stok" required>
                                </div>
                                <div class="col-lg-12 col-md-12 mt-2">
                                    <label for="namabarang" class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="harga_data_barang" placeholder="Masukan Harga" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="tambah_data_barang" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal End -->
    <?php } ?>
</main>