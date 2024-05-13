@extends('pimpinan.main')

@section('title', 'Halaman Pimpinan')
@section('breadcrumb-item', 'Dashboard')

@section('breadcrumb-item-active', 'Halaman Pimpinan')

@section('css')
    <!-- map-vector css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/jsvectormap.min.css') }}">
@endsection

@section('content')

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ Row 1 ] start -->
        <div class="col-sm-6 col-xl-4">
            <div class="card statistics-card-1">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Online Orders</h5>
                    <div class="dropdown">
                        <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="material-icons-two-tone f-18">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="#">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('build/images/widget/img-status-1.svg') }}" alt="img" class="img-fluid img-bg h-100">
                    <div class="d-flex align-items-center">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0">237 <small class="text-muted">/400</small></h3>
                        <span class="badge bg-light-success ms-2">36%</span>
                    </div>
                    <p class="text-muted mb-2 text-sm mt-3">Delivery Orders</p>
                    <div class="progress" style="height: 7px">
                        <div class="progress-bar bg-brand-color-2" role="progressbar" style="width: 75%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card statistics-card-1">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Pending Orders</h5>
                    <div class="dropdown">
                        <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="material-icons-two-tone f-18">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="#">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('build/images/widget/img-status-2.svg') }}" alt="img" class="img-fluid img-bg">
                    <div class="d-flex align-items-center">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0">100 <small class="text-muted">/500</small></h3>
                        <span class="badge bg-light-primary ms-2">20%</span>
                    </div>
                    <p class="text-muted mb-2 text-sm mt-3">Delivery Orders</p>
                    <div class="progress" style="height: 7px">
                        <div class="progress-bar bg-brand-color-1" role="progressbar" style="width: 75%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card statistics-card-1">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Return Orders</h5>
                    <div class="dropdown">
                        <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="material-icons-two-tone f-18">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="#">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('build/images/widget/img-status-3.svg') }}" alt="img" class="img-fluid img-bg">
                    <div class="d-flex align-items-center">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0">50 <small class="text-muted">/400</small></h3>
                        <span class="badge bg-light-danger ms-2">10%</span>
                    </div>
                    <p class="text-muted mb-2 text-sm mt-3">Return Orders</p>
                    <div class="progress" style="height: 7px">
                        <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Row 1 ] end -->
        <!-- [ Row 2 ] start -->
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Register User</h5>
                    <div class="dropdown">
                        <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="material-icons-two-tone f-18">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="#">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-end mb-3">
                        <h4 class="mb-0">1205</h4>
                        <span class="badge bg-light-success ms-2">20%</span>
                    </div>
                    <p class="text-muted mb-0">Monthly Increase</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Daily User</h5>
                    <div class="dropdown">
                        <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="material-icons-two-tone f-18">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="#">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-end mb-3">
                        <h4 class="mb-0">467</h4>
                        <span class="badge bg-light-warning ms-2">10%</span>
                    </div>
                    <p class="text-muted mb-0">Weekly Increase</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Premium User</h5>
                    <div class="dropdown">
                        <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="material-icons-two-tone f-18">more_vert</i></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">View</a>
                            <a class="dropdown-item" href="#">Edit</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-end mb-3">
                        <h4 class="mb-0">346</h4>
                        <span class="badge bg-light-primary ms-2">50%</span>
                    </div>
                    <p class="text-muted mb-0">Yearly Increase</p>
                </div>
            </div>
        </div>
    <!-- [ Main Content ] end -->
@endsection

@section('scripts')
    <!-- [Page Specific JS] start -->
    <script src="{{ URL::asset('build/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/world.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
@endsection