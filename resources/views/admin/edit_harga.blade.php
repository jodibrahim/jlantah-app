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
                        <h3 class="mb-0">Edit  Harga</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="editData">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="price_id" value="{{$harga['_id']}}">
                            <input type="hidden" name="category_id" value="{{$harga['category_id']}}">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom01">Min Range</label>
                                    <input type="text" class="form-control" name="min_range" id="min_range" placeholder="Masukkan Min Range" required value="{{$harga['min_range']}}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Maks Range</label>
                                    <input type="text" class="form-control" id="max_range" name="max_range" placeholder="Masukkan Max Range" required value="{{$harga['max_range']}}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Jumlah</label>
                                    <input type="text" class="form-control" id="amount" name="amount" placeholder="Masukkan Jumlah" required value="{{$harga['amount']}}"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Potongan </label>
                                    <input type="text" class="form-control" id="potongan" name="potongan" placeholder="Masukkan Potongan" required value="{{$harga['potongan']}}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Tipe </label><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="user_type" id="user_type" value="member" required <?=($harga['user_type']== 'member') ? "checked" : "" ;?> />
                                    <label class="form-check-label">
                                        Member
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="user_type" id="user_type" value="mitra" <?=($harga['user_type']== 'mitra') ? "checked" : "" ;?> />
                                    <label class="form-check-label">
                                        Mitra
                                    </label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Status Aktif </label><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="active" id="active" value="1" required <?=($harga['active']== '1') ? "checked" : "" ;?> />
                                    <label class="form-check-label">
                                        Aktif
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="active" id="active" value="0"  <?=($harga['active']== '0') ? "checked" : "" ;?> />
                                    <label class="form-check-label">
                                        Non Aktif
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Deskripsi</label>
                                    <textarea class="form-control" rows="5" name="description" id="description" required>{{$harga['description']}}</textarea>
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
        // var min_range = document.getElementById("min_range").value;
        // var max_range = document.getElementById("max_range").value;
        // if (max_range < min_range ) {
        //     $('#notif').show();
        //     return false;
        // }
        // return true;
    }

    $(document).ready(function () {
        $('#editData').on('submit', function(event){
            event.preventDefault();

            var _token = $("input[name='_token']").val();
            var price_id = $("input[name='price_id']").val();
            var category_id = $("input[name='category_id']").val();
            var user_type = $('input[name="user_type"]:checked').val();
            var min_range = $("input[name='min_range']").val();
            var max_range = $("input[name='max_range']").val();
            var amount = $("input[name='amount']").val();
            var potongan = $("input[name='potongan']").val();
            var description = $('textarea#description').val();
            var active = $('input[name="active"]:checked').val();

            $.ajax({
                url: "../updateHarga",
                type: "PUT",
                data: { _token: _token, price_id: price_id, category_id: category_id, user_type:user_type, min_range:min_range, max_range:max_range, amount:amount, potongan:potongan, description:description, active:active },
                success: function (data) {
                    
                    if(data.status==='success') {
                        swal("Sukses!", "Data berhasil disimpan!", "success").then(function() {
                          window.location = "../../data_harga";
                        });  
                    } else {
                       swal("Gagal!", "Data gagal disimpan!", "error")
                    }

                },
            });
            
        });
    });


    

    </script>

@endsection