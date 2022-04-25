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
                            <li class="breadcrumb-item"><a href="#">Data Pool</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                  <a href="{!!('add_hub')!!}" class="btn btn-sm btn-neutral">Tambah Data</a>
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
                    <h3 class="mb-0">Data Pool</h3>
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
                        <th scope="col">ID Hub</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Kota</th>
                        <th scope="col">Penanggungjawab</th>
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

    <div class="modal fade" id="modalResend" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Resend Aktivasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="formResend" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id_hub" id="id_hub">
                        <div class="card-body">
                            <div class="alert alert-warning" role="alert">
                              Apakah Anda ingin mengirim email aktivasi ulang terhadap user ini ?
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"  name="resend_button" id="resend_button">Kirim</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>

    
    <script type="text/javascript">

    // load default 10 data
    loadData(10,1);

    function loadData(limit, page){
        $.ajax({
            url: 'loadDataHub/'+limit+'/'+page,
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
                            if (response['data'][i].status == '1') {
                              var status = 'Aktif';
                              var color = '#97e19d';
                              var resend = '';
                            } else {
                              var status = 'Non Aktif';
                              var color = '#e18177';
                              var resend = "<a href='#' class='table-action resend' id="+response['data'][i].id+" data-toggle='tooltip' title='Resend Aktivasi'><i class='fa fa-paper-plane' data-toggle='modal' data-target='#modalResend'></i></a>";
                            }
                            var content = "<tr>" +
                            "<td>" + response['data'][i].id + "</td>" +
                            "<td>" + response['data'][i].nama + "</td>" +
                            "<td>" + response['data'][i].phone + "</td>" +
                            "<td>Jakarta</td>" +
                            "<td><span style='background-color:"+color+";border-radius:8px;padding:5px;color:#fff'>"+status+"</span></td>" +
                            "<td><a href='#' class='table-action' data-toggle='tooltip' title='Info Hub'><i class='fas fa-info-circle'></i></a><a href='edit_pool/"+response['data'][i].id+"' class='table-action' data-toggle='tooltip' title='Edit Hub'><i class='fas fa-edit'></i></a><a href='#' class='table-action' data-toggle='tooltip' title='Blokir Hub'><i class='fa fa-ban'></i></a>"+resend+"</td>" +
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

    $(document).on('click', '.resend', function(){
        var id = $(this).attr('id');
        $('#id_hub').val(id);
        $('#modalResend').modal('show');
    });

    $('#formResend').on('submit', function(event){
      event.preventDefault();
      var _token = $("input[name='_token']").val();
      var id_hub = $("input[name='id_hub']").val();
      $.ajax({
          url: "resendActivation",
          type: "POST",
          data: { _token: _token, id_hub: id_hub },
          success: function (data) {
              
              if(data.status==='success') {
                    swal("Sukses!", "Email berhasil dikirim !", "success").then(function() {
                      window.location = "../data_hub";
                    });  
                } else {
                   swal("Gagal!", ""+data.message+"", "error")
                }
          },
      });

    });
     
    </script>


@endsection