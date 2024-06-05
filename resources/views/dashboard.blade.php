<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') LPSE Kalimantan Selatan</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective."/>
    <meta name="author" content="phoenixcoded" />

    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ URL::asset('build/images/favicon.svg') }}" type="image/x-icon">

    @yield('css')
    <link rel="stylesheet" href="{{ URL::asset('build/css/plugins/dataTables.bootstrap5.min.css') }}">
    <!-- [Page specific CSS] end -->

    @include('layouts.head-css')
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
    @include('layouts.loader')
    @include('layouts.sidebar')
    @include('layouts.topbar')
    

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            
        <div class='row'>
                <!-- [ Row 1 ] start -->
                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Online Orders</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
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
                                <div class="progress-bar bg-brand-color-2" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Pending Orders</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
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
                                <div class="progress-bar bg-brand-color-1" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-4">
                    <div class="card statistics-card-1">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>Return Orders</h5>
                            <div class="dropdown">
                                <a class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons-two-tone f-18">more_vert</i></a>
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
                                <div class="progress-bar bg-brand-color-3" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ Row 1 ] end -->
            </div>  
            <h3 class="text-center">Kumpulan Data LPSE Kalimantan Selatan</h3>

            <!-- Row Grouping table start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive dt-responsive">
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama Kota</th>
                                        <th>Kategori</th>
                                        <th>Sub-Kategori</th>
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Merk</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($superadmin as $spadmin)
                                    @if ($spadmin->status == 'diterima')
                                    <tr>
                                        <td>{{$spadmin->nama_kota}}</td>
                                        <td>{{$spadmin->kategori}}</td>
                                        <td>{{$spadmin->sub_kategori}}</td>
                                        <td>{{$spadmin->nama_barang}}</td>
                                        <td>{{$spadmin->satuan}}</td>
                                        <td>{{$spadmin->merk}}</td>
                                        <td>{{$spadmin->harga}}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row Grouping table end -->


            @if(View::hasSection('breadcrumb-item'))
            @include('layouts.breadcrumb')
            @endif

            <!-- [ Main Content ] start -->
            @yield('content')
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    @include('layouts.footer')
    @include('layouts.customizer')

    @include('layouts.footerjs')

    @yield('scripts')

    <!-- [Page Specific JS] start -->
    <!-- datatable Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ URL::asset('build/js/plugins/dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/plugins/dataTables.bootstrap5.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        $('#basic-btn').DataTable({
            dom: '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>'
        });
    });
    </script>
    <!-- [Page Specific JS] end -->

</body>

</html>
