<main class="page-content">
    <?php if (empty($get_field_data_laporan_transaksi['status_tagihan'])) { ?>
        <div class="row">

            <div class="col-lg col-md">
                <div class="card radius-10 border-0 border-start border-info border-3">
                    <div class="card-body">
                        <div class="card-header mb-3">
                            <h5 class="card-title"><i class="bi bi-search"></i> Cari Barang</h5>
                        </div>
                        <input type="hidden" id="nomor_transaksi" name="nomor_transaksi" value="<?php echo $ambil_nomor_transaksi; ?>">
                        <input type="text" id="cari" class="form-control" name="cari" placeholder="Masukan Nama atau Nomor Data">
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg col-md">
                <div class="card radius-10 border-0 border-start border-info border-3">
                    <div class="card-body">
                        <div class="card-header mb-3">
                            <h5 class="card-title"><i class="bi bi-list-ul"></i> Hasil Pencarian</h5>
                        </div>
                        <div id="hasil_cari"></div>
                        <div id="tunggu"></div>
                    </div>
                </div>
            </div>

        </div>
    <?php } else {
    } ?>

    <div class="row my-4">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <p class="label-form h6 pb-4">Nomor Tagihan : <?php echo $ambil_nomor_transaksi; ?></p>
                </div>
                <?php if (!empty($get_field_data_laporan_transaksi['status_tagihan'])) { ?>
                    <div class="col-lg-6 col-md-6 text-end">
                        <p class="label-form h6 pb-4">Dibayar Pada Tanggal : <?php echo $get_field_data_laporan_transaksi["tanggal_bayar"] . " " . $get_field_data_laporan_transaksi["bulan_bayar"] . " " .  $get_field_data_laporan_transaksi["tahun_bayar"]; ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="table-responsive">
                <table id="dat<?php if (!empty($get_field_data_laporan_transaksi['status_tagihan'])) {
                                    echo "3";
                                } ?>" class="table w-100">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <?php if (empty($get_field_data_laporan_transaksi['status_tagihan'])) { ?>
                                <th>Aksi</th>
                            <?php } else {
                            } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($get_data_nomor_transaksi as $row_transaksi) { ?>
                            <tr>
                                <td><?php echo $row_transaksi['nomor_barang']; ?></td>
                                <td><?php echo $row_transaksi['nama_barang']; ?></td>
                                <td><?php echo $row_transaksi['kategori_barang']; ?></td>
                                <td>
                                    <?php if (empty($get_field_data_laporan_transaksi['status_tagihan'])) { ?>
                                        <form method="post" action="">
                                            <div class="col-lg-6">
                                                <input class="form-control" type="number" name="jumlah_data" value="<?php echo $row_transaksi['jumlah_barang']; ?>">
                                            </div>
                                        <?php } else {
                                        echo $row_transaksi['jumlah_barang'];
                                    } ?>
                                </td>
                                <td>
                                    <?php echo "Rp " . number_format($row_transaksi['total_harga_barang'], 0, ",", "."); ?>
                                </td>

                                <?php if (empty($get_field_data_laporan_transaksi['status_tagihan'])) { ?>
                                    <td>
                                        <input type="hidden" name="id_data_transaksi" value="<?php echo $row_transaksi['id_data_barang']; ?>">
                                        <button type="submit" class="btn btn-sm btn-success text-center" name="ubah_data_transaksi">Update</button>
                                        <a class="btn btn-sm btn-danger text-center mx-2" href="?halaman=transaksi&nomor=<?php echo $ambil_nomor_transaksi; ?>&hapus=<?php echo $row_transaksi['id_data_barang']; ?>"><i style="margin-left: 0 !important" class="bi bi-trash-fill"></i></a>
                                    </td>
                                <?php } else {
                                } ?>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total Tagihan</th>
                            <th><?php echo "Rp " . number_format($tampil_jumlah_total_harga, 0, ",", "."); ?></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <?php echo $tampilan_notif; ?>
    <div class="row">
        <div class="col-lg col-md">
            <div class="card radius-10 border-0 border-end border-start border-info border-3">
                <div class="card-body">
                    <div class="card-header mb-4">
                        <h5 class="card-title mb-4"><i class="bi bi-cash-stack"></i> Pembayaran</h5>
                    </div>
                    <form method="POST" action="">
                        <?php $i = 1;
                        $x = 1;
                        foreach ($get_data_nomor_transaksi as $rows) { ?>
                            <input type="hidden" name="id_data<?php echo $i++; ?>" value="<?php echo $rows['id_data_barang']; ?>">
                            <input type="hidden" name="jumlah_data<?php echo $x++; ?>" value="<?php echo $rows['jumlah_barang']; ?>">
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 h4 mb-4">
                                Total Tagihan :
                                <?php echo "Rp " . number_format($tampil_jumlah_total_harga, 0, ",", "."); ?>
                            </div>

                            <?php
                            if (empty($get_field_data_laporan_transaksi['status_tagihan'])) { ?>
                                <div class="col-lg-6 col-md">
                                    <input type="number" class="form-control" name="uang_bayar">
                                </div>
                                <div class="col-lg-auto col-md">
                                    <button type="submit" name="bayar_tagihan" class="btn btn-success"><i class="bi bi-credit-card-fill"></i> Bayar Tagihan</button>
                                </div>

                                <div class="col-lg-auto col-md">
                                    <button type="submit" name="simpan_tagihan" class="btn btn-warning"><i class="bi bi-archive-fill"></i> Simpan Tagihan</button>
                                </div>
                            <?php } else {
                                echo "";
                            } ?>

                        </div>
                        <hr class="mt-0 mb-4">
                    </form>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 h4 text-end">
                            Total Kembalian : <?php echo "Rp " . number_format($tampil_kembalian, 0, ",", "."); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</main>