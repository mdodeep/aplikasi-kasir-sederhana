<!-- Start Sidebar -->
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Sonymotor</h4>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!-- Navigation -->
    <ul class="metismenu" id="menu">
        <li>
            <a href="index.php">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">Menu Data Barang</li>
        <li>
            <a href="?halaman=data-barang">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Data Barang</div>
            </a>
        </li>
        <li class="menu-label">Menu Transaksi</li>
        <li>
            <a href="?halaman=transaksi&nomor=<?php echo $nomor_transaksi; ?>">
                <div class="parent-icon"><i class="bi bi-calculator-fill"></i>
                </div>
                <div class="menu-title">Buat Transaksi Baru</div>
            </a>
        </li>
        <li>
            <a href="?halaman=laporan-transaksi">
                <div class="parent-icon"><i class="bi bi-file-text-fill"></i>
                </div>
                <div class="menu-title">Laporan Transaksi</div>
            </a>
        </li>
    </ul>
    <!-- End Navigation -->
</aside>
<!-- End Sidebar -->