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
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Jumlah Data Sukses Diinputkan</h5>
                        <input type="date" class="form-control form-control-sm w-auto border-0 shadow-none2">
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-1">
                        <h3 class="mb-0"> <small class="mb-0">Sukses</small></h3>
                        <!-- <span class="badge bg-light-success ms-2">36%</span> -->
                    </div>
                    <h3>{{ $total_barang }}</h3>
                    <div id="customer-rate-graph"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Jumlah Data Yang Masih Diproses</h5>
                        <select class="form-select form-select-sm w-auto border-0 shadow-none">
                            <option>Today</option>
                            <option selected="">This week</option>
                            <option>Monthly</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0">Ditunda</p>
                    <h4>{{ $total_barang_ditunda }}</h4>
                    <div id="monthly-report-graph"></div>
                </div>
            </div>
        </div>
        
    <!-- [ Main Content ] end -->
    @endsection
    
    @section('scripts')
    <!-- [Page Specific JS] start -->
    
    <script src="{{ URL::asset('build/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/w-chart.js') }}"></script>


    <!-- [Page Specific JS] end -->
@endsection