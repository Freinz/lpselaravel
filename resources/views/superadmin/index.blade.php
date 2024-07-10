@extends('superadmin.main')

@section('title', 'SuperAdmin')
@section('breadcrumb-item', 'Dashboard')

@section('breadcrumb-item-active', 'Super Admin Page')

@section('css')
    <!-- map-vector css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/jsvectormap.min.css') }}">
@endsection

@section('content')

    <!-- [ Main Content ] start -->
    <div class="row">
    <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Jumlah User</h5>
                          
                        </div>

                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-1.svg') }}" alt="img"
                                class="img-fluid img-bg h-100">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $jumlah_user }} <small
                                        class="text-muted"></small></h3>
                                <span class="badge bg-light-success ms-2">User Yang Terdata</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Progress Pendataan Jumlah User</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-1" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                           
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Jumlah Role Yang Terdata</h5>
                           
                        </div>
                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-2.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0"> {{ $jumlah_role }} </h3>
                                <span class="badge bg-light-primary ms-2">Role Yang Terdata</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Progress Pendataan Role</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-1" role="progressbar" style="width: 100%"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Jumlah Barang Yang Terdata</h5>
                            <div class="dropdown">
                          
                             
                            </div>
                        </div>
                        <div class="card-body">
                            <img src="{{ URL::asset('build/images/widget/img-status-3.svg') }}" alt="img"
                                class="img-fluid img-bg">
                            <div class="d-flex align-items-center">
                                <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $total_barang }} <small
                                        class="text-muted"></small></h3>
                                <span class="badge bg-light-danger ms-2">Barang Yang Terdata</span>
                            </div>
                            <p class="text-muted mb-2 text-sm mt-3">Progress Pendataan Nama Kota</p>
                            <div class="progress" style="height: 7px">
                                <div class="progress-bar bg-brand-color-3" role="progressbar"
                                    style="width: 100%"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
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
