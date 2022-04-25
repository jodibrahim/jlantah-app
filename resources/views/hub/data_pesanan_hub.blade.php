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
                            <li class="breadcrumb-item"><a href="#">Data Pesanan</a></li>
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
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Data Pesanan</h3>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-control-label">Tampilan Data</label>
                        <select class="form-control act" style="width: 70%;" id="limitData">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                          <option value="250">250</option>
                        </select>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="tableData">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">ID Pesanan</th>
                            <th scope="col">User Order</th>
                            <th scope="col">Jumlah Liter</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                         
                        </tbody>
                      </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <div class="row">
                        <div class="col-6">
                            <small>Menampilkan <span id="from">0</span> data pada halaman <span id="hal">0</span> dari total <span id="total">0</span> data</small>
                        </div>
                        <div class="col-6">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0" id="paginationData">
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Verifikasi Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <hr>
                    <div class="card-body">
                        <h5>Order ID : #1eg0282bv2v37723</h5>
                        <h5>Tanggal : 13 November 2021 10:33 </h5>
                        <h5>Nama User : Peter</h5>
                        <h5>Nama Mitra : Chech</h5>
                        <h5>Alamat User : Jalan Djuanda No 9 Jakarta Pusat</h5><hr>
                        
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-control-label" for="example3cols1Input">Dari Kurir (Liter)</label>
                              <input type="text" class="form-control" id="example3cols1Input" value="4">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-control-label" for="example3cols2Input">Botol diterima</label>
                              <input type="text" class="form-control" id="example3cols2Input" >
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="form-control-label" for="example3cols3Input">Dikembalikan</label>
                              <input type="text" class="form-control" id="example3cols3Input" >
                            </div>
                          </div>
                          <small style="color:red"><i>*) Mohon teliti terlebih dahulu jumlah dan volume barang sebelum melakukan verifikasi !</i></small>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Verifikasi</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>

    <script type="text/javascript">

    // load default 10 data
    loadData(10,1);

    function loadData(limit, page){
        $.ajax({
            url: 'loadDataPesananHub/'+limit+'/'+page,
            type: 'get',
            dataType: 'json',

            success: function(response){

                $('#tableData tbody').empty(); 
                $('#paginationData').empty(); 
                $('#from').empty(); 
                $('#hal').empty(); 
                $('#total').empty(); 

                if (response['status']=='failed') {

                    window.location.href = '{!!url("unauthorized")!!}';

                } else {


                    len = response['data'].length;
                    pag = response['total_pages'];
                    total = response['count'];


                    if(len > 0){

                        // Load Data Table
                        for(var i=0; i<len; i++){

                            var content = "<tr>" +
                            "<td>" + response['data'][i].order_id + "</td>" +
                            "<td>" + response['data'][i].member.nama + "</td>" +
                            "<td>" + response['data'][i].quantity + "</td>" +
                            "<td>Jakarta</td>" +
                            "<td><span style='background-color:#97e19d;border-radius:8px;padding:5px;color:#fff'>"+ response['data'][i].status +"</span></td>" +
                            "<td><a href='detail_pesanan_hub/"+response['data'][i].order_id+"' class='table-action' data-toggle='tooltip' title='Info User'><i class='fas fa-info-circle'></i></a></td>" +
                            "</tr>";
                            $("#tableData tbody").append(content);
                        }
                        // End Load Data Table

                        //Load Pagination
                        if (pag > 7 && page <= 7 ) {

                                var prev = '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i><span class="sr-only">Previous</span></a></li>';
                                $("#paginationData").append(prev);

                                for(var p=0; p<5; p++){
                                    if (page == p+1) {
                                        var contentpage = '<li class="page-item active"><a class="page-link act-page" id="'+(p+1)+'" style="cursor:pointer">'+(p+1)+'</a></li>';
                                        $("#paginationData").append(contentpage);
                                    } else {
                                        var contentpage = '<li class="page-item"><a class="page-link act-page" id="'+(p+1)+'" style="cursor:pointer">'+(p+1)+'</a></li>';
                                        $("#paginationData").append(contentpage);
                                    }
                                }

                                var contentpage = '<li class="page-item "><a class="page-link">..</a></li>';
                                $("#paginationData").append(contentpage);

                                
                                if (page == pag) {
                                    var contentpage = '<li class="page-item active"><a class="page-link act-page" id="'+pag+'" style="cursor:pointer">'+pag+'</a></li>';
                                    $("#paginationData").append(contentpage);
                                    $('#paginationData').empty();
                                    var prev = '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i><span class="sr-only">Previous</span></a></li>';
                                    $("#paginationData").append(prev);
                                    var contentpagefirst = '<li class="page-item "><a class="page-link act-page" id="1">1</a></li>';
                                    $("#paginationData").append(contentpagefirst);
                                    var contentpagedot = '<li class="page-item "><a class="page-link" href="#">..</a></li>';
                                    $("#paginationData").append(contentpagedot);
                                    var pagedown = pag - 5 ;

                                    for(var d=pagedown; d<pag; d++){

                                        var contentpage = '<li class="page-item"><a class="page-link act-page" id="'+(d+1)+'" style="cursor:pointer">'+(d+1)+'</a></li>';
                                        $("#paginationData").append(contentpage);
                                    }


                                } else {
                                    var contentpage = '<li class="page-item "><a class="page-link act-page" id="'+pag+'" style="cursor:pointer">'+pag+'</a></li>';
                                    $("#paginationData").append(contentpage);
                                }

                                if (page >= 5) {
                                    $('#paginationData').empty();
                                    var prev = '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i><span class="sr-only">Previous</span></a></li>';
                                    $("#paginationData").append(prev);
                                    var contentpagefirst = '<li class="page-item "><a class="page-link act-page" id="1">1</a></li>';
                                    $("#paginationData").append(contentpagefirst);
                                    var contentpagedot = '<li class="page-item "><a class="page-link" href="#">..</a></li>';
                                    $("#paginationData").append(contentpagedot);

                                    // var pagebetween = page + 3 ;
                                    // for(var b=5; b<8; b++){  
                                    //     var contentpage = '<li class="page-item "><a class="page-link act-page" id="'+(b+1)+'" style="cursor:pointer">'+(b+1)+'</a></li>';
                                    //     $("#paginationData").append(contentpage);
                                    // }
                                    var contentpage = '<li class="page-item mid-first"><a class="page-link act-page" id="6">6</a></li>';
                                    $("#paginationData").append(contentpage);

                                    var midsecond = page+1;
                                    var contentpage = '<li class="page-item mid-second"><a class="page-link act-page" id="7">7</a></li>';
                                    $("#paginationData").append(contentpage);

                                    var midthird = page+2;
                                    var contentpage = '<li class="page-item mid-third"><a class="page-link act-page" id="8">8</a></li>';
                                    $("#paginationData").append(contentpage);

                                    var contentpagedot = '<li class="page-item "><a class="page-link" href="#">..</a></li>';
                                    $("#paginationData").append(contentpagedot);
                                    var contentpagelast = '<li class="page-item "><a class="page-link act-page" id="'+pag+'" style="cursor:pointer">'+pag+'</a></li>';
                                    $("#paginationData").append(contentpagelast);

                                }

                                var next = '<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i><span class="sr-only">Next</span></a></li>';
                                $("#paginationData").append(next);

                            

                        } else if (pag > 7 && page > 7 ) {
                            
                            var prev = '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i><span class="sr-only">Previous</span></a></li>';
                                $("#paginationData").append(prev);
                            var contentpagefirst = '<li class="page-item "><a class="page-link act-page" id="1" style="cursor:pointer">1</a></li>';
                            $("#paginationData").append(contentpagefirst);
                            var contentpagedot = '<li class="page-item "><a class="page-link" href="#">..</a></li>';
                            $("#paginationData").append(contentpagedot);
                            var pagedown = pag - 5 ;

                            for(var d=pagedown; d<pag; d++){

                                if (page == d+1) {
                                    var contentpage = '<li class="page-item active"><a class="page-link act-page" id="'+(d+1)+'" style="cursor:pointer">'+(d+1)+'</a></li>';
                                    $("#paginationData").append(contentpage);
                                } else {
                                    var contentpage = '<li class="page-item"><a class="page-link act-page" id="'+(d+1)+'" style="cursor:pointer">'+(d+1)+'</a></li>';
                                    $("#paginationData").append(contentpage);
                                }
                            }

                            var next = '<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i><span class="sr-only">Next</span></a></li>';
                            $("#paginationData").append(next);

                        } else {

                            var prev = '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-left"></i><span class="sr-only">Previous</span></a></li>';
                            $("#paginationData").append(prev);

                            for(var j=0; j<pag; j++){
                                if (page == j+1) {
                                    var contentpage = '<li class="page-item active"><a class="page-link act-page" id="'+(j+1)+'" style="cursor:pointer">'+(j+1)+'</a></li>';
                                    $("#paginationData").append(contentpage);
                                } else {
                                    var contentpage = '<li class="page-item"><a class="page-link act-page" id="'+(j+1)+'" style="cursor:pointer">'+(j+1)+'</a></li>';
                                    $("#paginationData").append(contentpage);
                                }
                            }

                            var next = '<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i><span class="sr-only">Next</span></a></li>';
                            $("#paginationData").append(next);

                        }                    
                        // End Load Pagination

                        // Load Total Data
                        var from = len;
                        $("#from").append(from);
                        $("#hal").append(page);
                        $("#total").append(total);
                        // End Load Total Data

                    } else {

                       var content = "<tr>" +
                       "<td colspan='6'>Belum ada data.</td>" +
                       "</tr>";
                       $("#tableData tbody").append(content);

                   }
                }
            }
        });
    }

    $('.act').on('change', function() {
        var limit = $('#limitData').val();
        var page = 1;
        loadData(limit,page);
    });

    $(document).on("click", ".act-page", function () {
        var page = $(this).attr("id");
        var limit = $('#limitData').val();
        loadData(limit,page);
    });
     
    </script>



@endsection