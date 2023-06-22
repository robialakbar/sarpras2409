<?php
$id = $this->session->userdata('user_id');
$user = $this->db->get_where('users', ['id_user' => $id])->row_array();
?>
<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <!--plugins-->
    <link href="<?= base_url() ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="<?= base_url() ?>assets/css/pace.min.css" rel="stylesheet" />
    <script src="<?= base_url() ?>assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/app.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dark-theme.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/semi-dark.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/header-colors.css" />

    <?php
    if (!isset($title)) {
        $title = 'SMK 2 Pasundan 2 Cianjur';
    } else {
        $title = $title;
    }
    ?>
    <title><?= $title; ?></title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="mx-auto">
                    <img src="<?= base_url() ?>assets/images/12.png" class="logo-icon" alt="logo icon" style="filter: none !important;">
                </div>
                <div>
                    <!-- <h4 class="logo-text">Dashkote</h4> -->
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">


                <!-- <li class="menu-label">UI Elements</li> -->
                <li>
                    <a href="<?= base_url('dashboard') ?>">
                        <div class="parent-icon"><i class='bx bx-file'></i>
                        </div>
                        <div class="menu-title">Master Data</div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-book-bookmark'></i>
                        </div>
                        <div class="menu-title">Kelola Inventaris</div>
                    </a>
                    <ul>
                        <li> <a href="<?= base_url('inventaris/barang_masuk/') ?>"><i class="bx bx-right-arrow-alt"></i>Barang Masuk</a>
                        </li>
                        <li> <a href="<?= base_url('inventaris/barang_keluar/') ?>"><i class="bx bx-right-arrow-alt"></i>Barang Keluar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('perencanaan') ?>">
                        <div class="parent-icon"><i class='bx bx-calendar-edit'></i>
                        </div>
                        <div class="menu-title">Kelola Perencanaan</div>
                    </a>
                </li>
                <?php if ($this->session->userdata('role') == 'kepala sekolaj') { ?>
                    <li>
                        <a href="<?= base_url('users') ?>">
                            <div class="parent-icon"><i class='bx bx-user'></i>
                            </div>
                            <div class="menu-title">Users</div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('kategori') ?>">
                            <div class="parent-icon"><i class='bx bx-category'></i>
                            </div>
                            <div class="menu-title">Kategori</div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('ruangan') ?>">
                            <div class="parent-icon"><i class='bx bx-door-open'></i>
                            </div>
                            <div class="menu-title">Ruangan</div>
                        </a>
                    </li>
                <?php } ?>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-calendar-week'></i>
                        </div>
                        <div class="menu-title">Peminjaman</div>
                    </a>
                    <ul>
                        <li> <a href="<?= base_url('peminjaman') ?>"><i class="bx bx-right-arrow-alt"></i>Data Peminjaman</a>
                        </li>
                        <li> <a href="<?= base_url('peminjaman/pengembalian') ?>"><i class="bx bx-right-arrow-alt"></i>Data
                                Pengembalian</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('pemeliharaan') ?>">
                        <div class="parent-icon"><i class='bx bx-recycle'></i>
                        </div>
                        <div class="menu-title">Pemeliharaan</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-export'></i>
                        </div>
                        <div class="menu-title">Laporan</div>
                    </a>
                    <ul>
                        <li> <a href="<?= base_url('laporan/barang_masuk/') ?>"><i class="bx bx-right-arrow-alt"></i>Kelola Barang Masuk</a></li>
                        <li> <a href="<?= base_url('laporan/barang_keluar/') ?>"><i class="bx bx-right-arrow-alt"></i>Kelola Barang Keluar</a></li>
                        <li> <a href="<?= base_url('laporan/perencanaan/') ?>"><i class="bx bx-right-arrow-alt"></i>Kelola Perencanaan</a></li>
                        <li> <a href="<?= base_url('laporan/pemeliharaan/') ?>"><i class="bx bx-right-arrow-alt"></i>Kelola Pemeliharaan</a></li>
                        <li> <a href="<?= base_url('laporan/peminjaman/') ?>"><i class="bx bx-right-arrow-alt"></i>Kelola Peminjaman</a></li>
                    </ul>
                </li>

            </ul>

            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="top-menu-left d-none d-lg-block">
                        <ul class="nav">

                        </ul>
                    </div>

                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">

                            </li>
                            <li class="nav-item dropdown dropdown-large">

                            </li>
                            <li class="nav-item dropdown dropdown-large">

                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- <a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a> -->
                                    <div class="header-notifications-list">

                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">

                                <div class="dropdown-menu dropdown-menu-end">

                                    <div class="header-message-list">
                                    </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-bell' style="font-size:25px"></i>
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">Hi, <?= $user['nama'] ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?= base_url('profile') ?>"><i class="bx bx-user"></i><span>Akun
                                        Saya</span></a>
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>