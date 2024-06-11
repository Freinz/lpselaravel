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
                    <h5>Data yang sukses dimasukkan</h5>
                   
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('build/images/widget/img-status-1.svg') }}" alt="img" class="img-fluid img-bg h-100">
                    <div class="d-flex align-items-center">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $total_barang }}<small class="text-muted">/{{ $jumlah_keseluruhan_barang }}</small></h3>
                        <span class="badge bg-light-success ms-2">{{ intval ($persentase_jumlah_barang) }}%</span>
                    </div>
                    <p class="text-muted mb-2 text-sm mt-3">Proses Total Barang</p>
                    <div class="progress" style="height: 7px">
                        <div class="progress-bar bg-brand-color-2" role="progressbar" style="width: {{ intval($persentase_jumlah_barang) }}%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card statistics-card-1">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Data yang sedang dalam antrian</h5>
                 
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
        <div class="col-sm-6 col-xl-4">
            <div class="card statistics-card-1">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Data yang masih ditolak</h5>
                 
                </div>
                <div class="card-body">
                    <img src="{{ URL::asset('build/images/widget/img-status-3.svg') }}" alt="img" class="img-fluid img-bg">
                    <div class="d-flex align-items-center">
                        <h3 class="f-w-300 d-flex align-items-center m-b-0">{{ $total_barang_ditolak }}</h3>
                        <!-- <span class="badge bg-light-danger ms-2">10%</span> -->
                    </div>
                    <p class="text-muted mb-2 text-sm mt-3">Masih proses perbaikan</p>
                    <div class="progress" style="height: 7px">
                        <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 100%" aria-valuenow="75"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Row 1 ] end -->
        <!-- [ Row 2 ] start -->

        <div class="row">
  <!-- [ variant-chart ] start -->
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5>Bar chart</h5>
      </div>
      <div class="card-body">
        <div id="bar-chart-1"></div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5>Bar chart stacked</h5>
      </div>
      <div class="card-body">
        <div id="bar-chart-2"></div>
      </div>
    </div>
  </div>
        </div>

        <!-- <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Jumlah Operator yang terdaftar</h5>
                   
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-end mb-3">
                        <h4 class="mb-0">{{ $jumlah_operator }}</h4>
                        <span class="badge bg-light-success ms-2">20%</span>
                    </div>
                    <p class="text-muted mb-0">Operator Sukses Terdaftar</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3">
                    <h5>Jumlah pengajuan operator</h5>
                   
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-end mb-3">
                        <h4 class="mb-0">467</h4>
                        <span class="badge bg-light-warning ms-2">10%</span>
                    </div>
                    <p class="text-muted mb-0">Weekly Increase</p>
                </div>
            </div>
        </div> -->
        
    <!-- [ Main Content ] end -->
@endsection

@section('scripts')
    <!-- [Page Specific JS] start -->
    <script src="{{ URL::asset('build/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/chart-apex.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/jsvectormap.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/world.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/world-merc.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/dashboard-default.js') }}"></script>
    <!-- [Page Specific JS] end -->
@endsection