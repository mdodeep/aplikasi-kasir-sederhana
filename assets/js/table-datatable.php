<?php header("Content-type: application/javascript"); ?>
<?php require('../../config.php');
if (isset($_GET['nomor'])) {
    $ambil_nomor_transaksi = $_GET['nomor'];
    $get_table_data_laporan_transaksi = mysqli_query($conn, "SELECT * FROM laporan_transaksi WHERE nomor_transaksi='$ambil_nomor_transaksi'");
    $get_field_data_laporan_transaksi = mysqli_fetch_assoc($get_table_data_laporan_transaksi);
} ?>

$(function() {
"use strict";

$(document).ready(function() {
$('#dat1').DataTable();
});


$(document).ready(function() {
var table = $('#dat2').DataTable({
lengthChange: false,
dom: 'Bfrtip',
buttons: [{
extend: 'pdfHtml5',
download: 'open',
messageTop: 'Data Barang dan Layanan',
text: '<i class="bi bi-file-pdf-fill"></i> PDF',
exportOptions: {
columns: ':visible',
},
footer: true,
},
{
extend: 'excelHtml5',
text: '<i class="bi bi-file-spreadsheet-fill"></i> Excel',
exportOptions: {
columns: ':visible'
},
footer: true
},
{
extend: 'colvis',
text: 'Tampilan Kolom',
}
],
});

table.buttons().container()
.appendTo('#example2_wrapper .col-md-6:eq(0)');
});
<?php if (isset($_GET['nomor'])) { ?>
    $(document).ready(function() {
    var table = $('#dat3').DataTable({
    lengthChange: false,
    dom: 'Bfrtip',
    buttons: [{
    extend: 'pdfHtml5',
    download: 'open',
    messageTop: 'Faktur Pembelian <?php echo "Tanggal : " . $get_field_data_laporan_transaksi["tanggal_bayar"] . " " . $get_field_data_laporan_transaksi["bulan_bayar"] . " " .  $get_field_data_laporan_transaksi["tahun_bayar"]; ?>',
    text: '<i class="bi bi-file-pdf-fill"></i> PDF',
    exportOptions: {
    columns: ':visible',
    },
    footer: true,
    },
    {
    extend: 'excelHtml5',
    text: '<i class="bi bi-file-spreadsheet-fill"></i> Excel',
    exportOptions: {
    columns: ':visible'
    },
    footer: true
    }
    ],
    });

    table.buttons().container()
    .appendTo('#example3_wrapper .col-md-6:eq(0)');
    });
<?php } ?>
});