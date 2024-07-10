@extends('operator.main')

@section('title', 'Halaman Operator')
@section('breadcrumb-item', 'Dashboard')

@section('breadcrumb-item-active', 'Halaman Operator')

@section('css')
    <!-- map-vector css -->
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/jsvectormap.min.css') }}">
@endsection

@section('content')

    <!-- [ Main Content ] start -->

    <div class="row">
        <!-- [ Row 1 ] start -->
        <div class="col-sm-6 col-xl-6">
            <div class="card statistics-card-1">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Jumlah Data Sukses Diinputkan</h5>
                   
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('build/images/widget/img-status-1.svg') }}" alt="img" class="img-fluid img-bg h-100">
                    <div class="d-flex align-items-center">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $total_barang }}</h3>
                        <span class="badge bg-light-success ms-2">100%</span>
                    </div>
                    <p class="text-muted mb-2 text-sm mt-3">Proses Total Barang</p>
                    <div class="progress" style="height: 7px">
                        <div class="progress-bar bg-brand-color-2" role="progressbar" style="width: 100%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="card statistics-card-1">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Jumlah Data Yang Masih Diproses</h5>
                 
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('build/images/widget/img-status-2.svg') }}" alt="img" class="img-fluid img-bg">
                    <div class="d-flex align-items-center">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $total_barang_ditunda }}</h3>
                        <!-- <span class="badge bg-light-primary ms-2">20%</span> -->
                    </div>
                    <p class="text-muted mb-2 text-sm mt-3">Menunggu antrian</p>
                    <div class="progress" style="height: 7px">
                        <div class="progress-bar bg-brand-color-1" role="progressbar" style="width: 100%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- [ Row 1 ] end -->

        
    <!-- [ Main Content ] end -->
    @endsection
    
    @section('scripts')
    <!-- [Page Specific JS] start -->
    
    <script src="{{ URL::asset('build/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/w-chart.js') }}"></script>


    <!-- [Page Specific JS] end -->
@endsection