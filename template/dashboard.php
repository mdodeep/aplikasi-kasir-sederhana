<main class="page-content">
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

    <div class="row my-5">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-2">Grafik Pendapatan Bulanan</h6>
                    </div>
                    <div id="chart5"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Total Pendapatan Hari Ini</p>
                            <h4 class="mb-0 text-white"><?php echo "Rp " . number_format($pendapatan_hari_ini, 0, ",", "."); ?></h4>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="bi bi-cash-stack"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->
</main>