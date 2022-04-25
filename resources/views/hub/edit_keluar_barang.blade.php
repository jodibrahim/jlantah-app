@extends('template.app') 
@section('content')

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
                            <li class="breadcrumb-item"><a href="#">Data Hub</a></li>
                            <li class="breadcrumb-item"><a href="#">Edit Data </a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- Card stats -->
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Edit Data Keluar Barang</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <hr />
                        <form class="needs-validation" novalidate>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom01">Tanggal</label>
                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Masukkan Tanggal" required />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Nama Sopir</label>
                                    <input type="text" class="form-control" id="validationCustom02" placeholder="Masukkan Nama Sopir" required />
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Telepon</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Masukkan Telepon" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Plat Kendaraan</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="Masukkan Plat Kendaraan" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Tujuan</label>
                                    <input type="text" class="form-control" id="validationCustom03" placeholder="Masukkan Tujuan" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Jumlah (Liter)</label>
                                    <input type="text" class="form-control" id="validationCustom04" placeholder="Masukkan Jumlah" required />
                                    <div class="invalid-feedback">
                                        Please provide a valid state.
                                    </div>
                                </div>
                            </div>
                            
                            <br />
                            <center>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>

@endsection