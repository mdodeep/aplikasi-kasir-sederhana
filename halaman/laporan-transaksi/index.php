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
                        <td><a href="?halaman=transaksi&nomor=<?php echo $row_laporan_transaksi['nomor_transaksi']; ?>" class="btn btn-primary btn-sm px-3 mx-2">Lihat Detail</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Table End -->

</main>