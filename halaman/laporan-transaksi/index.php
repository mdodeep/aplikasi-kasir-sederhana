<main class="page-content">
    <div class="table-responsive">
        <table id="dat2" class="table table-striped table-bordered display text-center" width="100%">
            <thead>
                <tr>
                    <th>Nomor Transaksi</th>
                    <th>Total Tagihan</th>
                    <th>Status Tagihan</th>
                    <th>Tanggal Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($get_table_laporan_transaksi as $row_laporan_transaksi) { ?>
                    <tr>
                        <td><?php echo $row_laporan_transaksi['nomor_transaksi']; ?></td>
                        <td><?php echo $row_laporan_transaksi['total_tagihan']; ?></td>
                        <td>
                            <?php
                            if (!empty($row_laporan_transaksi['status_tagihan'])) {
                                echo '<span class="badge bg-success text-white">' . $row_laporan_transaksi['status_tagihan'] . '</span>';
                            } else {
                                echo '<span class="badge bg-danger text-white">Belum Bayar</span>';
                            }

                            ?>
                        </td>
                        <td>
                            <?php
                            if (!empty($row_laporan_transaksi['tanggal_bayar'])) {
                                echo $row_laporan_transaksi["tanggal_bayar"] . " " . $row_laporan_transaksi["bulan_bayar"] . " " .  $row_laporan_transaksi["tahun_bayar"];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="?halaman=transaksi&nomor=<?php echo $row_laporan_transaksi['nomor_transaksi']; ?>" class="btn btn-primary btn-sm px-3 mx-2">Lihat Detail</a>
                            <button type="button" class="btn btn-sm btn-danger px-3" data-bs-toggle="modal" data-bs-target="#hapusdata<?php echo $row_laporan_transaksi['id_laporan']; ?>">Hapus Data</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="hapusdata<?php echo $row_laporan_transaksi['id_laporan']; ?>" tabindex="-1" aria-hidden="true">
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
                                    <a href="?halaman=laporan-transaksi&hapus=<?php echo $row_laporan_transaksi['nomor_transaksi']; ?>" class="btn btn-dark">Iya, Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Table End -->

</main>