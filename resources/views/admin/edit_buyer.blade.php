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
                            <li class="breadcrumb-item"><a href="#">Data Buyer</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                  <a href="{!!('add_hub')!!}" class="btn btn-sm btn-neutral">Edit Data</a>
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
                        <h3 class="mb-0">Edit Data Buyer  </h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="editData">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="id" value="{{$buyer['_id']}}">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom01">Nama Buyer </label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Buyer" required value="{{$buyer['nama']}}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom02">Kode Buyer</label>
                                    <input type="text" class="form-control" id="kode" name="kode" placeholder="Masukkan Kode Buyer" required value="{{$buyer['kode']}}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Nama PIC</label>
                                    <input type="text" class="form-control" id="nama_pic" name="nama_pic" placeholder="Masukkan PIC/Penanggungjawab" required value="{{$buyer['nama_pic']}}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Telepon</label>
                                    <input type="text" class="form-control" id="phone_pic" name="phone_pic" placeholder="Masukkan Telepon" required value="{{$buyer['phone_pic']}}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <center>
                                        <div id="googleMapHub" style="width: 100%; height: 380px;"></div>
                                    </center>
                                </div>
                            </div>
                            <div class="form-row" hidden>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Latitude</label>
                                    <input type="text" class="form-control" id="lat" name="lat" placeholder="Masukkan Latitude" required value="{{$buyer['alamat']['0']['latitude']}}"/>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Longitude</label>
                                    <input type="text" class="form-control" id="long" name="long" placeholder="Masukkan Longitude" required value="{{$buyer['alamat']['0']['longitude']}}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi" required>
                                        <option value="">-Pilih Provinsi-</option>
                                        @foreach($province as $prov)
                                            <option value="{{$prov['lokasi_propinsi']}}"
                                            @if($prov['lokasi_propinsi'] == $buyer['alamat']['0']['provinsi'])
                                            selected 
                                            @endif
                                            >{{$prov['lokasi_nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Kabupaten/Kota</label>
                                    <select class="form-control" name="kota" id="kota" required>
                                        <option value="">-Pilih Kabupaten / Kota-</option>
                                        @foreach($district as $dis)
                                            <option value="{{$dis['lokasi_kabupatenkota']}}"
                                            @if($dis['lokasi_kabupatenkota'] == $buyer['alamat']['0']['kota'])
                                            selected 
                                            @endif
                                            >{{$dis['lokasi_nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Kecamatan</label>
                                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                                        <option value="">-Pilih Kecamatan-</option>
                                        @foreach($subdistrict as $sub)
                                            <option value="{{$sub['lokasi_kecamatan']}}"
                                            @if($sub['lokasi_kecamatan'] == $buyer['alamat']['0']['kecamatan'])
                                            selected 
                                            @endif
                                            >{{$sub['lokasi_nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Kelurahan</label>
                                    <select class="form-control" name="kelurahan" id="kelurahan" required>
                                        <option value="">-Pilih Kelurahan-</option>
                                        @foreach($village as $vil)
                                            <option value="{{$vil['lokasi_kelurahan']}}"
                                            @if($vil['lokasi_kelurahan'] == $buyer['alamat']['0']['kelurahan'])
                                            selected 
                                            @endif
                                            >{{$vil['lokasi_nama']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Kode Pos</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Masukkan Kode Pos" required value="{{$buyer['alamat']['0']['kode_pos']}}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="validationCustom04">Status Aktif </label><br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="status" id="status" value="1" required <?=($buyer['status']== '1') ? "checked" : "" ;?> />
                                    <label class="form-check-label">
                                        Aktif
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input class="form-check-input" type="radio" name="status" id="status" value="0"  <?=($buyer['status']== '0') ? "checked" : "" ;?> />
                                    <label class="form-check-label">
                                        Non Aktif
                                    </label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-control-label" for="validationCustom03">Alamat Detail</label>
                                    <textarea class="form-control" rows="5" name="alamat" id="alamat" required>{{$buyer['alamat']['0']['alamat']}}</textarea>
                                </div>
                            </div>
                            <div id="notif">
                                <div class="alert alert-danger" role="alert">
                                    Anda harus menentukan lokasi buyer pada peta terlebih dahulu !
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZk2xsQ_ejT5_jk9UhIbCJtH1DE59xcXA"></script>

    <script>

    $('#notif').hide();

    function validate() {
        var lat = document.getElementById("lat").value;
        if (lat == '') {
            $('#notif').show();
            return false;
        }
        return true;
    }

    $(document).ready(function () {
        $('#editData').on('submit', function(event){
            event.preventDefault();
            var _token = $("input[name='_token']").val();
            var id = $("input[name='id']").val();
            var nama = $("input[name='nama']").val();
            var kode = $("input[name='kode']").val();
            var nama_pic = $("input[name='nama_pic']").val();
            var phone_pic = $("input[name='phone_pic']").val();
            var lat = $("input[name='lat']").val();
            var long = $("input[name='long']").val();
            var kode_pos = $("input[name='kode_pos']").val();
            var provinsi = $('#provinsi option:selected').val();
            var kota = $('#kota option:selected').val();
            var kecamatan = $('#kecamatan option:selected').val();
            var kelurahan = $('#kelurahan option:selected').val();
            var alamat = $('textarea#alamat').val();
            var status = $('input[name="status"]:checked').val();

            $.ajax({
                url: "../updateBuyer",
                type: "PUT",
                data: { _token: _token, id: id, nama: nama, kode:kode, nama_pic:nama_pic, phone_pic:phone_pic, lat:lat, long:long, provinsi:provinsi, kota:kota, kecamatan:kecamatan, kelurahan:kelurahan, alamat:alamat, kode_pos:kode_pos, status:status },
                success: function (data) {
                    
                    if(data.status==='success') {
                        swal("Sukses!", "Data berhasil disimpan!", "success").then(function() {
                          window.location = "../../data_buyer";
                        });  
                    } else {
                       swal("Gagal!", "Data gagal disimpan!", "error")
                    }

                },
            });
            
        });
    });

    $('select[name="provinsi"]').on('change', function(){
        var id_prov = $(this).val();
        if(id_prov) {
            $.ajax({
                url: '../getDistrict/'+id_prov,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                $('.loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('select[name="kota"]').empty();
                    $.each(data, function(key, value){
                    $('select[name="kota"]').append('<option value="'+ data[key].lokasi_kabupatenkota +'"   data-provinsi="'+ data[key].lokasi_propinsi +'">' + data[key].lokasi_nama + '</option>');
                    });
                },
                complete: function(){
                    $('.loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kota"]').empty();
        }

    });

    $('select[name="kota"]').on('change', function(){
        var id_prov = $(this).find('option:selected').attr('data-provinsi');
        var id_kota = $(this).val();
        if(id_kota) {
            $.ajax({
                url: '../getSubDistrict/'+id_prov+'/'+id_kota,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('.loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('select[name="kecamatan"]').empty();
                    $.each(data, function(key, value){
                    $('select[name="kecamatan"]').append('<option value="'+ data[key].lokasi_kecamatan +'" data-provinsi="'+ data[key].lokasi_propinsi +'" data-kota="'+ data[key].lokasi_kabupatenkota +'">' + data[key].lokasi_nama + '</option>');
                    });
                },
                complete: function(){
                    $('.loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kecamatan"]').empty();
        }

    });

    $('select[name="kecamatan"]').on('change', function(){
        var id_prov = $(this).find('option:selected').attr('data-provinsi');
        var id_kota = $(this).find('option:selected').attr('data-kota');
        var id_kec = $(this).val();

        if(id_kec) {
            $.ajax({
                url: '../getVillage/'+id_prov+'/'+id_kota+'/'+id_kec,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('.loader').css("visibility", "visible");
                },

                success:function(data) {
                    $('select[name="kelurahan"]').empty();
                    $.each(data, function(key, value){
                    $('select[name="kelurahan"]').append('<option value="'+ data[key].lokasi_kelurahan +'">' + data[key].lokasi_nama + '</option>');
                    });
                },
                complete: function(){
                    $('.loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="kelurahan"]').empty();
        }

    });

    var marker;
      
    function taruhMarker(peta, posisiTitik){
        
        if( marker ){
          marker.setPosition(posisiTitik);
        } else {
          marker = new google.maps.Marker({
            position: posisiTitik,
            map: peta
          });
        }

        document.getElementById("lat").value = posisiTitik.lat();
        document.getElementById("long").value = posisiTitik.lng();
        
    }
      
    function initialize() {

        var valLat  = "{{$buyer['alamat']['0']['latitude']}}";
        var valLong = "{{$buyer['alamat']['0']['longitude']}}";

        var propertiPeta = {
        center:new google.maps.LatLng(valLat, valLong),
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMapHub"), propertiPeta);
        google.maps.event.addListener(peta, 'click', function(event) {
        taruhMarker(this, event.latLng);
        marker.setMap(null);
        });

        var marker=new google.maps.Marker({
          position: new google.maps.LatLng(valLat, valLong),
          map: peta
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);


    </script>

@endsection