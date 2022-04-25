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
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
                  <a href="{!!('add_hub')!!}" class="btn btn-sm btn-neutral">Tambah Data</a>
                </div> -->
            </div>
            <!-- Card stats -->
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Tracking Mitra</h3>
                </div>
                <div id="map-default" class="map-canvas">
                    <center>
                        <div id="googleMap" style="width:100%;height:380px;"></div>
                    </center>
                </div>
                <div class="card-body">
                    <h4 style="color:#fa4a0c">Detail Pesanan</h4>
                    <h5>Order ID : #{{$detail['order_no']}} </h5>
                    <h5>Nama User :  {{$detail['user']['0']['nama']}}</h5>
                    <h5>Telepon :  0{{$detail['user']['0']['phone']}}</h5>
                    <h5>Alamat :  {{$detail['alamat']}} ({{$detail['location_detail']}})</h5>
                </div>
                <div class="card-body">
                    <h4 style="color:#fa4a0c">Data Mitra</h4>
                    <h5>Nama Mitra :  {{$detail['mitra']['0']['nama']}}</h5>
                    <h5>Telepon :  0{{$detail['mitra']['0']['phone']}}</h5>
                </div>
                <div class="card-body">
                    <h4 style="color:#fa4a0c">Data Pool</h4>
                    <h5>Nama Pool :  {{$detail['hub']['0']['nama']}}</h5>
                    <h5>Telepon :  0{{$detail['hub']['0']['phone']}}</h5>
                    <h5>Alamat :  {{$detail['hub']['0']['alamat']['0']['alamat']}}</h5>
                    <h5>Volume terverifikasi :  {{$detail['hub']['0']['jumlah_liter']}}</h5>
                </div>

                
                <hr>
                <div class="card-body">
                    <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                        @if(!empty($detail['history']['0']['status']))
                        <div class="timeline-block">
                            <span class="timeline-step badge-success">
                                <i class="ni ni-diamond"></i>
                            </span>
                            <div class="timeline-content">
                                <small class="text-muted font-weight-bold">{{$detail['history']['0']['created_at']}}</small>
                                <h5 class="mt-3 mb-0">Pesanan berhasil dibuat</h5>  
                                <p class="text-sm mt-1 mb-0">User membuat pesanan baru.</p>
                                <p class="text-sm mt-1 mb-0">Nama : {{$detail['user']['0']['nama']}}</p>
                                <p class="text-sm mt-1 mb-0">Telepon : 0{{$detail['user']['0']['phone']}}</p>
                                <p class="text-sm mt-1 mb-0">Alamat : {{$detail['alamat']}} ({{$detail['location_detail']}})</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-warning">Jumlah Liter : {{$detail['jumlah_liter']}} </span>
                                </div>

                            </div>
                        </div>
                        @endif
                        @if(!empty($detail['history']['1']['status']))
                        <div class="timeline-block">
                            <span class="timeline-step badge-warning">
                                <i class="ni ni-sound-wave"></i>
                            </span>
                            <div class="timeline-content">
                                <small class="text-muted font-weight-bold">{{$detail['history']['1']['created_at']}}</small>
                                <h5 class="mt-3 mb-0">{{$detail['history']['1']['description']}}</h5>
                                <p class="text-sm mt-1 mb-0">Proses pencarian mitra berdasarkan pesanan user</p>
                            </div>
                        </div>
                        @endif
                        @if(!empty($detail['history']['2']['status']))
                        <div class="timeline-block">
                            <span class="timeline-step badge-info">
                                <i class="ni ni-bulb-61"></i>
                            </span>
                            <div class="timeline-content">
                                <small class="text-muted font-weight-bold">{{$detail['history']['2']['created_at']}}</small>
                                <h5 class="mt-3 mb-0">Berhasil mendapatkan mitra</h5>
                                <p class="text-sm mt-1 mb-0">Mitra sedang dalam perjalanan untuk menjemput pesanan.</p>
                                <p class="text-sm mt-1 mb-0">Nama : {{$detail['mitra']['0']['nama']}}</p>
                                <p class="text-sm mt-1 mb-0">Telepon : 0{{$detail['mitra']['0']['phone']}}</p>
                            </div>
                        </div>
                        @endif
                        @if(!empty($detail['history']['3']['status']))
                        <div class="timeline-block">
                            <span class="timeline-step badge-danger">
                                <i class="ni ni-delivery-fast"></i>
                            </span>
                            <div class="timeline-content">
                                <small class="text-muted font-weight-bold">{{$detail['history']['3']['created_at']}}</small>
                                <h5 class="mt-3 mb-0">{{$detail['history']['3']['description']}}</h5>
                                <p class="text-sm mt-1 mb-0">Mitra telah sampai di lokasi user.</p>
                            </div>
                        </div>
                        @endif
                        @if(!empty($detail['history']['4']['status']))
                        <div class="timeline-block">
                            <span class="timeline-step badge-success">
                                <i class="ni ni-tag"></i>
                            </span>
                            <div class="timeline-content">
                                <small class="text-muted font-weight-bold">{{$detail['history']['4']['created_at']}}</small>
                                <h5 class="mt-3 mb-0">Pesanan berhasil dipickup</h5>
                                <p class="text-sm mt-1 mb-0">Mitra sedang menuju perjalanan ke pool.</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-warning">Verifikasi Jumlah Liter : {{$detail['mitra']['0']['jumlah_liter']}} </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(!empty($detail['history']['5']['status']))
                        <div class="timeline-block">
                            <span class="timeline-step badge-warning">
                                <i class="ni ni-shop text-yellow"></i>
                            </span>
                            <div class="timeline-content">
                                <small class="text-muted font-weight-bold">{{$detail['history']['5']['created_at']}}</small>
                                <h5 class="mt-3 mb-0">Mitra telah sampai di pool</h5>
                                <p class="text-sm mt-1 mb-0">Mitra telah sampai di pool dan sedang dalam proses verifikasi / pengecekan barang.</p>
                                <p class="text-sm mt-1 mb-0">Nama Pool: {{$detail['hub']['0']['nama']}}</p>
                            </div>
                        </div>
                        @endif
                        @if(!empty($detail['history']['6']['status']))
                        <div class="timeline-block">
                            <span class="timeline-step badge-info">
                                <i class="ni ni-check-bold"></i>
                            </span>
                            <div class="timeline-content">
                                <small class="text-muted font-weight-bold">{{$detail['history']['6']['created_at']}}</small>
                                <h5 class="mt-3 mb-0">Pesanan selesai</h5>
                                <p class="text-sm mt-1 mb-0">Pesanan user telah diverifikasi pool dan dinyatakan selesai.</p>
                                <div class="mt-3">
                                    <span class="badge badge-pill badge-warning">Verifikasi Jumlah Liter : {{$detail['hub']['0']['jumlah_liter']}} </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZk2xsQ_ejT5_jk9UhIbCJtH1DE59xcXA"></script>

    <script type="text/javascript">

    var marker;
      
   
      
    function initialize() {

        var valLat  = "{{$detail['latitude']}}";
        var valLong = "{{$detail['longitude']}}";

        var propertiPeta = {
        center:new google.maps.LatLng(valLat, valLong),
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
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

      const firebaseConfig = {
          apiKey: "AIzaSyBuESRTc5yMf2w47FuKZJHHGsQyTJv18hU",
          authDomain: "mijel-dev.firebaseapp.com",
          databaseURL: "https://mijel-dev-default-rtdb.asia-southeast1.firebasedatabase.app",
          projectId: "mijel-dev",
          storageBucket: "mijel-dev.appspot.com",
          messagingSenderId: "677555874920",
          appId: "1:677555874920:web:9a15611bfabab875dddfdd"
      };

      console.log(firebaseConfig);

  </script>

@endsection