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
                            <li class="breadcrumb-item"><a href="#">Tambah Data </a></li>
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
                        <h3 class="mb-0">Tambah Data Keluar Barang</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <hr />
                        <form id="addData">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Nama Pool</label>
                                    <select class="form-control" name="hub_id" required>
                                        <option value="">-Pilih Pool-</option>
                                        @foreach($pool as $data)
                                        <option value="{{$data['id']}}">{{$data['nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Nama Buyer</label>
                                    <select class="form-control" name="buyer_id" required>
                                        <option value="">-Pilih Buyer-</option>
                                        @foreach($buyer as $data)
                                        <option value="{{$data['_id']}}">{{$data['nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Driver</label>
                                    <input type="text" class="form-control" name="nama_driver" placeholder="Masukkan Nama Driver" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Plat Kendaraan</label>
                                    <input type="text" class="form-control" name="nomor_kendaraan" placeholder="Masukkan Plat Kendaraan" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Telepon</label>
                                    <input type="text" class="form-control" name="phone_driver" placeholder="Masukkan Telepon Driver" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Jumlah (Liter)</label>
                                    <input type="text" class="form-control" name="jumlah_liter" placeholder="Masukkan Jumlah Liter" required />
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

    <script type="text/javascript">
        
        $(document).ready(function () {
            $('#addData').on('submit', function(event){
                event.preventDefault();

                $.ajax({
                    url: "insertBarang",
                    type: "POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType:"json",
                    success: function (data) {
                        
                        if(data.status==='success') {
                            swal("Sukses!", "Data berhasil disimpan!", "success").then(function() {
                              window.location = "../barang_keluar";
                            });  
                        } else {
                           swal("Gagal!", ""+data.message+"", "error")
                        }
                    },
                });
                
            });
        });
    </script>

@endsection