<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konco Lawas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= base_url('AdminLTE')?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE')?>/dist/css/adminlte.min.css">

    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('AdminLTE')?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <!-- ChartJS -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/Logout')?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="<?=base_url('AdminLTE')?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Konco Lawas</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?=base_url('AdminLTE')?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('nama_user')?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <!-- Proteksi Halaman Admin -->
                        <?php if(session()->level == 1) :?>
                        <li class="nav-item">
                            <a href="<?=base_url('Admin')?>"
                                class="nav-link <?= $menu == 'dashboard' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Penjualan')?>"
                                class="nav-link <?= $menu == 'penjualan' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-solid fa-cash-register"></i>
                                <p>
                                    Penjualan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Transaksi')?>"
                                class="nav-link <?= $menu == 'transaksi' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-solid fa-cash-register"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Produk')?>"
                                        class="nav-link <?= $submenu == 'produk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Kategori')?>"
                                        class="nav-link <?= $submenu == 'kategori' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Satuan')?>"
                                        class="nav-link <?= $submenu == 'satuan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Satuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Bahan')?>"
                                        class="nav-link <?= $submenu == 'bahan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bahan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('User')?>"
                                        class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" <?= $menu == 'laporan' ? 'menu-open' : '' ?>>
                            <a href="#" class="nav-link <?= $menu == 'laporan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Laporan Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Laporan/LaporanHarian')?>"
                                        class="nav-link <?= $submenu == 'laporan-harian' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Harian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Laporan/LaporanBulanan')?>"
                                        class="nav-link <?= $submenu == 'laporan-bulanan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Bulanan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Laporan/LaporanTahunan')?>"
                                        class="nav-link <?= $submenu == 'laporan-tahunan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Tahunan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <?php endif; ?>

                        <!-- Proteksi Halaman Kasir -->
                        <?php if(session()->level == 2): ?>
                        <li class="nav-item">
                            <a href="<?= base_url('Penjualan')?>"
                                class="nav-link <?= $menu == 'penjualan' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-solid fa-cash-register"></i>
                                <p>
                                    Penjualan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Transaksi')?>"
                                class="nav-link <?= $menu == 'transaksi' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-solid fa-cash-register"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Produk')?>"
                                        class="nav-link <?= $submenu == 'produk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Produk</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php endif; ?>

                        <!-- Proteksi Halaman Karyawan Gudang -->
                        <?php if(session()->level == 3): ?>
                        <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Produk')?>"
                                        class="nav-link <?= $submenu == 'produk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Kategori')?>"
                                        class="nav-link <?= $submenu == 'kategori' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Satuan')?>"
                                        class="nav-link <?= $submenu == 'satuan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Satuan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Bahan')?>"
                                        class="nav-link <?= $submenu == 'bahan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bahan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <?php endif; ?>
                        <!-- Proteksi Halaman Pemilik -->
                        <?php if(session()->level == 4): ?>
                        <li class="nav-item">
                            <a href="<?=base_url('Admin')?>"
                                class="nav-link <?= $menu == 'dashboard' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Transaksi')?>"
                                class="nav-link <?= $menu == 'transaksi' ? 'active' : ''?>">
                                <i class="nav-icon fas fa-solid fa-cash-register"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item <?= $menu == 'masterdata' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link <?= $menu == 'masterdata' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Produk')?>"
                                        class="nav-link <?= $submenu == 'produk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Produk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Bahan')?>"
                                        class="nav-link <?= $submenu == 'bahan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bahan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('User')?>"
                                        class="nav-link <?= $submenu == 'user' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item" <?= $menu == 'laporan' ? 'menu-open' : '' ?>>
                            <a href="#" class="nav-link <?= $menu == 'laporan' ? 'active' : '' ?>">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Laporan Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('Laporan/LaporanHarian')?>"
                                        class="nav-link <?= $submenu == 'laporan-harian' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Harian</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                <a href="<?= base_url('Laporan/LaporanBulanan')?>"
                                        class="nav-link <?= $submenu == 'laporan-bulanan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Bulanan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('Laporan/LaporanTahunan')?>"
                                        class="nav-link <?= $submenu == 'laporan-tahunan' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Laporan Tahunan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $judul ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><?= $judul ?></a></li>
                                <li class="breadcrumb-item active"><?= $subjudul ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Isi Konten -->
                        <?php
                                if($page){
                                    echo view($page);
                                }
                            ?>
                        <!-- Isi Konten -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <?= date('d M Y')?>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->



</body>

</html>