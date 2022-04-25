@extends('template.app_hub') 
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
                            <li class="breadcrumb-item"><a href="#">Data Inventory</a></li>
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
                    <h3 class="mb-0">Data Inventory</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Tanggal</th>
                                <th scope="col" class="sort" data-sort="budget">Order ID</th>
                                <th scope="col" class="sort" data-sort="status">Nama Mitra</th>
                                <th scope="col">Jumlah Masuk</th>
                                <th scope="col">Jumlah Keluar</th>
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
                                    #10e5y23581738
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">Angga</span>
                                    </span>
                                </td>
                                <td>
                                    4
                                </td>
                                <td>
                                    4
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete User">
                                        <i class="fas fa-trash"></i>
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
                                    #65e5y23581700
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">Asep</span>
                                    </span>
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete User">
                                        <i class="fas fa-trash"></i>
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
                                    #98e5y23581722
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">Agung</span>
                                    </span>
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    10
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete User">
                                        <i class="fas fa-trash"></i>
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
                                    #87e5y23581700
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">Kim</span>
                                    </span>
                                </td>
                                <td>
                                    7
                                </td>
                                <td>
                                    7
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete User">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <span class="name mb-0 text-sm">11 Nov 2021</span>
                                        </div>
                                    </div>
                                </th>
                                <td class="budget">
                                    #00e5tz23581711
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status">Yoga</span>
                                    </span>
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    5
                                </td>
                                <td>
                                    <a href="#!" class="table-action" data-toggle="tooltip" data-original-title="Edit User">
                                        <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" class="table-action table-action-delete" data-toggle="tooltip" data-original-title="Delete User">
                                        <i class="fas fa-trash"></i>
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



@endsection