@extends('template.app') 
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item">
                                <a href="#"><i class="fas fa-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
              <a href="#" class="btn btn-sm btn-neutral">New</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div> -->
            </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-12 col-md-12">
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" style="color:#fff">Tanggal Awal</label>
                                    <input type="text" class="form-control" id="datepicker" placeholder="Masukkan Tanggal Awal" required />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-control-label" style="color:#fff">Tanggal Akhir</label>
                                    <input type="text" class="form-control" id="datepicker1" placeholder="Masukkan Tanggal Akhir" required />
                                </div>
                                <div class="col-md-4 mb-3">
                                    <button type="button" class="btn btn-primary" style="margin-top:30px">Filter</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Order</h5>
                                    <span class="h2 font-weight-bold mb-0">1230</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Sejak Bulan Lalu</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total User</h5>
                                    <span class="h2 font-weight-bold mb-0">2450</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Sejak Bulan Lalu</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Kurir</h5>
                                    <span class="h2 font-weight-bold mb-0">1200</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Sejak Bulan Lalu</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total Volume</h5>
                                    <span class="h2 font-weight-bold mb-0">4965 L</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                <span class="text-nowrap">Sejak Bulan Lalu</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-8">
            <div class="card bg-default">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-light text-uppercase ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 text-white mb-0">Total Order</h5>
                        </div>
                        <div class="col">
                            <ul class="nav nav-pills justify-content-end">
                                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                    <!--<a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">-->
                                    <!--    <span class="d-none d-md-block">Bulanan</span>-->
                                    <!--    <span class="d-md-none">B</span>-->
                                    <!--</a>-->
                                </li>
                                <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                    <!--<a href="#" class="nav-link py-2 px-3" data-toggle="tab">-->
                                    <!--    <span class="d-none d-md-block">Mingguan</span>-->
                                    <!--    <span class="d-md-none">M</span>-->
                                    <!--</a>-->
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Grafik</h6>
                            <h5 class="h3 mb-0">Volume Transaksi (Liter)</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Order Terbaru</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">User</th>
                                <th scope="col">Mitra</th>
                                <th scope="col">Jumlah (Liter)</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    John
                                </th>
                                <td>
                                    Phill
                                </td>
                                <td>
                                    6
                                </td>
                                <td><i class="fas fa-arrow-up text-success mr-3"></i> Pick</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Edu
                                </th>
                                <td>
                                    Mick
                                </td>
                                <td>
                                    3
                                </td>
                                <td><i class="fas fa-arrow-down text-warning mr-3"></i> Order</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Fabio
                                </th>
                                <td>
                                    Capello
                                </td>
                                <td>
                                    20
                                </td>
                                <td><i class="fas fa-arrow-down text-warning mr-3"></i> Waiting</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Eric
                                </th>
                                <td>
                                    Cantona
                                </td>
                                <td>
                                    3
                                </td>
                                <td><i class="fas fa-arrow-up text-success mr-3"></i> End</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Andrey
                                </th>
                                <td>
                                    Sheva
                                </td>
                                <td>
                                    19
                                </td>
                                <td><i class="fas fa-arrow-down text-danger mr-3"></i> End</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Pencairan</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Selengkapnya </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Poin</th>
                                <th scope="col">Presentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Micheal
                                </th>
                                <td>
                                    1,480
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">60%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Zola
                                </th>
                                <td>
                                    5,480
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">70%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Pep
                                </th>
                                <td>
                                    4,807
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">80%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Van
                                </th>
                                <td>
                                    3,678
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">75%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Elliot
                                </th>
                                <td>
                                    2,645
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="mr-2">30%</span>
                                        <div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>
    

    @endsection
