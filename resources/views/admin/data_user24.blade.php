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
                            <li class="breadcrumb-item"><a href="#">Data User</a></li>
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
                    <h3 class="mb-0">Data User</h3>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label class="form-control-label">Tampilan Data</label>
                        <select class="form-control act" style="width: 70%;" id="limitData">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                    </div>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="tableData">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">ID User</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Kota</th>
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

    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>

    
    <script type="text/javascript">

    // load default 10 data
    loadData(1,1);

    function loadData(limit, page){
        $.ajax({
            url: 'loadDataUser/'+limit+'/'+page,
            type: 'get',
            dataType: 'json',

            success: function(response){

                $('#tableData tbody').empty(); 
                $('#paginationData').empty(); 
                $('#from').empty(); 
                $('#hal').empty(); 
                $('#total').empty(); 
                len = response['data'].length;
                pag = response['total_pages'];
                total = response['count'];


                if(len > 0){

                    // Load Data Table
                    for(var i=0; i<len; i++){

                        var content = "<tr>" +
                        "<td>" + response['data'][i].id + "</td>" +
                        "<td>" + response['data'][i].nama + "</td>" +
                        "<td>" + response['data'][i].phone + "</td>" +
                        "<td>Jaksel</td>" +
                        "<td><span style='background-color:#97e19d;border-radius:8px;padding:5px;color:#fff'>Active</span></td>" +
                        "<td><a href='#' class='table-action' data-toggle='tooltip' title='Info User'><i class='fas fa-info-circle'></i></a> <a href='#' class='table-action' data-toggle='tooltip' title='Blokir User'><i class='fa fa-ban'></i></a></td>" +
                        "</tr>";
                        $("#tableData tbody").append(content);
                    }
                    // End Load Data Table

                    //Load Pagination
                    if (pag > 7 && page < 7 ) {

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