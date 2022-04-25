<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <br />
        <div class="sidenav-header d-flex align-items-center">
            <center>
                <a href="javascript:void(0)">
                    <img src="{{asset ('/assets/img/logo.png')}}" style="width: 40%; height: 40%;" />
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
                @if($level_user==1)
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('dashboard')!!}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('data_user')!!}">
                            <i class="ni ni-circle-08 text-orange"></i>
                            <span class="nav-link-text">Data User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('data_mitra')!!}">
                            <i class="ni ni-delivery-fast text-green"></i>
                            <span class="nav-link-text">Data Mitra</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('data_hub')!!}">
                            <i class="ni ni-shop text-yellow"></i>
                            <span class="nav-link-text">Data Pool</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('data_buyer')!!}">
                            <i class="ni ni-bag-17 text-red"></i>
                            <span class="nav-link-text">Data Buyer</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('data_harga')!!}">
                            <i class="ni ni-money-coins text-green"></i>
                            <span class="nav-link-text">Data Harga</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('data_pesanan')!!}">
                            <i class="ni ni-single-copy-04 text-primary"></i>
                            <span class="nav-link-text">Data Pesanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('barang_keluar')!!}">
                            <i class="ni ni-tag text-orange"></i>
                            <span class="nav-link-text">Barang Keluar</span>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                        <i class="ni ni-diamond text-yellow"></i>
                        <span class="nav-link-text">Pencairan Poin</span>
                      </a>
                      <div class="collapse" id="navbar-tables">
                        <ul class="nav nav-sm flex-column">
                          <li class="nav-item">
                            <a href="{!!url('pencairan_poin')!!}" class="nav-link">
                              <span class="sidenav-mini-icon"> U </span>
                              <span class="sidenav-normal"> User </span>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{!!url('pencairan_poin_mitra')!!}" class="nav-link">
                              <span class="sidenav-mini-icon"> M </span>
                              <span class="sidenav-normal"> Mitra </span>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('laporan')!!}">
                            <i class="ni ni-collection text-green"></i>
                            <span class="nav-link-text">Laporan</span>
                        </a>
                    </li>
                </ul>
                @else
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
                        <a class="nav-link" href="{!!url('inventory')!!}">
                            <i class="ni ni-tag text-orange"></i>
                            <span class="nav-link-text">Inventory</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{!!url('keluar_barang_hub')!!}">
                            <i class="ni ni-curved-next text-green"></i>
                            <span class="nav-link-text">Barang Keluar</span>
                        </a>
                    </li>
                </ul>
                @endif
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
                                            <img alt="Image placeholder" src="{{asset ('/assets/img/theme/team-1.jpg')}}" class="avatar rounded-circle" />
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
                                            <img alt="Image placeholder" src="{{asset ('/assets/img/theme/team-2.jpg')}}" class="avatar rounded-circle" />
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
                                            <img alt="Image placeholder" src="{{asset ('/assets/img/theme/team-3.jpg')}}" class="avatar rounded-circle" />
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
                                            <img alt="Image placeholder" src="{{asset ('/assets/img/theme/team-4.jpg')}}" class="avatar rounded-circle" />
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
                                            <img alt="Image placeholder" src="{{asset ('/assets/img/theme/team-5.jpg')}}" class="avatar rounded-circle" />
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
                                    <img alt="Image placeholder" src="{{asset ('/assets/img/theme/team-4.jpg')}}" />
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm font-weight-bold">Admin J-Lantah</span>
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
                            <form action="logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>Keluar</span>
                            </button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
