<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

</div>
<!--end wrapper-->


<!-- Bootstrap bundle JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/js/pace.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
<script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/js/table-datatable.php<?php if (isset($_GET['nomor'])) {
                                                echo '?nomor=' . $_GET['nomor'];
                                            } ?>"></script>
<!--app-->
<script src="assets/js/app.js"></script>
<?php if (!isset($_GET['halaman'])) { ?>
    <script src="assets/js/index.php"></script>
<?php } ?>

<?php if (isset($_GET['halaman'])) {
    if ($_GET['halaman'] == "transaksi") {
        echo '<script src="assets/js/ajax-cari-barang.php"></script>';
    }
}
?>

</body>

</html>