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
                            <li class="breadcrumb-item"><a href="#">Pencairan Poin User</a></li>
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
                    <h3 class="mb-0">Pencairan Poin User</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Tanggal</th>
                                <th scope="col" class="sort" data-sort="budget">User ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jumlah Poin</th>
                                <th scope="col">Metode</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">13 Nov 2021</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="budget">
                                    #01hj393ji3j
                                </td>
                                <td>
                                    Angga
                                </td>
                                <td>
                                    10000 
                                </td>
                                <td>
                                    Transfer Bank 
                                </td>
                                <td>
                                    Waiting 
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-original-title="Verifikasi" data-toggle="modal" data-target="#exampleModalCenter">
                                      <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">13 Nov 2021</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="budget">
                                    #09393jjh34
                                </td>
                                <td>
                                    Omar
                                </td>
                                <td>
                                    15000 
                                </td>
                                <td>
                                    Ovo
                                </td>
                                <td>
                                    Success 
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User">
                                        <i class="fas fa-info"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">13 Nov 2021</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="budget">
                                    #01hj393j000
                                </td>
                                <td>
                                    Alex
                                </td>
                                <td>
                                    20000 
                                </td>
                                <td>
                                    Ovo 
                                </td>
                                <td>
                                    Waiting 
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-original-title="Verifikasi" data-toggle="modal" data-target="#exampleModalCenter">
                                      <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">12 Nov 2021</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="budget">
                                    #120j393jei9
                                </td>
                                <td>
                                    Iwan
                                </td>
                                <td>
                                    10000 
                                </td>
                                <td>
                                    Transfer Bank 
                                </td>
                                <td>
                                    Waiting 
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-original-title="Verifikasi" data-toggle="modal" data-target="#exampleModalCenter">
                                      <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">12 Nov 2021</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="budget">
                                    #890j390je43
                                </td>
                                <td>
                                    Dandi
                                </td>
                                <td>
                                    5000 
                                </td>
                                <td>
                                    Transfer Bank 
                                </td>
                                <td>
                                    Success 
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User">
                                        <i class="fas fa-info"></i>
                                    </a>
                                </td>
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Proses Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="example3cols1Input">Tanggal Pembayaran</label>
                        <input type="text" class="form-control" id="example3cols1Input" placeholder="Masukkan Tanggal">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label class="form-control-label" for="example3cols1Input">Bukti Bayar</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" lang="en">
                        <label class="custom-file-label" for="customFileLang"></label>
                      </div>
                    </div>
                </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Proses</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>



@endsection