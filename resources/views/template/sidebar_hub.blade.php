<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <br />
        <div class="sidenav-header d-flex align-items-center">
            <center>
                <a href="javascript:void(0)">
                    <img src="assets/img/logo.png" style="width: 40%; height: 40%;" />
                </a>
            </center>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
            </div>
        </div>
        <hr />
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('dashboard_hub')!!}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('data_pesanan_hub')!!}">
                            <i class="ni ni-single-copy-04 text-primary"></i>
                            <span class="nav-link-text">Data Pesanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('list_inventory')!!}">
                            <i class="ni ni-tag text-orange"></i>
                            <span class="nav-link-text">Inventory</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('keluar_barang_hub')!!}">
                            <i class="ni ni-curved-next text-green"></i>
                            <span class="nav-link-text">Keluar Barang</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar links -->
                <ul class="navbar-nav align-items-center ml-md-auto">
                    <li class="nav-item d-xl-none">
                        <!-- Sidenav toggler -->
                        <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-sm-none">
                        <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                            <i class="ni ni-zoom-split-in"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-bell-55"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                            <!-- Dropdown header -->
                            <div class="px-3 py-3">
                                <h6 class="text-sm text-muted m-0">Anda mendapatkan <strong class="text-primary">13</strong> notifikasi.</h6>
                            </div>
                            <!-- List group -->
                            <div class="list-group list-group-flush">
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="assets/img/theme/team-1.jpg" class="avatar rounded-circle" />
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">Lian</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>11:30</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Mengambil orderan user</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="assets/img/theme/team-2.jpg" class="avatar rounded-circle" />
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">Peter</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>11:25</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Membuat pesanan baru</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="assets/img/theme/team-3.jpg" class="avatar rounded-circle" />
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">John</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>11:12</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Membuat orderan baru</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" class="avatar rounded-circle" />
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">Felix</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>11:05</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Membuat orderan baru</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="#!" class="list-group-item list-group-item-action">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <img alt="Image placeholder" src="assets/img/theme/team-5.jpg" class="avatar rounded-circle" />
                                        </div>
                                        <div class="col ml--2">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h4 class="mb-0 text-sm">Phill</h4>
                                                </div>
                                                <div class="text-right text-muted">
                                                    <small>10:09</small>
                                                </div>
                                            </div>
                                            <p class="text-sm mb-0">Mengambil orderan user</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- View all -->
                            <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">Lihat Semua</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="assets/img/theme/team-4.jpg" />
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm font-weight-bold">Hub J-Lantah</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">SELAMAT DATANG!</h6>
                            </div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>Profil</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#!" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Keluar</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
