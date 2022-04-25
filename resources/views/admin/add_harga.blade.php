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
                            <li class="breadcrumb-item"><a href="#">Data Harga</a></li>
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
                        <h3 class="mb-0">Tambah Data Harga</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="addData">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom01">Min Range</label>
                                    <input type="text" class="form-control" name="min_range" id="min_range" placeholder="Masukkan Min Range" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Maks Range</label>
                                    <input type="text" class="form-control" id="max_range" name="max_range" placeholder="Masukkan Max Range" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Jumlah</label>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Masukkan Jumlah" required />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Potongan </label>
                                    <input type="text" class="form-control" id="potongan" name="potongan" placeholder="Masukkan Potongan" required />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Tipe </label><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="user_type" id="user_type" value="member" required>
                                    <label class="form-check-label">
                                        Member
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="user_type" id="user_type" value="mitra">
                                    <label class="form-check-label">
                                        Mitra
                                    </label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Status Aktif </label><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="active" id="active" value="1" required>
                                    <label class="form-check-label">
                                        Aktif
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="active" id="active" value="0">
                                    <label class="form-check-label">
                                        Non Aktif
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Deskripsi</label>
                                    <textarea class="form-control" rows="5" name="description" id="description" required></textarea>
                                </div>
                            </div>
                            <div id="notif">
                                <div class="alert alert-danger" role="alert">
                                    Jumlah 'min' tidak boleh besar dari 'maks' !
                                </div>
                            </div>
                            <br />
                            <center>
                                <button class="btn btn-primary" type="submit" onclick="return validate()">Simpan</button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>

    <script>

    $('#notif').hide();

    function validate() {
        var min_range = document.getElementById("min_range").value;
        var max_range = document.getElementById("max_range").value;
        if (min_range < max_range ) {
            $('#notif').show();
            return false;
        }
        return true;
    }

    $(document).ready(function () {
        $('#addData').on('submit', function(event){
            event.preventDefault();

            $.ajax({
                url: "insertHarga",
                type: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success: function (data) {
                    
                    if(data.status==='success') {
                        swal("Sukses!", "Data berhasil disimpan!", "success").then(function() {
                          window.location = "../data_harga";
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