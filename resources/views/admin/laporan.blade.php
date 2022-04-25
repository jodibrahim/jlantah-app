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
                            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                  <a href="{!!('add_hub')!!}" class="btn btn-sm btn-neutral">Ekspor Data</a>
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
                    <h3 class="mb-0">Laporan Pesanan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col" class="sort" data-sort="name">ID Pesanan</th>
                            <th scope="col" class="sort" data-sort="budget">User Order</th>
                            <th scope="col" class="sort" data-sort="budget">Nama Mitra</th>
                            <th scope="col" class="sort" data-sort="status">Kota</th>
                            <th scope="col">Jumlah (L)</th>
                          </tr>
                        </thead>
                        <tbody class="list">
                          <tr>
                            <th scope="row">
                              <div class="media align-items-center">
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">#1eg0282bv2v37723</span>
                                </div>
                              </div>
                            </th>
                            <td class="budget">
                              Peter
                            </td>
                            <td>
                              <span class="badge badge-dot mr-4">
                                <i class="bg-warning"></i>
                                <span class="status">Chech</span>
                              </span>
                            </td>
                            <td>
                              Jakarta Selatan
                            </td>
                            <td>
                            5
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                              <div class="media align-items-center">
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">#1eg0282bv2v37724</span>
                                </div>
                              </div>
                            </th>
                            <td class="budget">
                              Peter
                            </td>
                            <td>
                              <span class="badge badge-dot mr-4">
                                <i class="bg-warning"></i>
                                <span class="status">Chech</span>
                              </span>
                            </td>
                            <td>
                              Jakarta Selatan
                            </td>
                            <td>
                            10
                            </td>
                          </tr><tr>
                            <th scope="row">
                              <div class="media align-items-center">
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">#1eg0282bv2v37725</span>
                                </div>
                              </div>
                            </th>
                            <td class="budget">
                              Peter
                            </td>
                            <td>
                              <span class="badge badge-dot mr-4">
                                <i class="bg-warning"></i>
                                <span class="status">Chech</span>
                              </span>
                            </td>
                            <td>
                              Jakarta Selatan
                            </td>
                            <td>
                            10
                            </td>
                          </tr><tr>
                            <th scope="row">
                              <div class="media align-items-center">
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">#1eg0282bv2v37726</span>
                                </div>
                              </div>
                            </th>
                            <td class="budget">
                              Peter
                            </td>
                            <td>
                              <span class="badge badge-dot mr-4">
                                <i class="bg-warning"></i>
                                <span class="status">Chech</span>
                              </span>
                            </td>
                            <td>
                              Jakarta Selatan
                            </td>
                            <td>
                            12
                            </td>
                          </tr><tr>
                            <th scope="row">
                              <div class="media align-items-center">
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">#1eg0282bv2v37727</span>
                                </div>
                              </div>
                            </th>
                            <td class="budget">
                              Peter
                            </td>
                            <td>
                              <span class="badge badge-dot mr-4">
                                <i class="bg-warning"></i>
                                <span class="status">Chech</span>
                              </span>
                            </td>
                            <td>
                              Jakarta Selatan
                            </td>
                            <td>
                            20
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

    <script src="{{asset ('/assets/js/jquery.min.js')}}"></script>



@endsection